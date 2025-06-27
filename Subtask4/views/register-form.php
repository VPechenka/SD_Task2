<?php require __DIR__ . '/../controllers/register-controller.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самая добрая регистрация</title>
    <link href="./../static/css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Самая добрая регистрация</h1>

    <form method="POST">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name"
                   placeholder="Введите имя" required
                   value="<?= htmlspecialchars($name) ?>">
        </div>

        <div class="form-group">
            <label>Пол:</label>

            <div class="radio-group">

                <div class="radio-option">
                    <input type="radio" id="male" name="gender"
                           value="male" required
                        <?= ($gender === 'male') ? 'checked' : '' ?>>
                    <label for="male">Мужчина</label>
                </div>

                <div class="radio-option">
                    <input type="radio" id="female" name="gender"
                           value="female" required
                        <?= ($gender === 'female') ? 'checked' : '' ?>>
                    <label for="female">Женщина</label>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="age">Возраст:</label>
            <input type="number" id="age" name="age"
                   placeholder="Введите возраст" required min="0"
                   value="<?= htmlspecialchars($age) ?>"
            >
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password"
                   placeholder="Введите пароль" required>
        </div>

        <button type="submit">
            Отправить
        </button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php if (isset($error)): ?>
            <div class="error-message">
                <p class="message-text">
                    Кажется вышла какая-то ошибочка
                </p>

                <p class="message-text">
                    <?= $error; ?>
                </p>
            </div>
        <?php else: ?>
            <div class="success-message">
                <p class="message-text">
                    Добрейше<?= $user->get_datetime_phrase() ?>,
                    <?= $user->age_gender_phrase ?>
                    <?= htmlspecialchars($user->name) ?>!!!
                </p>

                <p class="message-text">
                    Спасибо за регистрацию <3
                </p>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
