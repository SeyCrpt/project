<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Личный кабинет</title>
</head>

<body>
  <h1>Личный кабинет</h1>
  <p>Добро пожаловать, [имя пользователя]!</p>
  
  <h2>Мои данные</h2>
  <form action="#" method="POST">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" value="[имя пользователя]" disabled><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="[email пользователя]" disabled><br>
    
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" value="[пароль пользователя]"><br>
    
    <input type="submit" value="Сохранить изменения">
  </form>
  
  <h2>Мои заказы</h2>
  <table>
    <thead>
      <tr>
        <th>Номер заказа</th>
        <th>Дата заказа</th>
        <th>Статус</th>
        <th>Сумма</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>[номер заказа]</td>
        <td>[дата заказа]</td>
        <td>[статус заказа]</td>
        <td>[сумма заказа]</td>
      </tr>
      <!-- добавьте больше строк с заказами здесь -->
    </tbody>
  </table>
  
  <h2>Мои адреса доставки</h2>
  <ul>
    <li>[адрес доставки 1]</li>
    <li>[адрес доставки 2]</li>
    <!-- добавьте больше адресов доставки здесь -->
  </ul>

</body>
</html>

