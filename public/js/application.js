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
	          message: 'Success of changing image informations.',
          },{
            type: 'danger',
            newest_on_top: true
          });
        }

      });
    });


});
