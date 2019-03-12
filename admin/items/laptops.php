<?php

if($preview){
    $property = explode(";|;", $item->_specific_details);
}

?>


<div class="object_extra_details">
    <div class="single_object_property_title">
        <p>Veličina ekrana </p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="screen_size" value="<?php if($preview){echo $property[0];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Procesor</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="processor" value="<?php if($preview){echo $property[1];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>RAM</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="ram" value="<?php if($preview){echo $property[2];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Hard disk</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="hdd" value="<?php if($preview){echo $property[3];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Grafička karta</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="graphic_card" value="<?php if($preview){echo $property[4];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Operativni sistem</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="os" value="<?php if($preview){echo $property[5];} ?>">
    </div>
</div>