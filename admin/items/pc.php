<?php

if($preview){
    $property = explode(";|;", $item->_specific_details);
}

?>


<div class="object_extra_details">
    <div class="single_object_property_title">
        <p>Procesor</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="processor" value="<?php if($preview){echo $property[0];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Grafička karta</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="Aorus Gigabyte 1060, 6Gb" name="graphic_cart" value="<?php if($preview){echo $property[1];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>RAM Memorija</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="16Gb" name="ram" value="<?php if($preview){echo $property[2];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>HARD DISK</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="SSD ili HDD" name="hard_disc" value="<?php if($preview){echo $property[3];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Napajanje</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="450 W" name="power" value="<?php if($preview){echo $property[4];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Operativni sistem</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="Ubuntu LTS 18.04" name="os" value="<?php if($preview){echo $property[5];} ?>">
    </div>
</div>