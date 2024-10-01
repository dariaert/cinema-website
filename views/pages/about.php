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

            <section class="about_film">
                <div class="about_film-container">
                    <div class="poster-about_film-container">
                        <div class="poster-about_film">
                            <img src="<?='/src/uploads/' . $dataOneMovie['poster_film']?>" alt="" class="poster_about_film-img">
                        </div>
                        <span class="about_film-ageLimit"><?=$dataOneMovie['name_ageLimit']?></span>
                    </div>
                    <div class="about_film-text">
                        <div class="about_film-name-film">
                            <h1><?=$dataOneMovie['name_film']?></h1>
                        </div>

                        <div class="about_film-block-criteria">
                            <div class="about_film-criteria">Жанр:</div>
                            <div class="about_film-info"><?=$dataOneMovie['name_genre']?></div>
                        </div>

                        <div class="about_film-block-criteria">
                            <div class="about_film-criteria">Режиссер:</div>
                            <div class="about_film-info"><?=$dataOneMovie['filmmaker']?></div>
                        </div>

                        <?php
                        if($dataOneMovie['actors'] != null) {
                        ?>
                            <div class="about_film-block-criteria">
                                <div class="about_film-criteria">В ролях:</div>
                                <div class="about_film-info"><?=$dataOneMovie['actors']?></div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="about_film-block-criteria">
                            <div class="about_film-criteria">Страна:</div>
                            <div class="about_film-info"><?=$dataOneMovie['country']?></div>
                        </div>

                        <div class="about_film-block-criteria">
                            <div class="about_film-criteria">Продолжительность:</div>
                            <div class="about_film-info">
                                <?php
                                $hours = floor($dataOneMovie['duration_film'] / 60);
                                $minutes = $dataOneMovie['duration_film'] % 60;
                                echo $hours . ' ' . (($hours == 1) ? 'час' : 'часа') . ' ' . $minutes . ' мин.';
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
                <?php
                if(isset($_SESSION["user"])){
                    $Favourites = new \core\models\Favourites();
                    $dataOneFav = $Favourites->getOneFav($dataOneMovie['id_film']);
                    if(!empty($dataOneFav)){
                ?>
                    <form action="/content/favourite/delete" method="post" class="form-favourite">
                        <input type="hidden" name="id" id="id" value="<?=$dataOneMovie['id_film'] ?>">
                        <button type="submit" class="favourite_btn">
                            <div class="heart-icon">
                                <img src="../../public/assets/images/Icons/header_red_heart.svg" alt="">
                            </div>
                        </button>
                    </form>
                <?php
                    } else {
                ?>
                    <form action="/content/favourite/add" method="post" class="form-favourite">
                        <input type="hidden" name="id" id="id" value="<?=$dataOneMovie['id_film'] ?>">
                        <button type="submit" class="favourite_btn">
                            <div class="heart-icon">
                                <img src="../../public/assets/images/Icons/header_heart.svg" alt="">
                            </div>
                        </button>
                    </form>
                <?php
                    }
                }
                ?>

                <div class="about_film-description">
                    <div class="about_film-description">
                        <h1>Описание</h1>
                    </div>
                    <div class="about_film-info"><p><?=$dataOneMovie['description']?></p></div>
                </div>

            </section>

        </div>
    </main>

<?php
include __DIR__ . '/../components/footer.php';
?>

</div>

</body>
</html>



