<div id="left_menu">
    <?php $menu_counter = 0; ?>

    <div class="menu_header">
        <p>MOJ APP</p>
    </div>

    <!-- GLAVNI SLIDER -->
    <div class="menu_category" onclick="get_subcategory('<?php echo $menu_counter++; ?>');" >
        <div class="menu_c_img">
            <i class="fas fa-home"></i>
        </div>
        <p>Naslovna strana</p>
        <div class="menu_c_arrow">
            <i class="fas fa-icon fa-angle-down"></i>
        </div>
    </div>
    <div class="menu_all_subcats" <?php if($_GET['cat'] == 'Naslovna strana') echo 'style="height:auto;"'; ?> >
        <a href="slider_posts.php?path=Moj app&cat=Naslovna strana&what=Početni slider&icon=fa-home&desc=Dodajte i uredite slike za početni slider">
            <div class="menu_subcategory">
                <p>Početni slider</p>
                <div class="menu_line"></div>
            </div>
        </a>
    </div>







    <!-- DODATNE STRANICE -->
    <div class="menu_category" onclick="get_subcategory('<?php echo $menu_counter++; ?>');" >
        <div class="menu_c_img">
            <i class="far fa-file-alt"></i>
        </div>
        <p>Dodatne stranice</p>
        <div class="menu_c_arrow">
            <i class="fas fa-icon fa-angle-down"></i>
        </div>
    </div>
    <div class="menu_all_subcats" <?php if($_GET['cat'] == 'Dodatne stranice') echo 'style="height:auto;"'; ?> >
        <a href="all_pages.php?path=Moj app&cat=Dodatne stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte sve stranice, dodajte nove i uredite postojeće&category=apartments">
            <div class="menu_subcategory">
                <p>Apartmani</p>
                <div class="menu_line"></div>
            </div>
        </a>
        <a href="all_pages.php?path=Moj app&cat=Dodatne stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte sve stranice, dodajte nove i uredite postojeće&category=about">
            <div class="menu_subcategory">
                <p>O nama</p>
                <div class="menu_line"></div>
            </div>
        </a>
        <a href="all_pages.php?path=Moj app&cat=Dodatne stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte sve stranice, dodajte nove i uredite postojeće&category=news">
            <div class="menu_subcategory">
                <p>Novosti</p>
                <div class="menu_line"></div>
            </div>
        </a>
    </div>


    <div class="menu_category" onclick="get_subcategory('<?php echo $menu_counter++; ?>');" >
        <div class="menu_c_img">
            <i class="far fa-file-alt"></i>
        </div>
        <p>Kalendar</p>
        <div class="menu_c_arrow">
            <i class="fas fa-icon fa-angle-down"></i>
        </div>
    </div>
    <div class="menu_all_subcats" <?php if($_GET['cat'] == 'Dodatne stranice') echo 'style="height:auto;"'; ?> >
        <a href="calendar.php?path=Moj app&cat=Dodatne stranice&what=Pregled kalendara&icon=fa-home&desc=Pregledajte sve bitno u vašem kalendaru">
            <div class="menu_subcategory">
                <p>Pregled kalendara</p>
                <div class="menu_line"></div>
            </div>
        </a>
    </div>


    <div class="menu_category" onclick="get_subcategory('<?php echo $menu_counter++; ?>');" >
        <div class="menu_c_img">
            <i class="far fa-file-alt"></i>
        </div>
        <p>Inbox</p>
        <div class="menu_c_arrow">
            <i class="fas fa-icon fa-angle-down"></i>
        </div>
    </div>
    <div class="menu_all_subcats" <?php if($_GET['cat'] == 'Inbox') echo 'style="height:auto;"'; ?> >
        <a href="inbox.php?path=Moj%20DMD&cat=Centar%20za%20podršku&what=Poruke&icon=fa-envelope-open&desc=Pošaljite%20Vaš%20upit%20de%20dobijte%20informacije%20u%20kratkom%20vremenu">
            <div class="menu_subcategory">
                <p>Pregled kalendara</p>
                <div class="menu_line"></div>
            </div>
        </a>
    </div>

    <div class="menu_header menu_header_2">
        <p>SESIJE</p>
    </div>
    <a target="_blank" href="../">
        <div class="menu_category">
            <div class="menu_c_img">
                <i class="far fa-smile"></i>
            </div>
            <p>Moja aplikacija</p>
        </div>
    </a>
    <a href="../logout.php">
        <div class="menu_category">
            <div class="menu_c_img">
                <i class="fas fa-power-off"></i>
            </div>
            <p>Odjavite se</p>
        </div>
    </a>
</div>