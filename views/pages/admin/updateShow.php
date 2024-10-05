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

            <section class="redact_show-film">
                <div class="container">
                    <h1 style="margin-top: 50px;">Обновление сеанса</h1> <hr>
                    <form action="/content/show/redact" method="post" class="redact-show-form">
                        <input type="hidden" name="id" value="<?=$OneShow['id']?>">
                        <input id="date_show" name="date_show" type="date" class="redact-input" value="<?=$OneShow['date']?>" required>
                        <input id="time_show" name="time_show" type="time" class="redact-input" value="<?=$OneShow['time']?>" required>
                        <input id="cost_show" name="cost_show" type="text" class="redact-input-cost" placeholder="Цена" value="<?=$OneShow['cost']?>" required>
                        <select name="film-sel" id="film-sel" class="custom-select-film">
                            <?php foreach ($dataAllMovie as $item) {
                                if ($item['id_film'] == $OneShow['id_film']) { ?>
                                    <option selected="selected"><?= $item['name_film'] ?></option>
                                <?php } else { ?>
                                    <option><?= $item['name_film'] ?></option>
                            <?php }
                            }
                            ?>
                        </select>
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