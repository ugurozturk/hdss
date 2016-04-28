<div class="container-fluid">
 
<h1><?php echo 'Current PHP version: ' . phpversion(); ?></h1>    
<h2 > <?php echo 'Max Upload Size: ' .  ini_get('upload_max_filesize'); ?>  </h2>
<form action="<?php echo URL . 'admin/yukle'; ?>" method="post" enctype="multipart/form-data" >
<input type="file" name="files[]" multiple="true" />
<input type="submit" value="Gönder" />
</form>


<a href="<?php echo URL . 'admin/listimages'; ?>">
<input type="submit" value="Image List"/>
</a>
<a href="<?php echo URL . 'admin/delNonUsedImages'; ?>">
<input type="submit" value="Del Non-Used Images"/>
</a>

</div>
