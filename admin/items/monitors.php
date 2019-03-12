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
        <p>Rezolucija</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="1920 x 1080" name="resolution" value="<?php if($preview){echo $property[1];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Osvjetljenje</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="200 cd/m2" name="light" value="<?php if($preview){echo $property[2];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Ugao gledanja</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="90°H/50°(V)" name="angle" value="<?php if($preview){echo $property[3];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Vrijeme odziva</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="5ms" name="response" value="<?php if($preview){echo $property[4];} ?>">
    </div>
    <div class="single_object_property_title">
        <p>Priključci monitora</p>
    </div>
    <div class="single_object_property">
        <input type="text" placeholder="2x HDMI" name="connectors" value="<?php if($preview){echo $property[5];} ?>">
    </div>
</div>