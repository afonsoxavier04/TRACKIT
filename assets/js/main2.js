$(function(){
	$('.form-holder').delegate("input", "focus", function(){
		$('.form-holder').removeClass("active");
		$(this).parent().addClass("active");
	})
})
function passwordCheck(){
	var pw = document.getElementById("pswd").value;  
  //check empty password field  
  if(pw == "") {  
     document.getElementById("bola").innerHTML = "**Fill the password please!";  
     return false;  
  }  
   
 //minimum password length validation  
  if(pw.length < 8) {  
     document.getElementById("bola").innerHTML = "**Password length must be atleast 8 characters";  
     return false;  
  }  
  
//maximum length of password validation  
  if(pw.length > 15) {  
     document.getElementById("bola").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  } else {  
     alert("Password is correct");  
  }  
}
