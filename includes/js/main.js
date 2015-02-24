
$(document).ready(function()
{

        $('#menu').click(function()
        {
        	var state=$('#navigation');
        	if(state.css("display") === "none")
        	{
        		$('#navigation').css("display", "inline");

        	}

          else if(state.css("display") === "inline")
        	{
        		$('#navigation').css("display", "none");

        	}




    	});

      $('#menu').mouseout(function()
      {
        var state=$('#navigation');
        if(state.css("display") === "inline")
        {
          $('#navigation').css("display", "none");

        }



    });


});
