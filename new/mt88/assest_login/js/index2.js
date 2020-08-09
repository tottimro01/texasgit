
$(document).on('submit', '#frmLogin', function(event) {
          event.preventDefault();
          var $self = this;
          $($self).find('fieldset').attr('disabled', 'disabled');
          var fData = {
            l_user: $($self).find('#l_user').val(),
            l_pass: $($self).find('#l_pass').val(),
            ref_url: $($self).find('#ref_url').val(),
            clang: $($self).find('#clang').val(),
          }
          

          $.ajax({
            url: 'http://wan1991.com/check_login.php',
            type: 'POST',
            dataType: 'html',
            data: fData,
          })
          .done(function(response){
            // console.log("success");
          //       console.log(response)
         $("#token").html(response);
          })
          .fail(function(xhr, status, res) {
            // console.log(xhr, status, res);
                alert('Something went wrong! plaese try again.');
          })
          .always(function(){
            $($self).find('fieldset').removeAttr('disabled');
          });
          
});