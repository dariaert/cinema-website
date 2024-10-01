<header class="header">
    <div class="container">
        <div class="header__line">
            <div class="header-menu-left">
                <div class="header__logo">
                    <a href="/" class="menu__list-link header-animation-line"><h1>РОДИНА</h1></a>
                </div>
            </div>
            <nav class="menu">
                <ul class="menu__list">
                    <?php
                    if(isset($_SESSION["user"]) && $_SESSION["user"]["role"] != 0) {
                    ?>
                        <li class="menu__list-item">
                            <a href="/admin/panel" class="menu__list-link header-animation-line">Панель</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="menu__list-item">
                        <a href="/schedule" class="menu__list-link header-animation-line">Расписание</a>
                    </li>
                    <li class="menu__list-item header_icon">
                        <div class="heart-icon">
                            <img src="../../public/assets/images/Icons/header_heart.svg" alt="">
                        </div>
                        <a href="/favourites" class="menu__list-link header-animation-line">Избранное</a>
                    </li>
                    <?php
                    if(!isset($_SESSION["user"])) {
                    ?>
                        <li class="menu__list-item header_icon">
                            <div class="entrance-icon">
                                <img src="../../public/assets/images/Icons/header_entrance.svg" alt="">
                            </div>
                            <a href="/login" class="menu__list-link header-animation-line">Вход</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="menu__list-item header_icon">
                            <div class="user-icon">
                                <img src="../../public/assets/images/Icons/header_user.svg" alt="">
                            </div>
                            <a href="/profile" class="menu__list-link header-animation-line"><?= $_SESSION["user"]["name"] ?></a>
                        </li>
                        <li class="menu__list-item header_icon">
                            <form action="/auth/logout" method="post">
                                <button type="submit" class="header_icon header-animation-line logout-btn">
                                    <div class="entrance-icon">
                                        <img src="../../public/assets/images/Icons/header_entrance.svg" alt="">
                                    </div>
                                    <h4 class="menu__list-link header-animation-line">Выход</h4>
                                </button>
                            </form>

                        </li>
                    <?php
                    }
                    ?>


                </ul>
            </nav>
        </div>
    </div>
</header>