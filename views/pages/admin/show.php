<?php
$Movie = new \core\models\Movie();
$dataAllMovie = $Movie -> getAllMovie();
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
                    <a href="/admin/panel">
                        <button class="btn-admin-panel">
                            <h4>Фильмы</h4>
                        </button>
                    </a>
                </div>
            </div>

            <section class="all-shows" style="margin-top: 50px;">

                <h2>Сеансы</h2>

                <?php foreach ($dataAllShow as $item) { ?>
                    <hr style="margin: 30px 0 30px">
                    <div class="shows-content-list">
                        <div class="shows-content-list-item">
                            <table style="border-collapse: separate;">
                                <tr>
                                    <td class="show-table-zag show-table-content">Дата</td>
                                    <td class="show-table-zag show-table-content">Время</td>
                                    <td class="show-table-zag show-table-content">Цена</td>
                                    <td class="show-table-zag show-table-content">Фильм</td>
                                </tr>
                                <tr>
                                    <td class="show-table-content"><?= $item['date'] ?></td>
                                    <td class="show-table-content"><?= $item['time'] ?></td>
                                    <td class="show-table-content"><?= $item['cost'] ?></td>
                                    <td class="show-table-content"><?= $item['name_film'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="shows-content-list-item" style="align-items: center">
                            <div class="panel-icon">
                                <a href="updateShow.php?id=<?=$item['id']?>">
                                    <img src="/../public/assets/images/Admin/Edit.svg" alt="">
                                </a>
                            </div>
                            <div class="panel-icon">
                                <form action="/content/show/delete" method="post">
                                    <input type="hidden" name="id" id="id" value="<?=$item['id'] ?>">
                                    <button type="submit" class="btn-icon">
                                        <img src="/../public/assets/images/Admin/Delete.svg" alt="">
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                <? } ?>

            </section>

            <section class="add_show-film">
                <h1 style="margin-top: 50px;">Добавление сеанса</h1> <hr>
                <form action="/content/show/add" method="post" class="redact-show-form">

                    <input id="date" name="date" type="date" class="redact-input" required>
                    <input id="time" name="time" type="time" class="redact-input" required>
                    <input id="cost" name="cost" type="text" class="redact-input-cost" placeholder="Цена" required>
                    <select name="film-sel" id="film-sel" class="custom-select-film">
                        <?php foreach ($dataAllMovie as $item) { ?>
                            <option><?= $item['name_film'] ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn-admin-panel" type="submit">
                        <div class="admin-panel-text">
                            <div class="panel-icon">
                                <img src="/../public/assets/images/Admin/Plus.svg" alt="">
                            </div>
                            <h4>Добавить</h4>
                        </div>
                    </button>

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