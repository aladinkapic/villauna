<div class="main_slider">
    <?php
    $slider_q = $db->query("slider"); $counter = 0; $counter1 = 0;
    while($slide = $slider_q -> fetch()){
        ?>
        <div class="image_w  <?php if($counter ++ > 0) echo 'image_w_hidden'; ?>">
            <img class="desktop_image" src="admin/uploaded_images/<?php echo $slide['image_d']; ?>" alt="">
            <img class="mobile_image" src="admin/uploaded_images/<?php echo $slide['image_m']; ?>" alt="">
        </div>
        <?php
    }
    ?>

    <div class="slider_shadow">

        <?php
        $slider_q = $db->query("slider"); $counter = 0; $counter1 = 0;
        while($slide = $slider_q -> fetch()){
            ?>
            <div class="slider_text <?php if($counter++ > 0) echo 'slider_text_hidden'; ?>">
                <h1><?php echo $slide['header']; ?></h1>
                <h3><?php echo $slide['short_details']; ?></h3>
                <a href="<?php echo $slide['link']; ?>">
                    <div class="button">
                        <p>Pogledajte više --></p>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>

        <div class="slider_lines">
            <?php
            $slider_q = $db->query("slider"); $counter = 0; $counter1 = 0;
            while($slide = $slider_q -> fetch()){
                ?>
                <div class="slider_line <?php if($counter == 0) echo 'slider_line_active'; ?>" onclick="next_slide('<?php echo $counter++; ?>');"></div>
                <?php
            }
            ?>

        </div>
    </div>
</div>

<script>
    //set_slide();
</script>