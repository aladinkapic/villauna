<?php require_once '../classes/db.php'; $db = new DB(); require_once '../classes/users.php'; $user = new User($_SESSION['ID']); ?>

<?php

if(isset($_POST['header_of'])){
    $title    = $_POST['header_of'];
    $title_en = $_POST['header_of_en'];
    $title_de = $_POST['header_of_de'];


    $text    = $_POST['text_of'];
    $text_en = $_POST['text_of_en'];
    $text_de = $_POST['text_of_de'];
    $id      = $_GET['id'];
    $what    = 'header_text';

    for($i=0; $i<strlen($text); $i++){
        if($text[$i] == "'") $text[$i] = '';
    }


    $db->action("UPDATE `pages_content` SET `title` = '{$title}',`title_en` = '{$title_en}',`title_de` = '{$title_de}',`text` = '{$text}',`text_of_en` = '{$text_en}',`text_of_de` = '{$text_de}' WHERE id = '$id'");
}

$query = $db->query("pages_content");
while($data = $query -> fetch()){
    if($data['id'] == Input::get('id')){
        $title   = $data['title'];
        $title_e = $data['title_en'];
        $title_d = $data['title_de'];

        $desc    = $data['text'];
        $desc_e  = $data['text_of_en'];
        $desc_d  = $data['text_of_de'];

        break;
    }
}

?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/pages/all_pages.css">

    <link rel="stylesheet" href="../css/style.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <div class="section_body">
        <div class="pages_w">
            <form method="post">
                <div class="header_and_text">
                    <div class="header_of_ht">
                        <input type="text" placeholder="Naslov .." name="header_of" autocomplete="off" value="<?php echo $title; ?>">
                    </div>
                    <div class="header_of_ht">
                        <input type="text" placeholder="Naslov en.." name="header_of_en" autocomplete="off" value="<?php echo $title_e; ?>">
                    </div>
                    <div class="header_of_ht">
                        <input type="text" placeholder="Naslov de.." name="header_of_de" autocomplete="off" value="<?php echo $title_d; ?>">
                    </div>
                    <div class="body_of_ht">
                        <textarea name="text_of" placeholder="Tekst ovdje .."><?php echo $desc; ?></textarea>
                    </div>
                    <div class="body_of_ht">
                        <textarea name="text_of_en" placeholder="Tekst ovdje en .."><?php echo $desc_e; ?></textarea>
                    </div>
                    <div class="body_of_ht">
                        <textarea name="text_of_de" placeholder="Tekst ovdje de.."><?php echo $desc_d; ?></textarea>
                    </div>
                    <div class="save_button">
                        <input type="submit" value="SPREMITE">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>