<?php

$subject = 'MY TEST EMAIL';

$firstName = 'Oleh';
$lastName = 'Niemoniezhyn';
$city = 'Odesa';
$course = 'Back-end програмування';
$group = 'group 529';
$footer = 'Дякуємо за реєстрацію!';

$text1 = "Ім'я: {$firstName}\n";
$text2 = "Прізвище: {$lastName}\n";
$text3 = "Місто: {$city}\n";
$text4 = "Курс: {$course}\n";
$text5 = "Група: {$group}\n";
$text6 = "Підпис: {$footer}\n";

$message = $text1 . $text2 . $text3 . $text4 . $text5;
$message .= $text6;

echo "============\n";
echo $subject . "\n";
echo "============\n";
echo $message;

$headers = 'From: o.r.niemoniezhyn@student.khai.edu';

$result = mail(
    'o.r.niemoniezhyn@student.khai.edu',
    $subject,
    $message,
    $headers
);

if ($result) {
    echo "\nЛист успішно відправлено!\n";
} else {
    echo "\nПомилка при відправці листа!\n";
}

?>