<?php
//$_POST['fio'] = 'alex ivanov';
//$_POST['email'] = 'ivsn@googles.ua';
//$_POST['phone'] = '0033444555';

if (isset($_POST['fio']) && $_POST['fio']!='' && isset($_POST['email']) && $_POST['email']!='' ) {
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
        $to  = 'alexxlu@mail.ru';
        $subject = 'Вам відправили запит';
        $message = "Користувач $fio з email $email і телефоном $phone відправив вам запит";
    $res = mail ($to, $subject, $message);
    if ($res) {
        echo 'Лист надіслано';
    }
    else {
        echo 'Помилка відправлення. Перевірте правильність написання email';
    }
}
else {
    echo 'Помилка! Введіть правильні дані';
}


?>