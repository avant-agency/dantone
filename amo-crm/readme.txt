Скопировать файлы
- amo.php
- amo_lib.php
- settings.php
- cookies.txt (дать разрешение на запись)
- defines.json (дать разрешение на запись)
- amo_users.txt (дать разрешение на запись)
в любую папку

В нужном месте выполнить
include "amo.php";
с соответствующим путём к файлу

Далее вызвать одну из нижеописанных функций:

1. Регистрация пользователя. Действие - создание контакта, согласно заданию
Amo_DoRegistration($email, $first_name, $last_name, $phone, $city)

2. Отправка формы обратной связи. Действие - создание контакта и сделки, согласно задания.
Amo_DoFeedback($name, $phone, $email, $message)

3. Отправка формы обратного звонка. Действие - создание контакта и сделки, согласно задания.
Amo_DoCallback($name, $phone)

4. Отправка заказа покупалеля в интернет магазине
Amo_DoOrder($first_name, $last_name, $email, $phone, $city, $street, $build, $korpus, $flat, $postcode, $basket, $comment)
$first_name -  Имя
$last_name - Фамилия
$email - емейл
$phone - телефон
$city - город
$street - улица
$build - дом
$korpus - корпус
$flat - квартира
$postcode - индекс
$basket - такой же снимок корзины, что присылали в виде ассоциативного массива
$comment - комментарий пользователя


