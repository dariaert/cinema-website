<?php
use services\Helper;
if (!isset($_SESSION['user'])) {
    \services\Helper::redirect('/login');
    exit();
}
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

            <div class="title-ticket-section">
                <h1>Действующие билеты</h1>
            </div>

            <section class="all-tickets-list">

                <?php
                foreach ($AllTicket as $item) { ?>

                    <div class="all-tickets-list_item">

                        <div class="all-tickets-list_item-text">

                            <h4><?= date("d.m.Y H:i:s",strtotime($item['dateBoking'])) ?></h4>

                            <h2 style="font-weight: 400; margin-top: 10px;"><?= "№" . $item['id_ticket'] ?></h2>

                            <hr style="margin: 20px 0 20px">

                            <h2 style="font-weight: 400"><?= $item['name_film']?></h2>

                            <?php $month = $months[date('n', strtotime($item['date']))]; ?>
                            <h4 style="margin-top: 18px;"><?= date("j $month Y",strtotime($item['date'])) . ' в ' . date('H:i',strtotime($item['time'])) ?></h4>

                            <div class="all-tickets-list_item-text_line">

                                <div class="all-tickets-list_item-text-cost">

                                    <h2 style="font-weight: 400"><?= $item['cost'] . '₽' ?></h2>

                                </div>

                                <div class="all-tickets-list_item-text-seat">

                                    <h2 style="font-weight: 400"><?= $item['row'] . ' РЯД ' . $item['seat_number'] . ' МЕСТО' ?></h2>

                                </div>

                            </div>

                        </div>

                        <div class="all-tickets-list_item-code">

                            <img src="/public/assets/images/Icons/QR-CODE.svg">

                        </div>

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

</body>
</html>