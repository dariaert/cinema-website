<!doctype html>
<html lang="en">
<?php
include __DIR__ . '/../../components/head.php';
?>
<body>

<div class="wrapper">

<?php
include __DIR__ . '/../../components/header.php';
?>

    <main class="main">

        <div class="container">

            <section class="redact_genre-film">
                <div class="redact_genre-block">
                    <h1>Обновление жанра</h1>
                    <form action="/content/genre/redact" method="post" class="redact-show-form">
                        <input type="hidden" name="id" value="<?=$dataOneGenre['id']?>">
                        <input id="name" name="name" type="text" class="redact-input-genre" value="<?=$dataOneGenre['name_genre']?>" required>
                        <button class="btn-admin-panel" type="submit">
                            <div class="admin-panel-text">
                                <div class="panel-icon">
                                    <img src="/../public/assets/images/Admin/Edit.svg" alt="">
                                </div>
                                <h4>Обновить</h4>
                            </div>
                        </button>
                    </form>
                </div>
            </section>

        </div>

    </main>

<?php
include __DIR__ . '/../../components/footer.php';
?>

</div>

</body>
</html>