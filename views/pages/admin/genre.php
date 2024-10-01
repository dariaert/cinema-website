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

            <div class="button-panel-list">
                <div class="button-panel-list-item">
                    <a href="/admin/panel">
                        <button class="btn-admin-panel">
                            <h4>Фильмы</h4>
                        </button>
                    </a>
                </div>
                <div class="button-panel-list-item">
                    <a href="/admin/show">
                        <button class="btn-admin-panel">
                            <h4>Сеансы</h4>
                        </button>
                    </a>
                </div>
            </div>

            <section class="all-genres" style="margin: 50px 0 50px;">

                <h2>Жанры</h2>
                <?php foreach ($dataAllGenre as $item) { ?>
                    <div class="genre-content-list">
                        <div class="genre-content-list-item">
                            <h3><?= $item['name_genre'] ?></h3>
                        </div>
                        <div class="genre-content-list-item">
                            <div class="panel-icon">
                                <a href="updateGenre.php?id=<?=$item['id']?>">
                                    <img src="/../public/assets/images/Admin/Edit.svg" alt="">
                                </a>
                            </div>
                            <div class="panel-icon">
                                <form action="/content/genre/delete" method="post">
                                    <input type="hidden" name="id" value="<?=$item['id'] ?>">
                                    <button type="submit" class="btn-icon">
                                        <img src="/../public/assets/images/Admin/Delete.svg" alt="">
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </section>

            <section class="redact_genre-film" style="margin-bottom: 50px;">
                <div class="redact_genre-block">
                    <h1>Добавление жанра</h1>
                    <form action="/content/genre/add" method="post" class="redact-show-form">
                        <input id="genre" name="genre" type="text" class="redact-input-genre" placeholder="Название" required>
                        <button class="btn-admin-panel">
                            <div class="admin-panel-text">
                                <div class="panel-icon">
                                    <img src="/../public/assets/images/Admin/Plus.svg" alt="">
                                </div>
                                <h4>Добавить</h4>
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