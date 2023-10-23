<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Подключаемся к базе данных
    $db_host = "localhost"; // Имя хоста
    $db_user = "root"; // Имя пользователя базы данных
    $db_password = "root"; // Пароль пользователя базы данных
    $db_name = "registration"; // Имя базы данных
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    if (!$conn) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
    // Защита от SQL-инъекций
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    // Выбираем из базы данных запись с указанным логином
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) { // Если найдена одна запись
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        // Сверяем зашифрованный пароль из базы данных с введенным паролем
        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $username;
            header('Location: profile.php'); // Переадресация на страницу приветствия
            exit();
        }
    }
    mysqli_close($conn); // Закрываем соединение с базой данных
}
?>
