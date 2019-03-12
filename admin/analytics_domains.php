<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); ?>
<?php $domains_q = $db->query("bills_parts"); ?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/user_part/user_domains.css">

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
        <div class="user_domains_wrapper">
            <div class="single_domain single_domain_header">
                <p>NAZIV DOMENE</p>
                <div class="action">
                    <i class="fab fa-slack-hash"></i>
                </div>
            </div>

            <?php
            while($domain = $domains_q -> fetch()){
                if($domain['what'] == 'domain' and $domain['active'] and $domain['user_id'] == $user ->get_id()){
                    ?>
                    <div class="single_domain">
                        <p><?php echo $domain['title']; ?></p>
                        <a href="analytics.php?path=Analitika&cat=Status web stranice&what=Pregled posjeta na aplikacijama&icon=fa-chart-line&desc=Detaljne informacije o posjetama na Vašoim web stranicama i aplikacijama.&month=<?php echo date("m"); ?>&year=<?php echo date('y'); ?>&hash=<?php echo $domain['domain_hash']; ?>">
                            <div class="action">
                                <i class="far fa-eye"></i>
                            </div>
                        </a>
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