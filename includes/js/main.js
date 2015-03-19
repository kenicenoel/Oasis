
// Menu Toggle
$(document).ready(function()
{

        $('.menu').click(function()
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




// Ajax login
$('form.ajax').on('submit', function()
{
    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

        $('#submit').replaceWith("<img id='loader' src='images/sprites/flip-flop.gif' />");

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
                $('#loader').replaceWith('<input id ="submit" type = "submit" value="LOGIN" />');
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

// Ajax Add user and landlord

$('form.add').on('submit', function()
{
  $('#submit').replaceWith("<img id='loader' src='images/sprites/slug.gif' />");
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
              temp.innerHTML = form;
              $('#errorMessage').text(response);
              $('#loader').replaceWith('<input id ="submit" type = "submit" value="LOGIN" />');


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


// function requestPage(pageNumber, limitPerPage, lastPage)
// {
//   var min = <?php echo $minPrice ?>;
//   var max = <?php echo $maxPrice ?>;
//   var pn = pageNumber;
//   var limit = limitPerPage;
//   var lp = lastPage;
//   var tbody = document.getElementById("info");
//   var paginationHolder = document.getElementById("pagination-holder");
//
//   tbody.innerHTML = "<img src='images/sprites/ajax_loader.gif' />";
//
//   var httpRequest = new XMLHttpRequest();
//   httpRequest.open("POST", "includes/tasks/fetch_pages.php", true);
//   httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   httpRequest.onreadystatechange=function()
//   {
//     if(httpRequest.readyState == 4 && httpRequest.status==200)
//     {
//         var data = httpRequest.responseText;
//         tbody.innerHTML = data;
//
//     }
//   }
//   httpRequest.send("limitPerPage="+limit+"&lastPage="+lp+"&pageNumber="+pn+"&minPrice="+min+"&maxPrice="+max);
//
//   // Change the pagination controls
//   var paginationCon
//   if(lastPage !=1)
//   {
//     if (pageNumber >1)
//     {
//
//     }
//   }
//
//
//
//
//
//
//
//
//
// }
