
function getajaxObject()
	   {

	      var ajaxRequest;  // The variable that makes Ajax possible!

	    try
	       {

	         ajaxRequest = new XMLHttpRequest();
	       }
	      catch (e)
	       {

	         try
	         {
	            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
	         }
	         catch (e)
	         {
	              try
	              {
	                  ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
	              }
	              catch (e)
	              {

	                  alert("Your browser broke!");
	                  return false;
	              }
	          }
	       }
	        return ajaxRequest;
	   }


function payment()
   {
      document.getElementById("cddetails").innerHTML='';
      if(document.paymentform.paymode[0].checked)
      {
         document.getElementById("cddetails").innerHTML="<br>Enter Credit Card Number : <input type='text' name='cdnumber' value='0'><br>";
       }
    }
    function checkcaptcha()
    {
       ajaxRequest=getajaxObject();
	        ajaxRequest.onreadystatechange = function(){
	   	    if(ajaxRequest.readyState == 4){

	   	       if(ajaxRequest.responseText)
	   	       {
	   	            document.paymentform.submit();
	   	       }
	   	       else
	   	       {
	   	            document.getElementById("captcharesult").innerHTML="Wrong Captcha Try again";
	   	       }
	   	    }
	   	  }


	   	  ajaxRequest.open("POST", "checkcaptcha1.php", true);
	   	  ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	      ajaxRequest.send("token="+document.paymentform.token.value+"&captcha="+document.paymentform.captcha.value);
	 }
	 
	 function servicemess(choice)
	 {
	 
	    if(choice==0)
	    {
	 
	          document.getElementById("fillform").innerHTML="<form name='newservice' action='requestservice.php' method='post'>Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='customername'><br>Address : &nbsp;&nbsp;&nbsp;&nbsp;<textarea name='address' rows=5 columns=40></textarea><br>Product Id : &nbsp;&nbsp;<input type='text' name='pid'><br>Product Name: <input type='text' name='pname'><br>Defect : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name='defect'></textarea><br><input type='hidden' name='newservice' value='newservice'><input type='submit' value='Submit' name='submit'><input type='reset' value='Reset'></form>";
	     }
	     else
	     {
	 
	      document.getElementById("fillform").innerHTML="<form name='newservice' action='requestservice.php' method='post'>Enter the Service Id : <input type='text' name='serviceid' ><input type='hidden' name='statusservice' value='statusservice'><input type='submit' value='Submit' name='submit'><input type='reset' value='Reset'>";
	      }
	 
	 
}

var patharray;
function slideShow(imageNumber)
{
   document.getElementById("imagedisplay").src=patharray[imageNumber];
   var imageChoice=Math.floor(Math.random()*patharray.length);
   window.setTimeout("slideShow("+imageChoice+")",5000);
}

function displayimages(pathstring)
{
   patharray=pathstring.split("&");
   slideShow(0);
}



//Browser Support Code
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!

 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){

       var paths= ajaxRequest.responseText;
       displayimages(paths);
   }
 }
 // Now get the value from user and pass it to
 // server script.

 ajaxRequest.open("GET", "getoffers.php", true);
 ajaxRequest.send();

}

function clearcart()
{
   ajaxRequest=getajaxObject();
        ajaxRequest.onreadystatechange = function(){
   	    if(ajaxRequest.readyState == 4){

                if(ajaxRequest.responseText==1)
                {
                   document.getElementById("cartcount").innerHTML="0 Items in cart ";
                }
                else if(ajaxRequest.responseText==0)
                {
                   document.getElementById("cartcount").innerHTML="Please Login";
                 }
   	    }
   	  }


   	  ajaxRequest.open("GET", "clearcart.php", true);
   	  ajaxRequest.send();
   }

 function addtocart(addproduct)
 {
     ajaxRequest=getajaxObject();
     ajaxRequest.onreadystatechange = function(){
	    if(ajaxRequest.readyState == 4){

	       document.getElementById("cartcount").innerHTML=ajaxRequest.responseText;
	    }
	  }


	  ajaxRequest.open("POST", "addtocart.php", true);
	  ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      ajaxRequest.send("addcart="+addproduct+"&quantity="+document.quantityform.quantity.value);
   }





function hideframe()
{
      document.getElementById("displayer").style.visibility="hidden";
 }

function showframe(product)
{

      document.getElementById("displayer").style.visibility="visible";
      var ajaxRequest=getajaxObject();
      ajaxRequest.onreadystatechange = function(){
	     if(ajaxRequest.readyState == 4){


	        document.getElementById("displayer").innerHTML=ajaxRequest.responseText;
	     }
	   }


	   ajaxRequest.open("POST", "productdetails.php", true);
	   ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       ajaxRequest.send("userSelected="+product);

}

