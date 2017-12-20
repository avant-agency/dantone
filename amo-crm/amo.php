<?php


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
        AMO_CONTACTS_FIELD_CITY=>$city
    ]);
    return $contact_id;
}

function Amo_DoFeedback($name, $phone, $email, $message) {
    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    return $amo->addContactAndLead($name, $phone, $email, $message);
}


function Amo_DoCallback($name, $phone) {
    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);
    return $amo->addContactAndLead($name, $phone);
}

function Amo_DoOrder($first_name, $last_name, $email, $phone, $message, $city, $street, $house, $apartment, $postcode) {
    $name = $first_name." ".$last_name;

    $amo = new AmoCrmApi(AMO_SUBDOMAIN, AMO_LOGIN, AMO_HASH);

    $amo->addLead(['name' => 'Сделка от ' . $name, 'status_id' => AMO_STATUS_PRIMARY_CONTACT]);
    $contact_id = $amo->checkDouble(AMO_CONTACTS_FIELD_EMAIL, $email);
    if(!$contact_id)  $contact_id = $amo->checkDouble(AMO_CONTACTS_FIELD_PHONE, $phone);
    if(!$contact_id)  {
//        $contact_id = $amo->addContact()
    }
}