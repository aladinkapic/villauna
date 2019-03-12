<?php

if($preview){
    $property = explode(";|;", $item->_specific_details);
}

?>


<div class="object_extra_details">
    <div class="single_object_property_title">
        <p>Operativni sistem</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="os" value="<?php if($preview){echo $property[0];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Veličina ekrana</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="screen_size" value="<?php if($preview){echo $property[1];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>CPU</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="cpu" value="<?php if($preview){echo $property[2];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Rezolucija ekrana</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="screen_res" value="<?php if($preview){echo $property[3];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Kamera zadnja</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="cam_back" value="<?php if($preview){echo $property[4];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Kamera prednja</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="cam_front" value="<?php if($preview){echo $property[5];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>RAM Memorija</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="ram" value="<?php if($preview){echo $property[6];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Interna memorija</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="internal_memory" value="<?php if($preview){echo $property[7];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Baterija</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="battery" value="<?php if($preview){echo $property[8];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Boja telefona</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder=".. property" name="color" value="<?php if($preview){echo $property[9];} ?>">
    </div>
</div>