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
if (!isset($_SESSION['user'])) {
    \services\Helper::redirect('/login');
    exit();
}
$Ticket = new \core\models\Ticket();
$AllSeat = $Ticket -> getAllSeat($dataOneShow['id']);
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

            <section class="booking_film">
                <div class="booking_film-container">
                    <div class="poster-booking_film-container">
                        <div class="poster-booking_film">
                            <img src="<?='/src/uploads/' . $dataOneShow['poster_film']?>" alt="" class="poster_booking_film-img">
                        </div>
                    </div>
                    <div class="booking_film-text">
                        <div class="booking_film-name-film">
                            <h1><?=$dataOneShow['name_film']?></h1>
                        </div>

                        <div class="booking_film-block">
                            <?php $month = $months[date('n', strtotime($dataOneShow['date']))]; ?>
                            <h4><?= date("j $month Y",strtotime($dataOneShow['date'])) . ' в ' . date('H:i',strtotime($dataOneShow['time'])) ?></h4>
                            <h4>
                                <?php
                                $hours = floor($dataOneShow['duration_film'] / 60);
                                $minutes = $dataOneShow['duration_film'] % 60;
                                echo $hours . ' ' . (($hours == 1) ? 'час' : 'часа') . ' ' . $minutes . ' мин.';
                                ?>
                            </h4>
                            <h4><?=$dataOneShow['cost'] . '₽'?></h4>
                        </div>

                    </div>
                </div>

            </section>

            <section class="booking-seat-form">

                <div class="screen-booking">

                    <img src="/public/assets/images/Icons/Screen.svg" alt="" class="screen-booking-img">

                </div>

                <form class="select-seat-form" method="post" action="/booking/seat">
                    <input type="hidden" name="activeSeat" id="activeSeat" value="">
                    <input type="hidden" name="activeShow" id="activeShow" value="<?= $dataOneShow['id'] ?>">
                    <input type="hidden" name="activeCost" id="activeCost" value="<?= $dataOneShow['cost'] ?>">
                    <?php
                    // Количество рядов и флажков в каждом ряду
                    $rows = 9;
                    $checkboxes_per_row = 20;

                    // Цикл для генерации рядов
                    for ($i = 0; $i < $rows; $i++) {
                        echo "<div class='checkbox-row'>";
                        // Цикл для генерации флажков в текущем ряду
                        $label_counter = 1;
                        $num_rows = $i + 1;
                        echo "<h4 class='num_rows_label-left'>$num_rows</h4>";
                        foreach (range(1, $checkboxes_per_row) as $j) {
                            $checkbox_id = ($i * $checkboxes_per_row + $j);
                            $disabled = in_array(($i * $checkboxes_per_row + $j), $AllSeat) ? "disabled" : "";
                            echo "<input type='checkbox' id='$checkbox_id' name='$checkbox_id' class='custom-checkbox' $disabled>";
                            echo "<label for='$checkbox_id' class='text-seat'>$label_counter</label>";
                            $label_counter++;
                        }
                        echo "<h4 class='num_rows_label-right'>$num_rows</h4>";
                        echo "</div> <br>";
                    }
                    ?>

                    <div class="chairs-example">
                        <div class="example">
                            <img src="/public/assets/images/Icons/Icon_chair_white.svg" alt="">
                            <h4 class="text-example">Свободно</h4>
                        </div>
                        <div class="example">
                            <img src="/public/assets/images/Icons/Icon_chair_red.svg" alt="">
                            <h4 class="text-example">Выбранное вами</h4>
                        </div>
                        <div class="example">
                            <img src="/public/assets/images/Icons/Icon_chair_black.svg" alt="">
                            <h4 class="text-example">Занято</h4>
                        </div>
                    </div>

                    <button type="submit" class="btn" style="margin-top: 50px">Купить</button>

                </form>

            </section>

        </div>
    </main>

    <?php
    include __DIR__ . '/../components/footer.php';
    ?>

</div>

<script>
    // Получаем все флажки
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Создаем массив для хранения id активных флажков
    var activeCheckboxes = [];

    // Добавляем обработчик события для каждого флажка
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Если флажок активен, добавляем его id в массив
            if (this.checked) {
                activeCheckboxes.push(this.id);
            } else { // Если флажок неактивен, удаляем его id из массива
                var index = activeCheckboxes.indexOf(this.id);
                if (index !== -1) {
                    activeCheckboxes.splice(index, 1);
                }
            }
            // Выводим содержимое массива в консоль (можно заменить на другие действия)
            document.getElementById('activeSeat').value = JSON.stringify(activeCheckboxes);
            console.log(activeCheckboxes);
        });
    });
</script>

</body>
</html>