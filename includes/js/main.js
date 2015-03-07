
// Menu Toggle
$(document).ready(function()
{

        $('#menu').click(function()
        {
        	var state=$('#navigation');
        	if(state.css("display") === "none")
        	{
        		$('#navigation').css("display", "inline");

        	}

          else
        	{
        		$('#navigation').css("display", "none");

        	}

    	});

});

// Ajax login
$('form.ajax').on('submit', function()
{
    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value)
    {
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

          data[name] = value;
    });
      $.ajax
      (
        {
          url:url,
          type: method,
          data: data,
          success: function(response)
          {
            if(response == 'FAILED')
            {

              $('#msg').text("Either your student ID or password is incorrect");
            }

            else
            {
              window.open('system.php', '_self');
            }

          }
        }
      );
      return false;
});

// Ajax Add

$('form.add').on('submit', function()
{
    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value)
    {
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

          data[name] = value;

    });
    console.log(data);

      $.ajax
      (
        {
          url:url,
          type: method,
          data: data,
          contentType:false,
          success: function(response)
          {

              $('#errorMessage').text(response);


          }
        }
      );
      return false;
});
