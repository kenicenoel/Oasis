
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
