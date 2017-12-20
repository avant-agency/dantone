<?php

/**
 * Примечание:
 * Для работы синхронизации с АМО необходимо добавить 1 поле в таблицу vmreg.users
 * ALTER TABLE `users` ADD `lead_id` INT NOT NULL DEFAULT '0'
 *
 *
 */







function amoLog($v) {
    @file_put_contents('./log.txt', is_scalar($v) ? $v."\n\n" : print_r($v, true), FILE_APPEND);
}

//amoLog(date("r")."\r\n");

class AmoCrmApi
{

    private
        $cookiePath;

    protected
        $subdomain,
        $authorized = false,
        $serverTime = 0,
        $httpCode = null,
        $userInfo = null,
        $statuses = null,
        $pipelines = null,
        $users = null,
        $fields = null
    ;


    const API_HOST = '.amocrm.ru/';

    public function __construct( $subdomain, $login, $hash, $cookieName = 'cookie'){
        $this->subdomain = $subdomain;
        $this->cookiePath = __DIR__.'/'. preg_replace('/\W+/','', $cookieName) .'.txt';


        $ch = curl_init();
        curl_setopt_array( $ch, array(
//            CURLOPT_VERBOSE  => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_SSL_VERIFYPEER  => 0,
            CURLOPT_SSL_VERIFYHOST  => 0,
            CURLOPT_HTTPHEADER      => array('Content-Type: application/json'),
            CURLOPT_HEADER          => false,
            CURLOPT_COOKIEFILE      => $this->cookiePath,
            CURLOPT_COOKIEJAR       => $this->cookiePath,
            CURLOPT_URL             => 'https://'. $this->subdomain . self::API_HOST .'private/api/auth.php?type=json',
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => json_encode( array(
                'USER_LOGIN' => $login,
                'USER_HASH'  => $hash,
            )),
        ));

        $result = curl_exec( $ch );

//        die();

        curl_close( $ch );
        if( $result ){
            $result = json_decode( $result, true );
            if(!empty( $result['response']['auth'] ))
                $this->authorized = true;
        }
    }

    public function isAuthorized(){
        return $this->authorized;
    }



    /**
     * @param $url
     * @param array $get
     * @param array|bool $post
     * @param array $headers
     * @return bool
     */
    public function api( $url, $get = array(), $post = false, $headers = array()){


        try {
            if(!$this->authorized )
                throw new \Exception('not authorized', 401);

            $ch = curl_init();

            $options = array(
//                CURLOPT_VERBOSE  => true,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_SSL_VERIFYPEER  => 0,
                CURLOPT_SSL_VERIFYHOST  => 0,
                CURLOPT_HTTPHEADER      => array('Content-Type: application/json'),
                CURLOPT_HEADER          => false,
                CURLOPT_COOKIEFILE      => $this->cookiePath,
                CURLOPT_COOKIEJAR       => $this->cookiePath,
                CURLOPT_URL             => $url = 'https://'. $this->subdomain . self::API_HOST . $url .'?'. http_build_query( $get ),
            );


            if( $post ){
                $options[CURLOPT_POST] = true;
                $options[CURLOPT_POSTFIELDS] = json_encode($post);
            }
            if( $headers ){
                $options[CURLOPT_HTTPHEADER] = $headers;
            }



            curl_setopt_array( $ch, $options );
            $result = curl_exec( $ch );
            $info = curl_getinfo($ch);
            curl_close( $ch );


            $this->httpCode = $info['http_code'];
            if( $this->httpCode > 400 ) {
                throw new \Exception('server error: ' . $result, $this->httpCode);
            }

            if(!$result )
                throw new \Exception('empty result', $this->httpCode);

            $json = json_decode( $result, true );
            if( empty($json['response']))
                throw new \Exception('wrong format: '. $result, $this->httpCode);

            if( isset($json['server_time'])){
                $this->serverTime = $json['server_time'];
            }





            return $json['response'];
        }
        catch(\Exception $E){

            return false;
        }
    }

    public function getServerTime(){
        return $this->serverTime;
    }

    public function getHttpCode(){
        return $this->httpCode;
    }

    public function getUserInfo(){
        if(!$this->userInfo ){
            $this->userInfo = $this->api('private/api/v2/json/accounts/current');
        }
        return $this->userInfo;
    }

    public function getUsers(){
        if(!$this->userInfo ){
            $this->userInfo = $this->api('private/api/v2/json/accounts/current');
            if(!$this->userInfo )
                return false;
        }
        if(!$this->users ){
            $this->users = [];
            foreach($this->userInfo['account']['users'] as $user){
                $this->users[$user['id']] = $user;
            }
        }
        return $this->users;
    }

    public function getStatuses(){
        if(!$this->userInfo ){
            $this->userInfo = $this->api('private/api/v2/json/accounts/current');
            if(!$this->userInfo )
                return false;
        }
        if(!$this->statuses ){
            $this->statuses = [];
            foreach($this->userInfo['account']['pipelines'] as $pipeline){
                $this->statuses += $pipeline['statuses'];
            }
        }
        return $this->statuses;
    }

    public function getPipelines(){
        if(!$this->userInfo ){
            $this->userInfo = $this->api('private/api/v2/json/accounts/current');
            if(!$this->userInfo )
                return false;
        }
        if(!$this->pipelines ){
            $this->pipelines = [];
            foreach($this->userInfo['account']['pipelines'] as $pipeline){
                $pipeline['statuses'] = array_values($pipeline['statuses']);
                $this->pipelines[] = $pipeline;
            }
        }
        return $this->pipelines;
    }

    public function getFields(){
        if(!$this->userInfo ){
            $this->userInfo = $this->api('private/api/v2/json/accounts/current');
            if(!$this->userInfo )
                return false;
        }
        if(!$this->fields ){
            $this->fields = [];
            foreach($this->userInfo['account']['custom_fields'] as $cfTypes){
                foreach($cfTypes as $cf){
                    $this->fields[$cf['id']] = [
                        'name' => $cf['name'],
                        'type_id' => $cf['type_id'],
                        'enums' => isset($cf['enums']) ? $cf['enums'] : null,
                    ];
                }
            }
        }
        return $this->fields;
    }

    public function createLead( $statusId, $userId, $customFields = array(), $name = null ){
        $leads['request']['leads']['add'][] = array(
            'name' => $name ?: 'Новый лид',
            'status_id' => $statusId,
            'responsible_user_id' => $userId,
            'custom_fields' => $customFields,
        );
        $lead = $this->api('private/api/v2/json/leads/set', array(), $leads );
        $lead = reset( $lead['leads']['add'] );
        return $lead;
    }

    public function getUserLeadsCount( $userId, $fromDate ){
        $leads = $this->api('private/api/v2/json/leads/list', array(
            'responsible_user_id' => $userId
        ), false, array(
            'IF-MODIFIED-SINCE: '. date('D, d M Y H:i:s', $fromDate)
        ));
        $leads = array_filter($leads['leads'], function($a) use($fromDate){
            return $a['date_create'] >= $fromDate;
        });
        return count($leads);
    }

    public function createContact( $name, $leadId, $customFields = array()){
        $contacts['request']['contacts']['add'][] = array(
            'name'=> $name,
            'linked_leads_id' => array( #Список с айдишниками сделок контакта
                $leadId,
            ),
            'custom_fields' => $customFields,
        );
        $contact = $this->api('private/api/v2/json/contacts/set', array(), $contacts );
        $contact = reset( $contact['contacts']['add'] );
        return $contact;
    }

    public function checkDouble( $fieldId, $value, $id_only = true ){
        if(!$value) return false;

        $gotContacts = $this->api('private/api/v2/json/contacts/list', array(
            'query' => $value
        ));

        if($gotContacts) foreach($gotContacts['contacts'] as $c){
            foreach($c['custom_fields'] as $f){
                if( $f['id'] == $fieldId && $f['values'][0]['value'] == $value ){
                    return $id_only ?  $c['id'] : $c;
                }
            }
        }
        return false;
    }

    public function createTask( $leadId, $userId, $text = null, $completeMinutes = 1 ){
        $tasks['request']['tasks']['add'][] = array(
            'element_id'=> $leadId,
            'element_type'=> 2,
            'task_type'=> 1,
            'text' => $text ?: 'Прозвонить новую заявку - выявить интерес.',
            'responsible_user_id' => $userId,
            'complete_till' => time() + $completeMinutes * 60
        );
        $task = $this->api('private/api/v2/json/tasks/set', array(), $tasks );
        return $task;
    }






    public function addLead($data) {
        $lead_id = false;
        $request = ['request'=>['leads'=>['add'=>[$this->packValuesBody($data)]]]];
        $response = $this->api('private/api/v2/json/leads/set', [], $request);
        if($response && isset($response['leads']) && isset($response['leads']['add'])) $lead_id = $response['leads']['add'][0]['id'];
        return $lead_id;
    }



    public function setLeadStatus($lead_id, $status_id) {
        $request = [
            'request'=>[
                'leads'=>[
                    'update'=>[[
                        'id'=>$lead_id,
                        'last_modified'=>time(),
                        'status_id'=>$status_id
                    ]]
                ]
            ]
        ];

//        amoLog(['value'=>date('Y-m-d', strtotime(date('r') . " +$period month")) . ' 00:00:00']);

        $this->api('private/api/v2/json/leads/set', [], $request);

    }



    public function packValuesBody($values) {
        $result = [];
        $custom_fields = [];
        foreach ($values as $key=>$value) {
            if(is_numeric($key)) {
                if(is_array($value)) $custom_fields[] = ['id'=>$key, 'values'=>[['value'=>$value[0], 'enum'=>$value[1]]]];
                else $custom_fields[] = ['id'=>$key, 'values'=>[['value'=>$value]]];
            } else {
                $result[$key] = $value;
            }
        }
        $result['custom_fields'] = $custom_fields;
        return $result;
    }



    public function addContact( $data ){
        $contacts['request']['contacts']['add'][] = $this->packValuesBody($data);
        $contact = $this->api('private/api/v2/json/contacts/set', array(), $contacts );
        $contact = reset( $contact['contacts']['add'] );
        return isset($contact['id']) ?  $contact['id'] : false;
    }


    public function addLeadNote($lead_id, $text) {
        $note = $this->api('private/api/v2/json/notes/set', array(), [
            'request'=>['notes'=>['add'=>[
                [
                    'element_id'=> $lead_id,
                    'element_type'=>2, // 2 - сделка
                    'note_type'=>4,     // Обычное примечание,
                    'text'=>$text,
                    'responsible_user_id'=>AMO_USER_ID_RESPONSIBLE
                ]]]
            ]]);
        $note_id = reset( $note['notes']['add'] );
        return $note;

    }







    public function NormalizeRecord($rec) {
        $result = array();
        foreach ($rec as $key=>$val) {
            if($key=="custom_fields") {
                foreach ($val as $custom_value) {
                    if(count($custom_value['values'])==0) {
                        $result[$custom_value['name']] = false;
                    } else if(count($custom_value['values'])==1) {
                        $result[$custom_value['name']] = isset($custom_value['values'][0]['value']) ?  $custom_value['values'][0]['value'] : $custom_value['values'][0];
                    } else {
                        $values = [];
                        foreach ($custom_value['values'] as $v) $values[] =isset($v['value']) ? $v['value'] : $v;
                        $result[$custom_value['name']] = $values;
                    }
                    $result[$custom_value['id']] = $result[$custom_value['name']];
                }

            } else {
                $result[$key] = $val;
            }
        }
        return $result;
    }



    function getLeadsByIds($ids) {
        $result = [];
        while (count($ids)>0) {
            $query_ids = array_splice($ids,0, AMO_GET_IDS_COUNT);
            foreach ($query_ids as $idx=>$id) $query_ids[$idx] = "id[]=".$id;
            $list = $this->api('private/api/v2/json/leads/list?'.join("&", $query_ids));
            if(!is_array($list['leads'])) break;
            $result = array_merge($result, $list['leads']);
        }
        return $result;
    }

    function leadIsComplite($lead) {
        return $lead['status_id']==142 || $lead['status_id']==143;
    }


    function getLead($lead_id) {
        $lead = $this->api('private/api/v2/json/leads/list?id='.$lead_id);
        return isset($lead['leads'][0]) ? $lead['leads'][0] : false;
    }





    function addContactAndLead($name, $phone, $email = false, $message = false)
    {


        $contact = $this->checkDouble(AMO_CONTACTS_FIELD_EMAIL, $email, false);
        if (!$contact) $contact = $this->checkDouble(AMO_CONTACTS_FIELD_PHONE, $phone, false);
        if (!$contact) {
            $lead_id = $this->addLead(['name' => 'Сделка от ' . $name, 'status_id' => AMO_STATUS_PRIMARY_CONTACT]);
            if (!$lead_id) return false;
            if($message!==false) $this->addLeadNote($lead_id, $message);
            $contact_info = [
                'name' => $name,
                'linked_leads_id' => $lead_id,
                AMO_CONTACTS_FIELD_PHONE => [$phone, AMO_CONTACTS_FIELD_PHONE_TYPE],
            ];
            if($email!==false) $contact_info[AMO_CONTACTS_FIELD_EMAIL] = [$email, AMO_CONTACTS_FIELD_EMAIL_TYPE];
            $this->addContact($contact_info);
            return $lead_id;
        } else {
            $leads = $this->getLeadsByIds($contact['linked_leads_id']);
            $lead_id = false;
            $lead = false;
            foreach ($leads as $L) if(!$this->leadIsComplite($L)) {
                $lead = $L;
                $lead_id = $L['id'];
                break;
            }
            if (!$lead_id) {
                $lead_id = $this->addLead(['name' => 'Сделка от ' . $name, 'status_id' => AMO_STATUS_PRIMARY_CONTACT]);
                $this->api('private/api/v2/json/links/set', [], ['request' => ['links' => ['link' => [
                    [
                        'from_id' => $lead_id,
                        'to_id' => $contact['id'],
                        'from' => 'leads',
                        'to' => 'contacts'
                    ]
                ]]]]);
            } else {
                $this->createTask($lead_id, $lead['responsible_user_id'], "Связаться с клиентом");
            }
        }
        return $lead_id;
    }




}


