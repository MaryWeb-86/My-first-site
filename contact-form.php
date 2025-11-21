<?php

/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$tel = htmlspecialchars($_POST["tel"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);

/* Ваш адрес и тема сообщения */
$address = "boorkof@mail.ru";
$sub = "Сообщение с сайта boorkof33.ru";

/* Формат письма */
$mes = "Сообщение с сайта boorkof33.ru.\n
Имя отправителя: $name 
Телефон отправителя: $tel
Текст сообщения:
$message";


if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name \r\n";
if (mail($address, $sub, $mes, $from)) {
	header('Refresh: 5; URL=http://boorkof33.ru/index.html');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо отправлено, через 5 секунд вы вернетесь на Главную страницу</body>';}
else {
	header('Refresh: 5; URL=http://boorkof33.ru/contacts.html');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо не отправлено, через 5 секунд вы вернетесь на страницу Контакты</body>';}
}
exit; /* Выход без сообщения, если поле bezspama чем-то заполнено */
?>