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
        <div class="slider">
            <div class="slides">
                <img class="servers_image" src="../../public/assets/images/Banner/Slide1.svg" alt="">
                <img class="servers_image" src="../../public/assets/images/Banner/Slide2.svg" alt="">
                <img class="servers_image" src="../../public/assets/images/Banner/Slide3.svg" alt="">
                <img class="servers_image" src="../../public/assets/images/Banner/Slide4.svg" alt="">
                <img class="servers_image" src="../../public/assets/images/Banner/Slide1.svg" alt="">
            </div>
        </div>
        <div class="container">
            <div class="poster-title">
                <h1>Афиша</h1>
            </div>

            <div class="poster_list">

                <?php foreach ($dataAllMovie as $item)
                {
                ?>

                    <a href="about.php?id=<?=$item['id_film']?>">
                        <div class="poster-list-item">
                            <div class="poster-list-item-img">
                                <img src="<?='/src/uploads/' . $item['poster_film']?>" alt="" class="poster-item-img">
                            </div>
                            <span class="ageLimit"><?=$item['name_ageLimit']?></span>
                            <div class="poster-after-hover">
                                <div class="poster-after-hover-text">
                                    <div class="poster-genre"><?=$item['name_genre']?></div>
                                    <div class="poster-name"><?=$item['name_film']?></div>
                                    <div class="poster-name">
                                        <?php
                                        $hours = floor($item['duration_film'] / 60);
                                        $minutes = $item['duration_film'] % 60;
                                        echo $hours . ' ' . (($hours == 1) ? 'час' : 'часа') . ' ' . $minutes . ' мин.';
                                        ?>
                                    </div>
                                </div>
                                <span class="ageLimit"><?=$item['name_ageLimit']?></span>
                            </div>
                        </div>
                    </a>

                <?php
                }
                ?>

            </div>

        </div>
</main>

<?php
include __DIR__ . '/../components/footer.php';
?>

</div>

</body>
</html>



