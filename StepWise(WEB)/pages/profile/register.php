<?php
// Подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

// Выбираем таблицу для работы
$table_name = "users";

// Получаем данные из формы
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Проверяем, что все поля заполнены
if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
  echo "Please fill out all fields.";
  exit;
}

// Проверяем, что адрес электронной почты соответствует формату
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format.";
  exit;
}

// Проверяем, что пароль и повторный ввод пароля совпадают
if ($password != $confirm_password) {
  echo "Passwords do not match.";
  exit;
}

// Хэшируем пароль для сохранения в базе данных
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Добавляем нового пользователя в базу данных
$sql = "INSERT INTO $table_name (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
  echo "Account created successfully.";
} else {
  echo "Error creating account: " . $conn->error;
}

// Закрываем соединение с базой данных
$conn->close();

header('Location: login.html');
exit;
?>
