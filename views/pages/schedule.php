<?php
$months = [
    1 => 'января',
    2 => 'февраля',
    3 => 'марта',
    4 => 'апреля',
    5 => 'мая',
    6 => 'июня',
    7 => 'июля',
    8 => 'августа',
    9 => 'сентября',
    10 => 'октября',
    11 => 'ноября',
    12 => 'декабря'
];

$today = date("Y-m-d");
$todayIndex = array_search($today, array_column($dataAllDate, 'date'));

$Ticket = new \App\models\Ticket();
$id_allshow = $Ticket->delAllTicket();
?>
<!doctype html>
<html lang="en">
<?php
include __DIR__ . '/../components/head.php';
?>
<body>
<style>
    <?php
    // Генерация CSS правил для привязки радиокнопок к содержимому
    $numTabs = count($dataAllDate);
    for ($i = 1; $i <= $numTabs; $i++) {
        echo "#tab-btn-$i:checked ~ #content-$i {
            display: block;
        }";
    }
    ?>
</style>
<div class="wrapper">

    <?php
    include __DIR__ . '/../components/header.php';
    ?>

    <main class="main">
        <div class="container">

            <section class="tab-schedule">

                <?php
                $k = 0;
                foreach ($dataAllDate as $key => $item) {
                    $k += 1;
                    $date = strtotime($item['date']);
                    $day = date('j', $date); // Получаем число месяца без ведущих нулей
                    $month = $months[date('n', $date)]; // Получаем название месяца из массива $months
                ?>
                    <input <?= $key === $todayIndex ? "checked" : "" ?> id="<?= "tab-btn-" . $k ?>" name="tab-btn" type="radio" class="tab-schedule-list_item">
                    <label for="<?= "tab-btn-" . $k ?>"><?= "$day $month" ?></label>

                <?php
                }
                ?>

                <br><h1 id="selected-date" style="font-weight: 500; margin: 50px 0 50px"><?= 'Расписание сеансов на ' . date("j $month",strtotime($today)) . ':'?></h1>

                <?php

                $k = 0;
                foreach ($dataAllDate as $item) {
                    $k += 1;
                    ?>
                    <div class="tab-content" id="<?= "content-" . $k ?>">
                        <?php
                        $printedMovies = array(); // Массив для отслеживания уже выведенных id_film
                        // Фильтрация фильмов по выбранной дате
                        $selectedDate = date("Y-m-d", strtotime($item['date']));
                        $AllDataOneDate = new \App\models\Schedule();
                        $AllMovieOneDate = $AllDataOneDate -> getAllMovieOneDate($selectedDate);
//                        print_r($AllMovieOneDate);

                        foreach ($AllMovieOneDate as $movie) {
                            // Проверяем, был ли уже выведен фильм с таким же id_film
                            if (!in_array($movie['id_film'], $printedMovies)) {

                        ?>

                                <div class="content-schedule-list_item" style="margin-bottom: 60px;">

                                    <div class="about_film-container">

                                        <div class="poster-content-schedule-container">
                                            <div class="poster-content-schedule">
                                                <img src="<?='/public/storage/' . $movie['poster_film']?>" alt="" class="poster_content-schedule-img">
                                            </div>
                                            <span class="about_film-ageLimit"><?=$movie['name_ageLimit']?></span>
                                        </div>

                                        <div class="about_film-text">

                                            <div class="about_film-name-film">
                                                <h1><?=$movie['name_film']?></h1>
                                            </div>

                                            <div class="about_film-block-criteria">
                                                <div class="about_film-criteria">Жанр:</div>
                                                <div class="about_film-info"><?=$movie['name_genre']?></div>
                                            </div>

                                            <div class="about_film-block-criteria">
                                                <div class="about_film-criteria">Продолжительность:</div>
                                                <div class="about_film-info">
                                                    <?php
                                                    $hours = floor($movie['duration_film'] / 60);
                                                    $minutes = $movie['duration_film'] % 60;
                                                    echo $hours . ' ' . (($hours == 1) ? 'час' : 'часа') . ' ' . $minutes . ' мин.';
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="schedule-time-list">

                                                <?php
                                                $Time = new \App\models\Schedule();
                                                $AllTime = $Time -> getTime($selectedDate, $movie['id_film']);
                                                foreach ($AllTime as $item) {
                                                ?>

                                                    <div class="schedule-time-list_item">
                                                        <form action="/booking" method="GET">
                                                            <input type="hidden" name="id_show" id="id_show" value="<?=$item['id']?>">
                                                            <button class="btn-time" type="submit">
                                                                <h4><?= date('H:i',strtotime($item['time'])) ?></h4>
                                                                <h4 class="text-schedule-time"><?= $item['cost'] . "₽" ?></h4>
                                                            </button>
                                                        </form>
                                                    </div>

                                                <?php
                                                }
                                                ?>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                        <?php
                                // Добавляем id_film в массив уже выведенных фильмов
                                $printedMovies[] = $movie['id_film'];
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>


            </section>

        </div>
    </main>

    <?php
    include __DIR__ . '/../components/footer.php';
    ?>

</div>

<script>
    window.onload = function() {
        var radioButtons = document.querySelectorAll('.tab-schedule-list_item');
        var h1 = document.getElementById('selected-date');

        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                if (this.checked) {
                    var label = this.nextElementSibling;
                    h1.textContent = 'Расписание сеансов на ' + label.textContent + ':';
                }
            });
        });
    };
</script>

</body>
</html>