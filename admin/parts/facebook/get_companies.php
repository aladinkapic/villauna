<?php
require_once '../../../classes/db.php';
error_reporting(0);
$db = new DB(); $company_q = $db->query("pages");


$company_title = $_POST['company'];


while($company = $company_q -> fetch()){
    if($company['id'] == 8 or $company['id'] == 9 or $company['id'] == 10){
        ?>
        <div class="single_company" onclick="go_to_company('<?php echo $company["id"]; ?>', '<?php echo $company["title"]; ?>');">
            <p><?php echo $company['title']; ?></p>
            <i class="fas fa-arrow-circle-right"></i>
        </div>
        <?php
    }
}