$(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }

//TODO Ayarlanacak
    $('#savebtn').on('click',function(){

      $.ajax({
        type: "POST",
        url: url + "admin/updateImg/",
        dataType: 'json',
        data : {
          picid:$("#picidinmodel").val(),
          picname:  $('#picnameinmodel').val(),
          picbigurl: $('#picbigurlinmodel').val(),
          picthmburl: $('#picthmburlinmodel').val(),
          yayin_tarih: $('#datetimepickerid').val(),
          aktif:  $('#picstatusinmodel').prop('checked')
        },
        success: function(data){
          $('#editModal').modal('toggle');
          $.notify({
            icon: 'glyphicon glyphicon-success-sign',
	          title: 'HDSS -',
	          message: 'Success of changing image informations.',
          },{
            type: 'success',
            newest_on_top: true
          });
        },
        error: function(data){
          console.log("error >");
          console.log(data);
          $.notify({
            icon: 'glyphicon glyphicon-success-sign',
	          title: 'HDSS -',
	          message: 'Başarısız Güncelleme İsteği.',
          },{
            type: 'danger',
            newest_on_top: true
          });
        }

      });
    });

    $('button[islev="sil"]').on('click',function(){
      console.log("del Çalıştı");

      if(confirm("Are you sure ?")){
    var deger =  $(this).attr("id").substr(3);
    $.ajax({
      type: "POST",
      url: url + "admin/delImg/",
      dataType: 'json',
      data : {
        picid:deger
      },
      success: function(data){
        $.notify({
          icon: 'glyphicon glyphicon-success-sign',
          title: 'HDSS -',
          message: 'Success of deleting image.',
        },{
          type: 'success',
          newest_on_top: true
        });
      },
      error: function(data){
        console.log("error >");
        console.log(data);
        $.notify({
          icon: 'glyphicon glyphicon-success-sign',
          title: 'HDSS -',
          message: 'Failed to delete.',
        },{
          type: 'danger',
          newest_on_top: true
        });
      }

    });
    }
    else {
      $.notify({
        icon: 'glyphicon glyphicon-success-sign',
        title: 'HDSS -',
        message: 'Safely Canseled.',
      },{
        type: 'success',
        newest_on_top: true
      });
    }
    });


});

function doldur(){
  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
      var lgnt = $(".jg-entry").length;
      console.log(lgnt);
  $.ajax({
    type: "POST",
    url: url + "image/devamigetir/",
    dataType: 'json',
    data : {
      miktar : lgnt
    },
    success: function(data){
      console.log("doldur success");
      $.each(data,function(index,value){
        $('#gallery').append('<a href="'+url +'image?i='+ value.pic_id+'" title="'+value.pic_name+'"><img src="'+value.thumbs_url+'" /></a>');
      });
      $('#gallery').justifiedGallery('norewind');
    },
    error: function(data){
      console.log("error >");
      console.log(data);
      $.notify({
        icon: 'glyphicon glyphicon-success-sign',
        title: 'HDSS -',
        message: 'Başarısız Getirme İsteği.',
      },{
        type: 'danger',
        newest_on_top: true
      });
    },
    done: function(data){
      console.log("fnc bitti");
    }
  });
}
});
}
