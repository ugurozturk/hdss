<div class="container-fluid" >
  <div id="gallery">
    <?php foreach ($pics as $pic) {?>
          <a href="<?php echo URL.'image?i='.$pic->pic_id ?>" title="<?php echo $pic->pic_name?>">
              <img src="<?php echo $pic->thumbs_url ?>" />
          </a>
          <?php }?>
      </div>

      <script>
          $("#gallery").justifiedGallery({
      	rowHeight: 250,
      	maxRowHeight : 450,
      	lastRow : 'justify',
      	captions : true,
      	captionsShowAlways : true,
        captionsAnimation : true,
        cssAnimation:false,
      	margins : 6,
      	waitThumbnailsLoad : true
      	});

doldur();

          </script>
