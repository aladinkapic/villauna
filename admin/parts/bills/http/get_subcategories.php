<?php
require_once '../../../classes/db.php';

// database variable //
$db = new DB();
$id = $_POST['id'];

$subcategories_q = $db->query("service_categories");

while($subcategory = $subcategories_q -> fetch()){
    if($subcategory['parent'] == $id){
        ?>
        <div class="category_object" onclick="finnish_colecting('<?php echo $subcategory["id"]; ?>', '<?php echo $subcategory["title"]; ?>');">
            <p><?php echo $subcategory['title']; ?></p>
            <i class="fas fa-arrow-circle-right"></i>
        </div>
        <?php
    }
}