<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные формы
    $name = htmlspecialchars($_POST['user_name']);
    $email = htmlspecialchars($_POST['user_email']);
    $phone = htmlspecialchars($_POST['user_phone']);
    $agreement = isset($_POST['agreement']) ? 'Согласен' : 'Не согласен';

    // Настройки почты
    $to = 'bellyab@mail.ru';
    $subject = 'Новая заявка с сайта';
    $message = "Имя: $name\nТелефон: $phone\nПочта: $email\nСоглашение: $agreement";
    $headers = "From: webmaster@example.com\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Отправляем почту
    if (mail($to, $subject, $message, $headers)) {
        echo 'Сообщение отправлено.';
    } else {
        echo 'Ошибка отправки сообщения.';
    }
} else {
    echo 'Некорректный метод отправки данных.';
}
?>
