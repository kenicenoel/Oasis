
$(document).ready(function()
{
    
        $('#menu').click(function()
        {
        	var state=$('#navigation');
        	if(state.css("display") === "none")
        	{
        		$('#navigation').css("display", "inline");
        		$('#menu').text("Hide Menu");
        	}

        	else
        	{
        		$('#navigation').css("display", "none");
        		$('#menu').text("Show Menu");
        	}
	      
    	});
});
