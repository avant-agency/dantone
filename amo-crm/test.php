<?php


include "amo.php";
$rand = rand(100,999);
$basket = json_decode(file_get_contents("arOrder.txt"), true);
Amo_DoOrder("Тест", "Корзинович $rand", "test_$rand@basket.com.ru.net","+7 ($rand) 322 22 32", "Москва", "Староколпакский переулок", 12,14,23, "299$rand", $basket, "Хочу чтобы сложили в большую коробку и перемотали скотчем.");


?>
