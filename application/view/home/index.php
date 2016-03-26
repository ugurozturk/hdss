<div class="container-fluid" >
<div id="gallery">

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

		$(document).ready(function(){

      $("#gallery").unitegallery({
        theme_appearance_order: "shuffle",
        gallery_theme: "tiles",				//choose gallery theme (if more then one themes includes)
        gallery_width:"100%",				//gallery width
        gallery_min_width: 350,				//gallery minimal width when resizing
        gallery_background_color: "",
        tiles_type: "nested",					//must option for the tiles - justified type
		 			tiles_enable_transition: true,			//enable transition when screen width change
					tiles_space_between_cols: 3,			//space between images
					tiles_space_between_cols_mobile: 3,     //space between cols for mobile type
		 			tiles_nested_optimal_tile_width: 470,	// tiles optimal width
					tiles_min_columns: 1,					//min columns - for mobile size, for 1 column, type 1
          tile_enable_textpanel: true,		 	//enable textpanel
					tile_textpanel_source: "title",		 	//title,desc,desc_title. source of the textpanel. desc_title - if description empty, put title
					tile_textpanel_always_on: true,	 	//textpanel always visible
					tile_textpanel_appear_type: "slide", 	//slide, fade - appear type of the textpanel on mouseover
					});

		});

	</script>
