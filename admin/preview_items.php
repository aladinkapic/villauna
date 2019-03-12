<?php require_once '../classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']);  ?>

<?php require_once '../classes/categories.php';  $categiry = new Category(); $name = $categiry->get_grandparent_name(Input::get('id')); ?>

<?php
if(isset($_POST['title'])){
    $title      = $_POST['title'];
    $grand_p_id = $_GET['id'];

    $db -> action("INSERT INTO `categories` (`title`,`child`) VALUES ('{$title}', '{$grand_p_id}') ");
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
    <link rel="stylesheet" href="css/categories/all_categories.css">
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
        <div class="categories_w">
            <div class="single_category">
                <div class="category_icon">
                    <i class="fas fa-magic"></i>
                </div>
                <p><?php echo $categiry->get_grandparent_name(Input::get('id')); ?></p>
                <div class="category_r_icons category_r_icons0">
                    <a href="insert_item.php?path=Moj%20app&cat=Kategorije%20artikala&what=<?php echo $categiry->get_grandparent_name(Input::get('id')); ?>&icon=fa-home&desc=Pregled%20glavnih%20kategorija%20artikala%20..&id=<?php echo Input::get('id'); ?>&parent=<?php echo Input::get('parent'); ?>">
                        <p>NOVI ARTIKAL</p>
                    </a>
                </div>
            </div>

            <?php
            $items_q = $db->query("all_items");
            while($item = $items_q -> fetch()){
                if($item['category'] == Input::get('id')){

                    ?>
                    <div class="single_category single_category0">
                        <div class="category_icon">

                        </div>
                        <p> <?php echo $item['title']; ?> </p>
                        <a href="preview_item.php?path=Moj%20app&cat=Kategorije%20artikala&what=<?php echo $name; ?>&icon=fa-home&desc=Pregled%20glavnih%20kategorija%20artikala%20..&id=<?php echo $item['id']; ?>&category=<?php echo Input::get('id'); ?>">
                            <div class="category_r_icons" title="Pogledajte podkategorije ">
                                <i class="fas fa-edit"></i>
                            </div>
                        </a>
                        <div class="category_r_icons category_r_icons2" title="Izbrišite ovu kategoriju">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>