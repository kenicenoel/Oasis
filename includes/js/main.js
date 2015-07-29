/* global $ */

//Load FancyBox

$(document).ready(function()
  {
    $(".fancybox").fancybox();


      // Ajax Add landlord

      $('body').on('click', '#submitLandlord', function(e)

      {

        e.preventDefault();
        var formData = new FormData($(this).parents('form')[0]);

        $('#submit').val("Saving...");

        $.ajax({
            url: '../includes/tasks/addLandlord.php',
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
              $('#submit').val("Add");
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });

            return false;
      });





      // Ajax Add user

      $('body').on('click', '#submitUser', function(e)

      {

        e.preventDefault();
        var formData = new FormData($(this).parents('form')[0]);

        $('#submit2').val("Adding user...");

        $.ajax({
            url: '../includes/tasks/addUser.php',
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
              $('#submit').val("Add");
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });

            return false;
      });




        //Ajax add listing

        $('body').on('click', '#upload', function(e)
        {
              e.preventDefault();
              var formData = new FormData($(this).parents('form')[0]);

              $('#upload').val("Adding listing...");

              $.ajax({
                  url: '../includes/tasks/addListing.php',
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



      // Ajax update user profile

      $('body').on('click', '#save_profile', function(e)

      {

        e.preventDefault();


        $('button').replaceWith("<span id='loader' class='fa fa-refresh fa-spin'></span>");

        $.ajax
        ({
            url: '../system/profile_edit.php',
            type: 'POST',
            data: $('form').serialize(),
            // datatype: 'text',
            success: function (response)
            {
              console.log(response);
              $('#loader').replaceWith('<button id="save_profile" type = "submit">Update</button>');
              alert("Updated profile successfully", "OASIS Info" );



            },

        });

            return false;
      });





      // When user clicks on a tile, run the appropriate task

            $('#cards').click(function()
            {
            	var task = $('#cards').attr('data-function');
            	if(task == "addUser")
            	{

                var url='../includes/tasks/adduser.php';
            	}
              else if(task == "addListing")
              {
                var url='../includes/tasks/addlisting.php';
              }
              else if(task == "addLandlord")
              {
                var url='../includes/tasks/addLandlord.php';
              }
              else if(task == "viewListings")
              {
                var url='../includes/tasks/showlistings.php';
              }


              $.ajax
              (
                {

                  url:url,
                  success: function(response)
                  {
                    $('#data').html(response);



                  }
                });

              });

    // Switch from Gird layout to List Layout and vice versa

        $('#list').click(function()
        {
          $('#result-cards').css('display', 'none');
          $('#table-results').css('display', 'block');
        });

        $('#grid').click(function()
        {
          $('#result-cards').css('display', 'block');
          $('#table-results').css('display', 'none');
        });



        // The lookup ajax
        $('body').on('click', '#lookupButton', function(e)

        {

          e.preventDefault();


          $('#lookupButton').replaceWith("<span id='loader' class='fa fa-refresh fa-spin'></span>");

          $.ajax
          ({
              url: '../includes/tasks/lookup/userlookup.php',
              type: 'POST',
              data: $('form').serialize(),
              // datatype: 'text',
              success: function (response)
              {
                console.log(response);
                console.log(data);
                $('#lookupResults').html(response);
                $('#loader').replaceWith('<input id="lookupButton" type = "submit" value="lookup">');




              },

          });

              return false;
        });




});
