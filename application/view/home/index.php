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
      theme_enable_preloader: true,
					gallery_theme: "tiles",
          gallery_width:"100%",
		 			tiles_type: "justified",
          tiles_justified_space_between:7,
          tiles_justified_row_height: 350,
          tiles_set_initial_height: true,		//columns type related only
		 			tiles_enable_transition: true,
          tile_enable_textpanel: true,		 	//enable textpanel
					tile_textpanel_source: "title",		 	//title,desc,desc_title. source of the textpanel. desc_title - if description empty, put title
					tile_textpanel_always_on: true,	 	//textpanel always visible
					tile_textpanel_appear_type: "slide", 	//slide, fade - appear type of the textpanel on mouseover		//enable transition when screen width change
          tile_textpanel_padding_top:3,		 	//textpanel padding top
					tile_textpanel_padding_bottom:3,	 	//textpanel padding bottom
					tile_textpanel_padding_right: 5,	 	//cut some space for text from right
					tile_textpanel_padding_left: 5,	 	//cut some space for text from left
					tile_textpanel_bg_opacity: 0.4,		 	//textpanel background opacity
					tile_textpanel_bg_color:"#000000",	 	//textpanel background color
					tile_textpanel_bg_css:{},			 	//textpanel background css
          tile_textpanel_title_text_align:"center",	 //textpanel title text align. if null - take from css
          lightbox_type: "compact",							//compact / wide - lightbox type
          lightbox_arrows_position: "inside",				//sides, inside: position of the arrows, used on compact type
          lightbox_arrows_inside_alwayson: true,			//Show the arrows on mouseover, or always on.
          lightbox_show_textpanel: true,						//show the text panel
					lightbox_textpanel_width: 550,						//the width of the text panel. wide type only
          lightbox_textpanel_enable_title: true,				//enable the title text
          lightbox_textpanel_title_text_align:"center",			//textpanel title text align. if null - take from css
          lightbox_textpanel_title_font_size:25,			//textpanel title font size. if null - take from css
					});
  });

</script>
