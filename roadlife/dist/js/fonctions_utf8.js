function creer_httpr()
{
	var h;
	if (window.XMLHttpRequest) 
	{ // Mozilla, Safari, ...
		h = new XMLHttpRequest();
		if (h.overrideMimeType) 
		{
            h.overrideMimeType('text/xml;charset=UTF-8');
		}

	}
	else 
	{
		if (window.ActiveXObject) 
		{ // IE
			h = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return(h);
}