<?php

define('AMO_SUBDOMAIN', 'dantone');                       // суб домен в системе AMO CRM
define('AMO_LOGIN', 'dg@amopoint.ru');               // Login пользователя для автризации в Amo
define('AMO_HASH', '20f1a58a824b964f5a032ff1e9829c54');     // HASH пользователя для автризаици (см. settings/dev - "Ваш API ключ"


define('AMO_MAXIMUM_ELEMENTS',  500);
define('AMO_GET_IDS_COUNT',  50); // условно


define('AMO_STATUS_PRIMARY_CONTACT', 9215445); // Первичный контакт



define('AMO_CONTACTS_FIELD_EMAIL', 416988);
define('AMO_CONTACTS_FIELD_EMAIL_TYPE', 982600);

define('AMO_CONTACTS_FIELD_PHONE', 416986);
define('AMO_CONTACTS_FIELD_PHONE_TYPE', 982588);

define('AMO_CONTACTS_FIELD_CITY',  603767);
define('AMO_CONTACTS_FIELD_POSTCODE',  603777);
define('AMO_CONTACTS_FIELD_STREET',  603769);
define('AMO_CONTACTS_FIELD_BUILD',  603771);
define('AMO_CONTACTS_FIELD_KORPUS',  603773);
define('AMO_CONTACTS_FIELD_FLAT',  603775);


/**
 * Список идентификаторов пользователей, от имени которых осуществляются сделки
 */
global $AMO_RESPONSIBLE_USERS;
$AMO_RESPONSIBLE_USERS = [1495069, 1495066, 1495063, 1495054, 1466575, 1466572, 1466560];



global $_CATEGORIES_LIST;
$_CATEGORIES_LIST = [
    "City by James Patterson" => "city",
    "Свет" => "light",
    "Система гардеробных шкафов" => "sistema-garderobnyh-schafov",
    "Аксессуары для дома" => "home_accessories",
    "Мягкая мебель в наличии" => "soft-furniture-in-stock",
    "Dantone Dacha" => "dacha",
    "Ковры" => "alfombras",
    "Столы и консоли" => "tables_and_consoles",
    "Диваны" => "sofas",
    "Sale" => "discount",
    "Зеркала" => "mirrors",
    "Пуфы и банкетки" => "poufs_and_stools",
    "Шкафы и буфеты" => "cabinets_and_cupboards",
    "Тумбочки и комоды" => "bedside_tables_and_chests_of_drawers",
    "Кресла и стулья" => "armchairs_and_chairs",
    "Кровати и изголовья" => "bedroom",
    "Кухня Dantone" => "dantone-kitchen",
];