<?php
use services\Helper;
Helper::checkUser();
?>
<!doctype html>
<html lang="en">
<?php
    include __DIR__ . '/../components/head.php';
?>
<body>

<div class="wrapper">

<?php
    include __DIR__ . '/../components/header.php';
?>

<main class="main">
    <div class="container">
        <div class="form-centre">
            <div class="register-form">
                <h1 class="form_title">Регистрация</h1>

                <form action="/auth/register" method="post" class="register_form">

                    <input
                            type="text"
                            id="FIO"
                            name="FIO"
                            class="custom-input"
                            placeholder="Имя и фамилия"
                            value="<?php echo Helper::old('FIO') ?>"
                            <?= Helper::validationErrorAttr('FIO'); ?>
                            required
                    ><br>
                    <?php if(Helper::hasValidationError('FIO')): ?>
                        <small><?= Helper::validationErrorMessage('FIO'); ?></small> <br>
                    <?php endif; ?>
                    <input
                            type="email"
                            id="email"
                            name="email"
                            class="custom-input"
                            placeholder="E-mail"
                            value="<?php echo Helper::old('email') ?>"
                            <?= Helper::validationErrorAttr('email'); ?>
                            required
                    > <br>
                    <?php if(Helper::hasValidationError('email')): ?>
                        <small><?= Helper::validationErrorMessage('email'); ?></small> <br>
                    <?php endif; ?>
                    <input
                            type="password"
                            id="password"
                            name="password"
                            class="custom-input"
                            placeholder="Пароль"
                            <?= Helper::validationErrorAttr('password'); ?>
                            required
                    > <br>
                    <?php if(Helper::hasValidationError('password')): ?>
                        <small><?= Helper::validationErrorMessage('password'); ?></small> <br>
                    <?php endif; ?>
                    <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="custom-input"
                            placeholder="Подтверждение пароля"
                            required
                    ><br>
                    <button
                            type="submit"
                            class="btn"
                    >
                        Создать аккаунт
                    </button>

                </form>

            </div>
        </div>
    </div>
</main>

<?php
    include __DIR__ . '/../components/footer.php';
?>

</div>

</body>
</html>