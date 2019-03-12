<?php
require_once '../../../classes/db.php';
error_reporting(0);
$db = new DB(); $company_q = $db->query("users");


$company_title = $_POST['company'];


while($company = $company_q -> fetch()){
    if(strstr(mb_strtolower($company['company']), mb_strtolower($company_title)) and $company['role'] != 'root' and $company['role'] != 'moderator'){
        ?>
        <div class="single_company" onclick="set_parameters('<?php echo $company["id"]; ?>', '<?php echo $company["company"]; ?>');">
            <p><?php echo $company['company']; ?></p>
            <i class="fas fa-arrow-circle-right"></i>
        </div>
        <?php
    }
}