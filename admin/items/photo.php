<?php

if($preview){
    $property = explode(";|;", $item->_specific_details);
}

?>


<div class="object_extra_details">
    <div class="single_object_property_title">
        <p>Rezolucija</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="resolution" value="<?php if($preview){echo $property[0];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>LCD Ekran</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="lcd" value="<?php if($preview){echo $property[1];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Video zapis</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="video" value="<?php if($preview){echo $property[2];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Baterija</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="battery" value="<?php if($preview){echo $property[3];} ?>">
    </div>
</div>