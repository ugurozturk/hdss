<div class="container-fluid" >

<div id="nanoGallery">
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){

var icerik = [
<?php foreach ($pics as $pic) {
  echo '{ src:"'.$pic->big_url.'",srct:"'.$pic->thumbs_url.'",title:"'.$pic->pic_name.'",destURL:"'.URL.'image?i='.$pic->pic_id.'"},';
  } ?>
];

    $("#nanoGallery").nanoGallery({
        	items:icerik,
          thumbnailHeight:'450',
          thumbnailWidth:'auto',
          thumbnailDisplayInterval: 25,
          thumbnailDisplayTransition: true,
          thumbnailHoverEffect: 'none',
          theme:'light',
          thumbnailGutterWidth:6,
          thumbnailGutterHeight:6,
          locationHash: false,
          thumbnailLabel: {
                display: true,
                displayDescription: true ,
                position: 'overImageOnBottom',
                titleMaxLength: 40,
                hideIcons: true,
                align: 'center'
            },
          colorScheme: {
              navigationbar: {
                border: '0px dotted #555',
                color: '#ccc',
                colorHover: '#fff'
              },
              thumbnail: {
                border: '0px solid #000',
                titleColor: '#fff',
                descriptionColor: '#eee'
              }
          }
        });
  });

</script>
