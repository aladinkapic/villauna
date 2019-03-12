<div class="section_header">
    <div class="section_h_img">
        <i class="fas <?php echo $_GET['icon']; ?>"></i>
    </div>
    <div class="section_h_value">
        <h2><?php echo $_GET['what']; ?></h2>
        <p><?php echo $_GET['desc']; ?></p>
    </div>
    <div class="section_h_path">
        <div class="home_img">
            <i class="fas fa-home"></i>
        </div>
        <p><?php echo $_GET['path']; ?> <span>/</span> <?php echo $_GET['cat']; ?> <span>/</span> <?php echo $_GET['what']; ?></p>
    </div>
</div>