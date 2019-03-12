<?php

if($preview){
    $property = explode(";|;", $item->_specific_details);
}

?>


<div class="object_extra_details">
    <div class="single_object_property_title">
        <p>Veličina ekrana</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="screen_size" value="<?php if($preview){echo $property[0];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Rezolucija ekrana</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="screen_res" value="<?php if($preview){echo $property[1];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Mrežne opcije</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="network" value="<?php if($preview){echo $property[2];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Tuneri</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="tuners" value="<?php if($preview){echo $property[3];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Operativni sistem</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="os" value="<?php if($preview){echo $property[3];} ?>">
    </div>
</div>