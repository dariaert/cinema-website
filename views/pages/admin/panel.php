<?php
$Genre = new \App\models\Genre();
$Movie = new \App\models\Movie();
$dataAllGenre = $Genre -> getAllGenre();
$dataAgeLimit = $Movie -> getAllAgeLimit();
?>
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
                <a href="/admin/genre">
                    <button class="btn-admin-panel">
                        <h4>Жанры</h4>
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

        <section class="all-films">
            <h2>Фильмы</h2>
            <hr style="margin-bottom: 0;">

            <?php foreach ($dataAllMovie as $item) { ?>

                <div class="film-content-list">
                    <div class="film-content-list-item" style="margin-bottom: 20px;">
                        <div class="film-content-list-item_item">
                            <span class="ageLimit" style="margin: 0; align-items: center"><?=$item['name_ageLimit']?></span>
                            <div class="btns-content" style="display: flex; gap: 15px;">
                                <a href="updateFilm.php?id=<?=$item['id_film']?>" class="btn-admin-panel">
                                    <div class="admin-panel-text">
                                        <div class="panel-icon">
                                            <img src="/../public/assets/images/Admin/Edit.svg" alt="">
                                        </div>
                                        <h4>Изменить</h4>
                                    </div>
                                </a>
                                <form action="/content/film/delete" method="post">
                                    <input type="hidden" name="film_id" id="film_id" value="<?=$item['id_film'] ?>">
                                    <input type="hidden" name="id_poster" id="id_poster" value="<?=$item['poster_film'] ?>">
                                    <button class="btn-admin-panel" type="submit">
                                        <div class="admin-panel-text">
                                            <div class="panel-icon">
                                                <img src="/../public/assets/images/Admin/Delete.svg" alt="">
                                            </div>
                                            <h4>Удалить</h4>
                                        </div>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="film-content-list-item">

                        <table style="width: 100%">
                            <tr>
                                <td class="show-table-zag show-table-content">Постер</td>
                                <td class="show-table-zag show-table-content">Название</td>
                                <td class="show-table-zag show-table-content">Жанр</td>
                                <td class="show-table-zag show-table-content">Режиссер</td>
                                <td class="show-table-zag show-table-content">В ролях</td>
                                <td class="show-table-zag show-table-content">Страна</td>
                                <td class="show-table-zag show-table-content">Продолжительность</td>
                                <td class="show-table-zag show-table-content">Описание</td>
                            </tr>
                            <tr>
                                <td class="show-table-content">
                                    <img src="<?='/public/storage/' . $item['poster_film']?>" alt="" class="poster-img">
                                </td>
                                <td class="show-table-content"><?=$item['name_film']?></td>
                                <td class="show-table-content"><?=$item['name_genre']?></td>
                                <td class="show-table-content"><?=$item['filmmaker']?></td>
                                <td class="show-table-content"><?=$item['actors']?></td>
                                <td class="show-table-content"><?=$item['country']?></td>
                                <td class="show-table-content">
                                    <?php
                                    $hours = floor($item['duration_film'] / 60);
                                    $minutes = $item['duration_film'] % 60;
                                    echo $hours . ' ' . (($hours == 1) ? 'час' : 'часа') . ' ' . $minutes . ' мин.';
                                    ?>
                                </td>
                                <td class="show-table-content"><?=$item['description']?></td>
                            </tr>
                        </table>

                    </div>
                </div>

            <?php
            }
            ?>

        </section>

        <section class="redact_film" style="margin: 50px 0 50px;">
                <h1>Добавление фильма</h1> <hr>

                <form action="/content/film/add" method="post" class="redact-film-form" enctype="multipart/form-data">
                    <div class="redact-film-form-block">

                        <div class="redact-film-form-block-item">
                            <input id="name_film" name="name_film" type="text" class="redact-input-genre" placeholder="Название" required>
                            <select name="name_genre" id="name_genre" class="redact-input-genre">
                                <?php foreach ($dataAllGenre as $item) { ?>
                                    <option><?= $item['name_genre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="redact-film-form-block-item">
                            <input style="width: 100%;" id="actors" name="actors" type="text" class="redact-input-genre" placeholder="Актеры">
                        </div>

                        <div class="redact-film-form-block-item">
                            <input id="duration" name="duration" type="text" class="redact-input-genre" placeholder="Продолжительность, мин" required>
                            <select name="name_ageLimit" id="name_ageLimit" class="redact-input-genre">
                                <?php foreach ($dataAgeLimit as $item) { ?>
                                    <option><?= $item['name_ageLimit'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="redact-film-form-block-item">
                            <input id="filmmaker" name="filmmaker" type="text" class="redact-input-genre" placeholder="Режиссер" required>
                            <input id="country" name="country" type="text" class="redact-input-genre" placeholder="Страна" required>
                        </div>

                        <input style="margin-top: 30px;" id="poster" name="poster" type="file" class="" required>
                    </div>

                    <div class="redact-film-form-block" style="margin-left: 20px">
                        <textarea style="width: 100%;" id="description" name="description" class="custom-textarea" placeholder="Описание" required></textarea> <br>
                        <button class="btn-admin-panel" type="submit" style="margin-top: 30px; position: absolute; right: 0;">
                            <div class="redact-text">
                                <div class="admin-panel-text">
                                    <div class="panel-icon">
                                        <img src="/../public/assets/images/Admin/Plus.svg" alt="">
                                    </div>
                                    <h4>Добавить</h4>
                                </div>
                            </div>
                        </button>
                    </div>

                </form>
        </section>

    </div>

</main>

<?php
include __DIR__ . '/../../components/footer.php';
?>

</div>

</body>
</html>