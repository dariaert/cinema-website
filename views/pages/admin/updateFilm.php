<?php
$Genre = new \core\models\Genre();
$Movie = new \core\models\Movie();
$dataAllGenre = $Genre -> getAllGenre();
$dataAgeLimit = $Movie -> getAllAgeLimit();
?><!doctype html>
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

            <section class="redact_film">
                <div class="container">
                    <h1>Обновление фильма</h1> <hr>
                    <form action="/content/film/redact" method="post" class="redact-film-form" enctype="multipart/form-data">
                        <div class="redact-film-form-block">
                            <div class="redact-film-form-block-item">
                                <input type="hidden" name="id" value="<?=$dataOneMovie['id_film']?>">
                                <input id="name" name="name" type="text" class="redact-input-genre" placeholder="Название" value="<?=$dataOneMovie['name_film']?>" required>
                                <select name="id_genre_film" id="id_genre_film" class="redact-input-genre">
                                    <?php foreach ($dataAllGenre as $item) {
                                        if ($item['id'] == $dataOneMovie['id_genre']) { ?>
                                            <option selected="selected"><?= $item['name_genre'] ?></option>
                                        <?php } else { ?>
                                            <option><?= $item['name_genre'] ?></option>
                                        <?php }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="redact-film-form-block-item">
                                <input style="width: 100%;" id="actors_film" name="actors_film" type="text" class="redact-input-genre" placeholder="Актеры" value="<?=$dataOneMovie['actors']?>">
                            </div>

                            <div class="redact-film-form-block-item">
                                <input id="duration" name="duration" type="text" class="redact-input-genre" placeholder="Продолжительность, мин" value="<?=$dataOneMovie['duration_film']?>" required>
                                <select name="ageLimit" id="ageLimit" class="redact-input-genre">
                                    <?php foreach ($dataAgeLimit as $item) {
                                        if ($item['id'] == $dataOneMovie['id_ageLimit']) { ?>
                                            <option selected="selected"><?= $item['name_ageLimit'] ?></option>
                                        <?php } else { ?>
                                            <option><?= $item['name_ageLimit'] ?></option>
                                        <?php }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="redact-film-form-block-item">
                                <input id="filmmaker_film" name="filmmaker_film" type="text" class="redact-input-genre" placeholder="Режиссер" value="<?=$dataOneMovie['filmmaker']?>" required>
                                <input id="country_film" name="country_film" type="text" class="redact-input-genre" placeholder="Страна" value="<?=$dataOneMovie['country']?>" required>
                            </div>

                            <input style="margin-top: 30px;" id="poster" name="poster" type="file" class="" required>
                        </div>

                        <div class="redact-film-form-block" style="margin-left: 20px">
                            <textarea style="width: 100%;" id="description_film" name="description_film" class="custom-textarea" placeholder="Описание" required><?=$dataOneMovie['description']?></textarea> <br>
                            <button class="btn-admin-panel" type="submit" style="margin-top: 30px; position: absolute; right: 0;">
                                <div class="admin-panel-text">
                                    <div class="panel-icon">
                                        <img src="/../public/assets/images/Admin/Edit.svg" alt="">
                                    </div>
                                    <h4>Обновить</h4>
                                </div>
                            </button>
                        </div>

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