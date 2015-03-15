
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

//Load FancyBox
jQuery(function( $ )
{
  $(".fancybox").fancybox();
});

// Get results
$('body').on('click', '#get_results', function(e)
{
      e.preventDefault();
      var min = $('#min').val();
      var max = $('#max').val();
      var data =
      {
        min:min,
        max:max
      };

      $('#get_results').val("Finding...");

      $.ajax({
          url: 'results.php',
          type: 'POST',
          xhr: function()
          {
              var myXhr = $.ajaxSettings.xhr();
              return myXhr;
          },
          success: function (response)
          {
            $('#results').css('display', 'block');
            $('.info').html(response);

            $('#get_results').val("Search");
          },
          data: data,

      });
      return false;
});




// Ajax login
$('form.ajax').on('submit', function()
{
    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};
        $('#submit').val("Checking...");

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


              console.log(response);
              if(response == '0')
              {
                $('#msg').text('Either your student ID or password is incorrect');
                $('#submit').val("Login");
              }
              else
              {
                window.open('system.php', '_self');
                // $('body').html(response);
              }

          }
        }
      );
      return false;
});

// Ajax Add

$('form.add').on('submit', function()
{
  $('#submit').val("Processing...");
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

              $('#errorMessage').text(response);
              $('#submit').val("Add");


          }
        });
      return false;
});




  //Ajax add listing
  $('body').on('click', '#upload', function(e)
  {
        e.preventDefault();
        var formData = new FormData($(this).parents('form')[0]);

        $('#upload').val("Saving...");

        $.ajax({
            url: 'includes/tasks/addListing.php',
            type: 'POST',
            xhr: function()
            {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function (response)
            {
              console.log(response);
              var p = document.getElementById('errorMessage');
              p.innerHTML = response;
              $('#upload').val("Add");
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
});


// What to do if the radio buttons are checked

$('body').on('click', '#lookupButton', function(e)
{
      e.preventDefault();
      var value = $('#query').val();
      var data =
      {
        query:value
      };

      $('#lookupButton').val("Looking...");

      $.ajax({
          url: 'includes/tasks/lookup/userLookup.php',
          type: 'POST',
          xhr: function()
          {
              var myXhr = $.ajaxSettings.xhr();
              return myXhr;
          },
          success: function (response)
          {
            $('#data').html(response);

            $('#lookupButton').val("Lookup");
          },
          data: data,

      });
      return false;
});
