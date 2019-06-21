$(document).ready(function(){
	// body...
  var hie=window.innerHeight;
  //window.innerHeight;
 /*if(hie<=812){
   $(".back").css('height',0);

  $(".vx").css('height',hie);
 }
 else{
   $(".back").css('height',hie);

  //$(".vx").css('height',hie);
 }*/
  $(".back").css('height',hie);
	$("#ar").click(function(){
 document.getElementById("dire").dir="rtl";
  document.getElementById("title").innerHTML="نظام سجلات الطلاب ";
  document.getElementById("user").placeholder = "معرف المستخدم";
  document.getElementById("pass").placeholder = "كلمة المرور";
  document.getElementById("rmber").innerHTML = "تذكرني";
  $("#rmber").css('margin-right',"15px");
  document.getElementById("but").value = "تسجيل دخول ";
 
});
	$("#eng").click(function(){
 document.getElementById("dire").dir="ltr";
  document.getElementById("title").innerHTML="Student Information System";
  document.getElementById("user").placeholder = "User ID";
  document.getElementById("pass").placeholder = "Password";
  document.getElementById("rmber").innerHTML = "Remaber";
   $("#rmber").css('margin-left',"10px");
  document.getElementById("but").value = "Login";
});
});

// for loading 
$(window).one("load",function(){

$(".loading").fadeOut(5000);
});