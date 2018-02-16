<?
include_once "settings.php";
include_once "amo_lib.php";

function Amo_DoRegistration($email, $first_name, $last_name, $phone, $city) {
    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    $contact_id = $amo->checkDouble(AMO_CONTACTS_FIELD_EMAIL, $email);
    if($contact_id) return $contact_id;
    $contact_id = $amo->checkDouble(AMO_CONTACTS_FIELD_PHONE, $phone);
    if($contact_id) return $contact_id;

    $contact_id = $amo->addContact([
        'name'=>$first_name." ".$last_name,
        AMO_CONTACTS_FIELD_PHONE=>[$phone,AMO_CONTACTS_FIELD_PHONE_TYPE],
        AMO_CONTACTS_FIELD_EMAIL=>[$email,AMO_CONTACTS_FIELD_EMAIL_TYPE],
        AMO_CONTACTS_FIELD_CITY=>$city,
        'tags'=>'Регистрация'
    ]);
    return $contact_id;
}

function Amo_DoFeedback($name, $phone, $email, $message) {
    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    return $amo->addContactAndLead($name,[
        AMO_CONTACTS_FIELD_PHONE=>[$phone,AMO_CONTACTS_FIELD_PHONE_TYPE],
        AMO_CONTACTS_FIELD_EMAIL=>[$email,AMO_CONTACTS_FIELD_EMAIL_TYPE],
        'tags'=>'Обратная связь'
    ],[
            'message'=>$message,
            'tags'=>'Обратная связь'
        ]
    );
}

function Amo_DoCallback($name, $phone) {
    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    return $amo->addContactAndLead($name,[
        AMO_CONTACTS_FIELD_PHONE=>[$phone,AMO_CONTACTS_FIELD_PHONE_TYPE],
        'tags'=>'Заказать звонок'
        ], ['tags'=>'Заказать звонок']);
}

function Amo_DoOrder($first_name, $last_name, $email, $phone, $city, $street, $build, $korpus, $flat, $postcode, $basket, $comment) {
    $name = $first_name." ".$last_name;
    $price = bitrixBasketSumm($basket);
    $categories = bitrixBasketCategories($basket);
    $product_list = bitrixBasketList($basket);

    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    $message = $product_list;

    return $amo->addContactAndLead($name,[
        AMO_CONTACTS_FIELD_PHONE=>[$phone,AMO_CONTACTS_FIELD_PHONE_TYPE],
        AMO_CONTACTS_FIELD_EMAIL=>[$email,AMO_CONTACTS_FIELD_EMAIL_TYPE],
        AMO_CONTACTS_FIELD_CITY=>$city,
        AMO_CONTACTS_FIELD_STREET=>$street,
        AMO_CONTACTS_FIELD_BUILD=>$build,
        AMO_CONTACTS_FIELD_KORPUS=>$korpus,
        AMO_CONTACTS_FIELD_FLAT=>$flat,
        AMO_CONTACTS_FIELD_POSTCODE=>$postcode,
        'tags'=>'Оформить заказ'
        ],[
            'message'=>"Комментарий: \"$comment\"\r\n\r\nТовары:\r\n ".$message,
            'price'=>$price,
            'Категория'=>$categories,
            'tags'=>'Оформить заказ'
        ]
    );

}

function bitrixBasketSumm($basket) {
    if (!isset($basket['BASKET_ITEMS'])) return 0;
    if (!is_array($basket['BASKET_ITEMS'])) return 0;
    $result = 0;
    foreach ($basket['BASKET_ITEMS'] as $item) $result += $item['PRICE'];
    return $result;
}

function bitrixItem2Category($item) {
    global $_CATEGORIES_LIST;
    $cat = explode("/", $item['DETAIL_PAGE_URL']);
    if(!isset($cat[2])) return false;
    $cat = array_search($cat[2], $_CATEGORIES_LIST);
    if($cat===false) return false;
    return $cat;
}

function bitrixBasketCategories($basket) {
    global $_CATEGORIES_LIST;
    if (!isset($basket['BASKET_ITEMS'])) return [];
    if (!is_array($basket['BASKET_ITEMS'])) return [];
    $result = [];
    foreach ($basket['BASKET_ITEMS'] as $item) {
        /*
        $cat = explode("/", $item['DETAIL_PAGE_URL']);
        if(!isset($cat[2])) continue;
        $cat = array_search($cat[2], $_CATEGORIES_LIST);
        if($cat===false) continue;
        $result[$cat] = $cat;
        */
        //$cat = bitrixItem2Category($item);
        $cat = $item["IBLOCK_SECTION_ID"];
        if($cat) $result[$cat] = $cat;
    }
    $result = array_keys($result);
    return $result;
}

function bitrixBasketList($basket) {
    if (!isset($basket['BASKET_ITEMS'])) return "";
    if (!is_array($basket['BASKET_ITEMS'])) return "";
    $result = "";
    $nr = 1;
    foreach ($basket['BASKET_ITEMS'] as $item) {
        $category = bitrixItem2Category($item);
        $name = $item['NAME'];
        $quantity = $item['QUANTITY'];
        $price = 0 + $item['PRICE'];
        $summa = $price * $quantity;
        $result.= "$category - $name - $price - $quantity - $summa\n";
    }
    return $result;
}

function Amo_DoOrderCatalogKitchen($phone, $email) {
    global $AMO_RESPONSIBLE_USER_ID;
    $AMO_RESPONSIBLE_USER_ID = 2156509;
    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    $tags = "Получить каталог";
    $lead_id =  $amo->addContactAndLead($email,[
        AMO_CONTACTS_FIELD_PHONE=>[$phone,AMO_CONTACTS_FIELD_PHONE_TYPE],
        AMO_CONTACTS_FIELD_EMAIL=>[$email,AMO_CONTACTS_FIELD_EMAIL_TYPE],
        'tags'=>$tags
    ],[
            'tags'=>$tags,
            'status_id'=>18252883
        ]
    );
    return $lead_id;
}

function Amo_DoGetCalculationKitchen($name, $phone, $email, $message = false, $file_link = false) {
    global $AMO_RESPONSIBLE_USER_ID;
    $AMO_RESPONSIBLE_USER_ID = 2156509;
    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    $tags = "Получить расчет стоимости кухни";
    $lead_info =['tags'=>$tags,
        'status_id'=>18252883];
    $text = "";
    if($message!==false && strlen($message)>1) $text.= "Пожелание: ".$message."\r\n";
    if($file_link!==false) $text.="Планировка: ".$file_link."\r\n";
    if($text!="") $lead_info['message'] = $text;
    $lead_id =  $amo->addContactAndLead($name,[
        AMO_CONTACTS_FIELD_PHONE=>[$phone,AMO_CONTACTS_FIELD_PHONE_TYPE],
        AMO_CONTACTS_FIELD_EMAIL=>[$email,AMO_CONTACTS_FIELD_EMAIL_TYPE],
        'tags'=>$tags
    ], $lead_info );
    return $lead_id;
}