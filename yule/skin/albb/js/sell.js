function showHCate(obj)
{
	spanObjs = obj.parentNode.parentNode.parentNode.getElementsByTagName("li");
	sum      = spanObjs.length;
	if (document.getElementById('show_all').className == 'class-name-btn1')
	{
		document.getElementById('show_all').className = '';
		for(i=0;i<sum;i++)
		{
			if(i > 15)
			{
				spanObjs[i].className = "spanhidden";
			}
		}
	}
	else
	{
		for(i=0;i<sum;i++)
		{
			if(spanObjs[i].className == "spanhidden")
			{
				spanObjs[i].className = "";
			}
		}
		obj.className = "spanhidden";
		document.getElementById('show_all').className = 'class-name-btn1';
	}
}

