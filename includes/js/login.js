$(document).ready(function()
{  
   
  // Ajax login
  $('#login-button').click(function()
  {
      var email = $('#email').val();
      var password = $('#password').val();
  
      $('#login-button').replaceWith("<p id='loader'><span class='fa fa-refresh fa-spin'> </span> Attempting to log you in...</p>");
      
        $.ajax
        ({
            
            url: 'includes/authenticate.php',
            type: 'POST',
            data: "email="+ email+"&password="+password,
            success: function(response)
            {
                console.log(response);
                if(response == 'true')
                {
                  window.open('system/oasis.php', '_self');
                }
                else
                {
                  $('#msg').text(" You've entered an incorrect email address or password.");
                  $('#loader').replaceWith('<input id ="login-button" type = "submit" value="LOGIN" />');
                }
                  
                
            }
          });
        return false;
  });
 
});
