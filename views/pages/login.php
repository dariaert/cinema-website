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
            <div class="login-form">
                <h1 class="form_title">Вход</h1>

                <?php if(Helper::hasMessage('error')): ?>
                    <div class="notice error"><?php echo Helper::getMessage('error') ?></div>
                <?php endif; ?>

                <form action="/auth/login" method="post" class="register_form">
                    <input type="email"
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
                    <input type="password"
                           id="password"
                           name="password"
                           class="custom-input"
                           placeholder="******"
                           required
                    > <br>
                    <button
                            type="submit"
                            class="btn"
                    >
                        Войти
                    </button>
                </form>
                <div class="register-link">
                    <a href="/register">Зарегистрироваться</a>
                </div>

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