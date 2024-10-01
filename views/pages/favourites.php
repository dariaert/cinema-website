<?php
if (!isset($_SESSION['user'])) {
    \services\Helper::redirect('/login');
    exit();
}
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

            <div class="poster-title">
                <h1>Избранное</h1>
            </div>

            <div class="favourite_list">

                <?php
                if(!empty($dataAllFav)){
                    foreach ($dataAllFav as $item ) {
                ?>
                    <a href="about.php?id=<?=$item['id_film']?>">

                        <div class="favourite-list-item">
                            <div class="favourite-list-item-img">
                                <img src="<?='/src/uploads/' . $item['poster_film']?>" alt="" class="favourite-item-img">
                                <span class="ageLimit-favourite"><?=$item['name_ageLimit']?></span>
                            </div>

                            <div class="favourite-list-item--text">
                                <div class="favourite_text">
                                    <h2><?=$item['name_film']?></h2>
                                    <div class="about_favourite_film-block-criteria">
                                        <div class="about_film-criteria">Жанр:</div>
                                        <div class="about_film-info"><?=$item['name_genre']?></div>
                                    </div>
                                    <div class="about_favourite_film-block-criteria">
                                        <div class="about_film-criteria">Продолжительность:</div>
                                        <div class="about_film-info">
                                            <?php
                                            $hours = floor($item['duration_film'] / 60);
                                            $minutes = $item['duration_film'] % 60;
                                            echo $hours . ' ' . (($hours == 1) ? 'час' : 'часа') . ' ' . $minutes . ' мин.';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="/content/favourite/delete" method="post" class="form-favourite" style="bottom: 0; top: 327px;">
                                <input type="hidden" name="id" id="id" value="<?=$item['id_film'] ?>">
                                <button type="submit" class="favourite_btn">
                                    <div class="heart-icon">
                                        <img src="../../public/assets/images/Icons/header_red_heart.svg" alt="">
                                    </div>
                                </button>
                            </form>

                        </div>

                    </a>
                <?php
                    }
                } else {
                ?>
                    <div class="container-text">
                        <h3>Здесь будут <span style="color: #C31D41">фильмы</span>, которые вы добавите в Избранное</h3>
                    </div>
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