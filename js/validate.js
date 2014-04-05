//////////////////////////////////////////////////////////////FIND YOUR BUS//////////////////////////////////////////////////////////////
function check(){
//////////////////////////////////////////////////////////////Select from
var e = document.getElementById("originid");
var strUser = e.options[e.selectedIndex].value;
//if you need text to be compared then use
var strUser1 = e.options[e.selectedIndex].text;
if(strUser==0){ //for text use if(strUser1=="Select")
	alert("Please select  where you are leaving from");
	return false;
}
//////////////////////////////////////////////////////////////Select to
var a = document.getElementById("destiid");
var strUse = a.options[a.selectedIndex].value;
//if you need text to be compared then use
var strUse1 = a.options[a.selectedIndex].text;
if(strUse==0) //for text use if(strUser1=="Select")
{
	alert("Please select  where you are going");
	return false;
}
//////////////////////////////////////////////////////////////Select date
if(document.findbus.depart.value == "")
	{
      alert("Please enter date of journey");
     document.findbus.depart.select();
	 return false;
	}
}
//////////////////////////////////////////////////////////////CHECK SEAT//////////////////////////////////////////////////////////////
function board(){
	var b = document.getElementById("boardpoint");
	var strUser = b.options[b.selectedIndex].value;
	//if you need text to be compared then use
	var strUser1 = b.options[b.selectedIndex].text;
	if(strUser==0){ //for text use if(strUser1=="Select")
		alert("Please select  boarding point");
		return false;
	}
	var seatName = document.myForm.seatname.value; 
	if(seatName==''){
			alert('Please select atleast one seat');
			return false;
	}

}
//////////////////////////////////////////////////////////////PASSSENGER DETAILS//////////////////////////////////////////////////////////////




/*function sub()
{
	//name
	var l=document.passenger.firstname.value.length;
	var m=document.passenger.firstname.value;
	var p=document.passenger.firstname;
	
	if(m=='')
	{
		alert("Please enter the name");
		p.select();
		p.focus();
		return false;
	}       
	//age
	var l=document.passenger.age.value.length;
	var m=document.passenger.age.value;
	var p=document.passenger.age;
	
	if(m=='')
	{
		alert("Please enter the age");
		p.select();
		p.focus();
		return false;
	}       
	 if (m.length>2){
        alert("Age should 2 digit!");
		p.select();
			p.focus();
        return false
    }
	if((m!='') && isNaN(m.substr(0,10)))
	{
		alert("Enter only number in age");
		p.select();
			p.focus();
			return false;
		 
	}
	//gender
	if ( ( passenger.gender[0].checked == false ) && ( passenger.gender[1].checked == false ) )
	{
	alert ( "Please enter your gender" );
	 
	return false;
	}
		//address
	var l=document.passenger.address.value.length;
	var m=document.passenger.address.value;
	var p=document.passenger.address;
	
	if(m=='')
	{
		alert("Please enter the address");
		p.select();
		p.focus();
		return false;
	} 
	//state
	var l=document.passenger.state.value.length;
	var m=document.passenger.state.value;
	var p=document.passenger.state;
	
	if(m=='')
	{
		alert("Please enter the state");
		p.select();
		p.focus();
		return false;
	}    
	//city
	var l=document.passenger.city.value.length;
	var m=document.passenger.city.value;
	var p=document.passenger.city;
	
	if(m=='')
	{
		alert("Please enter the city");
		p.select();
		p.focus();
		return false;
	}    
	//zipcode
	var l=document.passenger.pincode.value.length;
	var m=document.passenger.pincode.value;
	var p=document.passenger.pincode;
	
	if(m=='')
	{
		alert("Please enter the pincode");
		p.select();
		p.focus();
		return false;
	}       
		if((m!='') && isNaN(m.substr(0,10)))
	{
		alert("Enter only number in pincode");
		p.select();
			p.focus();
			return false;
		 
	}
	 if (m.length < 6){
        alert("pincode should be 6 digit!");
		p.select();
			p.focus();
        return false
    }

	//phone
	var l=document.passenger.phone.value.length;
	var m=document.passenger.phone.value;
	var p=document.passenger.phone;
	
	if(m=='')
	{
		alert("Please enter the mobile no");
		p.select();
		p.focus();
		return false;
	}       
	if((m!='') && isNaN(m.substr(0,10)))
	{
		alert("Enter only number in mobile no");
		p.select();
			p.focus();
			return false;
		 
	}
	//Mail adddress
	
	var m=document.passenger.email;
	var n=document.passenger.email.value;
	 
	if ((n==null)||(n=="")){
		alert("Please Enter your Email ID")
		m.focus()
		return false
	}
	if (echeck(n)==false){
		alert("E-mail you entered is incorrect");
		m.focus();
		return false;
	}
function echeck(str) {
	at = str.indexOf("@");
	dot = str.lastIndexOf(".");
	lengt = str.length;
	con1 = str.substring(0,at);
	con2 = str.substring(at+1,dot);
	con3 = str.substring(dot+1,lengt);

	if(con1=='' || con2=='' || con3=='') return false;

	if(str.indexOf("  ") > -1 || str.indexOf("..") > -1 || str.indexOf("__") > -1 || str.indexOf("--") > -1) return false;
	
	if(at==-1 || dot==-1) return false;

	x = con1.substring(0,1);
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;

	x = con1.substring((con1.length)-1,(con1.length));
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;

	x = con1.substring(1,(con1.length)-1);
	for(i=0, y=0; i<con1.length-2; i++, y=x.substring(i, i+1)) if ((y < "a" || "z" < y) && (y < "A" || "Z" < y) && isNaN(y) && y!='.' && y!='_' && y!='-') return false;
	
	x = con2.substring(0,1);
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;

	x = con2.substring((con2.length)-1,(con2.length));
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;
	
	x = con2.substring(1,(con2.length)-1);
	for(i=0, y=0; i<con2.length-2; i++, y=x.substring(i, i+1)) if ((y < "a" || "z" < y) && (y < "A" || "Z" < y) && isNaN(y) && y!='.' && y!='_' && y!='-') return false;		
	
	for(i=0, x=0; i<con3.length; i++, x = con3.substring(i, i+1)) if ((x < "a" || "z" < x) && (x < "A" || "Z" < x)) return false;
	if ((con3.length)<2 || (con3.length)>4)  return false;
}
		//ADDRESS
	var l=document.contact.message.value.length;
	var m=document.contact.message.value;
	var p=document.contact.message;
	if(m=='')
	{
		alert("Please enter your address");
		p.select();
		return false;
	} 
}
//////////////////////////////////////////////////////////////Contact DETAILS//////////////////////////////////////////////////////////////
function validate() 
	{
		// NAME
	var l=document.contact.name.value.length;
	var m=document.contact.name.value;
	var p=document.contact.name;
	for(var i=0; i<l-1; i++)
	{
		n=m.substring(i, i+2);
		if(n=="  " || n==".." || n=="''")
		{
			alert("Invalid name, Please re-enter")
			p.select();
			return false;
		}
	}
		
	if(m=='')
	{
		alert("Enter your name");
		p.select();
		return false;
	}       
	
	for (var i=0; i<l; i++)
	{
		var q=m.substring(i, i + 1);
		if (((q < "a" || "z" < q) && (q < "A" || "Z" < q)) && q != ' ' && q!='.' && q!="'") 
		{
			alert("\nThe Name field only accepts letters and spaces. \ N \ nPlease re-enter your name.");
			p.select();
			return false;
		}
	}
	//PHONE
    var m=document.contact.phone.value;
	var l=document.contact.phone.value.length;
	var p=document.contact.phone;

	if(m=='')
	{
		alert("Please enter the phone number");
		p.select();
		p.focus();	
		return false;
	}

	if((m!='') && isNaN(m.substr(0,10)))
	{
		alert("Please Enter valid number");
		p.select();
			p.focus();
			return false;
		 
	}

	if(m.substring(0, 1)==' ')
		{
			alert("First character of a telephone number must not be space");
			p.select();
			p.focus();
			return false;
			 
		} 
		 

	//Mail adddress
	
	var m=document.contact.mail;
	var n=document.contact.mail.value;
	 
	if ((n==null)||(n=="")){
		alert("Please Enter your Email ID")
		m.focus()
		return false
	}
	if (echeck(n)==false){
		alert("E-mail you entered is incorrect");
		m.focus();
		return false;
	}
	
	
function echeck(str) {
	at = str.indexOf("@");
	dot = str.lastIndexOf(".");
	lengt = str.length;
	con1 = str.substring(0,at);
	con2 = str.substring(at+1,dot);
	con3 = str.substring(dot+1,lengt);

	if(con1=='' || con2=='' || con3=='') return false;

	if(str.indexOf("  ") > -1 || str.indexOf("..") > -1 || str.indexOf("__") > -1 || str.indexOf("--") > -1) return false;
	
	if(at==-1 || dot==-1) return false;

	x = con1.substring(0,1);
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;

	x = con1.substring((con1.length)-1,(con1.length));
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;

	x = con1.substring(1,(con1.length)-1);
	for(i=0, y=0; i<con1.length-2; i++, y=x.substring(i, i+1)) if ((y < "a" || "z" < y) && (y < "A" || "Z" < y) && isNaN(y) && y!='.' && y!='_' && y!='-') return false;
	
	x = con2.substring(0,1);
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;

	x = con2.substring((con2.length)-1,(con2.length));
	if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;
	
	x = con2.substring(1,(con2.length)-1);
	for(i=0, y=0; i<con2.length-2; i++, y=x.substring(i, i+1)) if ((y < "a" || "z" < y) && (y < "A" || "Z" < y) && isNaN(y) && y!='.' && y!='_' && y!='-') return false;		
	
	for(i=0, x=0; i<con3.length; i++, x = con3.substring(i, i+1)) if ((x < "a" || "z" < x) && (x < "A" || "Z" < x)) return false;
	if ((con3.length)<2 || (con3.length)>4)  return false;
}
		//ADDRESS
	var l=document.contact.message.value.length;
	var m=document.contact.message.value;
	var p=document.contact.message;
	if(m=='')
	{
		alert("Please enter your address");
		p.select();
		return false;
	} 
}
}*/