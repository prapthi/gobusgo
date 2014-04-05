	
	
	    function switchquestions(id)
	    {		
		var curr_open='';
		if(document.getElementById('curr_open') != null)
		{
		    curr_open=document.getElementById('curr_open').value;
		}
               
		if(curr_open != '' && curr_open != id)
		{
		    if(document.getElementById(curr_open) != null)
		    {
			var subNavDiv = document.getElementById(id);
			for (var i=1; i<=3; i++)
			{
			    if(subNavDiv != i)
			    {
				var x= i;
				document.getElementById(x).style.display='none';
			    }
			}
			document.getElementById(curr_open).style.display='none';
		    }
		}
               
		if(document.getElementById(id) != null)
		{
		    if(document.getElementById(id).style.display == 'none')
		    {
			var subNavDiv = document.getElementById(id);
			for (var i=1; i<=3; i++)
			{
			    if(subNavDiv != i)
			    {
				var x=i;
				document.getElementById(x).style.display='none';
			    }
			}
			document.getElementById(id).style.display='block';
		    }
		    else
			document.getElementById(id).style.display='none';
                    
		    document.getElementById('curr_open').value=id;
		}
	    }
