<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $date = date("Y-m-d");
    $date = localtime(time(), true);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
</head>
<body>
<div>
    <h1>Регистрация</h1>

    <form method="POST">
        <div>
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" placeholder="Введите имя" required>
        </div>

        <div>
            <label>Пол:</label>

            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Мужчина</label>

            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Женщина</label>
        </div>

        <div>
            <label for="age">Возраст:</label>
            <input type="number" id="age" name="age" placeholder="Введите возраст" required>
        </div>

        <div>
            <button type="submit">
                Отправить
            </button>
        </div>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div>
            <?= $name ?>
            <?= $gender ?>
            <?= $age ?>
            <?= $date['tm_year'] ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>

