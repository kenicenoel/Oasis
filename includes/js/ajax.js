function Ajax()
{
  this.req = null;
  this.url = null;
  this.method = 'GET';
  this.async=true;
  this.status= null;
  this.statusText='';
  this.postData = null;
  this.readyState= null;
  this.responseText=null;
  this.responseXML=null;
  this.handleResp = null;
  this.responseFormat = 'text', // 'text' , 'xml', or 'object'
  this.mimeType = null;

  this.init = function()
  {
    if (!this.req)
    {
      try
      {
        // Try to create object for Firefox, Safari, IE7, etc.
        this.req = new XMLHttpRequest();
      }
      catch (e)
      {
        try
        {
          // Try to create object for later vrsions of IE.
          this.req = new ActiveXObject('MSXML2.XMLHTTP');
        }
        catch (e)
        {
          try
          {
            // Try to create object for early versions of IE
            this.req = new ActiveXObject('Microsoft.XMLHTTP');
          }
          catch (e)
          {
            // Could not create an XMLHttpRequest object
            return false;
          }
        }
      }
    }
    return this.req;
  };

  this.doReq = function()
  {
    if (!this.init())
    {
      alert("Could not create XMLHttpRequest object");
      return;
    }

    this.req.open(this.method, this.url, this.async);
    var self = this;
    this.req.onreadystatechange= function()
    {
      if(self.req.readyState == 4)
      {
        switch (self.responseFormat)
        {
          case 'text':
            resp = self.req.responseText;
            break;
          case 'xml':
            resp = self.req.responseXML;
            break;

          case 'object':
              resp = req;
              break;

        }

        if(self.req.status == 200 && self.req.status <=200)
        {
          self.handleResp(resp);
        }

        else
        {
          self.handleErr(resp);
        }
      }
    };
    this.req.send(this.postData);

  };



}
