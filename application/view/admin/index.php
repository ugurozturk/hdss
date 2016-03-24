<style>
[type=file]{
color:white;
}
</style>

<div class="container-fluid">

<form action="<?php echo URL . 'admin/yukle'; ?>" method="post" enctype="multipart/form-data" >
<input type="file" name="files[]" multiple="true" />
<input type="submit" value="Gönder" />
</form>

<form action="<?php echo URL . 'admin/listimages'; ?>" method="link">
<input type="submit" value="Image List"/>
</form>

</div>
