<?php require_once '../classes/db.php'; $db = new DB(); require_once '../classes/users.php'; $user = new User($_SESSION['ID']); ?>

<?php

if(isset($_POST['header_of'])){
    $title   = $_POST['header_of'];
    $title_e = $_POST['header_of_en'];
    $title_d = $_POST['header_of_de'];
    $post_id = $_GET['id'];
    $what    = 'huge_header';
    $id = Input::get('id');


    $db->action("UPDATE `pages_content` SET `title` = '{$title}',`title_en` = '{$title_e}',`title_de` = '{$title_d}' WHERE id = '$id'");
}

$query = $db->query("pages_content");
while($data = $query -> fetch()){
    if($data['id'] == Input::get('id')){
        $title   = $data['title'];
        $title_e = $data['title_en'];
        $title_d = $data['title_de'];

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
                        <input type="text" placeholder="Naslov .." name="header_of" value="<?php echo $title; ?>" autocomplete="off">
                    </div>
                    <div class="header_of_ht">
                        <input type="text" placeholder="Naslov eng.." name="header_of_en" value="<?php echo $title_e; ?> autocomplete="off"">
                    </div>
                    <div class="header_of_ht">
                        <input type="text" placeholder="Naslov de.." name="header_of_de" value="<?php echo $title_d; ?> autocomplete="off"">
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