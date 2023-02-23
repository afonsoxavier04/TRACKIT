$(function(){
	$('.form-holder').delegate("input", "focus", function(){
		$('.form-holder').removeClass("active");
		$(this).parent().addClass("active");
	})
})
function comparar(){

   if(pass.value != confirm_pass.value){
      document.getElementById("bola").style.display="block";
      document.getElementById("reg_but").style.display="none";
   }
   else{
      document.getElementById("bola").style.display="none";
      document.getElementById("reg_but").style.display="block";
   }
   
}

