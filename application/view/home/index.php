<div class="container-fluid" >
<div id="gallery" style="display:none;">

<?php foreach ($pics as $pic) { ?>

  <a href="<?php echo URL; ?>">
  <img alt="<?php if (isset($pic->pic_name)) echo htmlspecialchars($pic->pic_name, ENT_QUOTES, 'UTF-8'); ?>"
       src="<?php echo URL; if (isset($pic->thumbs_url)) echo htmlspecialchars($pic->thumbs_url, ENT_QUOTES, 'UTF-8'); ?>"
       data-image="<?php echo URL; if (isset($pic->big_url)) echo htmlspecialchars($pic->big_url, ENT_QUOTES, 'UTF-8'); ?>"
       data-description="<?php if (isset($pic->pic_name)) echo htmlspecialchars($pic->pic_name, ENT_QUOTES, 'UTF-8'); ?>"
       style="display:none">
  </a>

  <?php } ?>

</div>
</div>

	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#gallery").unitegallery({
	tile_enable_textpanel:true,
	tile_textpanel_title_text_align: "center",
	tile_textpanel_always_on:true,
	tiles_type: "nested",
		});

		});

	</script>
