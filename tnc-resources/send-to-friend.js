jQuery(document).ready( function() {
   $('#open_slink').on( "click", function() {
      $('#tnc-share').fadeToggle(300)
   });

   $(document).on("click", "#send-to-friend-btn", function(e){
      e.preventDefault();
      var formData = {
         'action'                   : 'tnc_mail_to_friend',
         'yourname'                 : $('input[name=yourname]').val(),
         'friendsname'              : $('input[name=friendsname]').val(),
         'youremailaddress'         : $('input[name=youremailaddress]').val(),
         'friendsemailaddress'      : $('input[name=friendsemailaddress]').val(),
         'email_subject'            : $('input[name=email_subject]').val(),
         'message'                  : $('#message').val(),
         'nonce':                   $('input[name=tnc_nonce]').val(),
      };

      jQuery(this).prop('value', 'Sending...');
      
      var ajaxurl = $('input[name=tnc_ajax]').val();

      jQuery.ajax({
         type : "POST",
         dataType : "JSON",
         url : ajaxurl,
         data: formData,
         success: function(response) {
            if(response.type == "success") {
               jQuery("#email-result").html("<span style='color: green'>Email Sent Successfully</span>");
               jQuery("#send-to-friend-btn").prop('value', 'Send Now');
            } else {
               jQuery("#email-result").html("<span style='color: red'>Failed to Send Email, Please Try again</span>");
               jQuery("#send-to-friend-btn").prop('value', 'Send Now');
            }
         }
      }) 
   })
})
