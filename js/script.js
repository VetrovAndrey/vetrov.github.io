 function openbox(){
 	display = document.getElementById('form').style.display;
 	if(display=='none'){
 		document.getElementById('form').style.display='block';
 	} else {
 		document.getElementById('form').style.display='none';
 	}
 };
var show = document.querySelector(".vxod");
var regists = document.querySelector(".regist");
var close = document.querySelector(".close");
var linkReg = document.querySelector(".avtoriz");

show.addEventListener("click", function(){
	regists.classList.toggle("show")
});
close.addEventListener("click", function(){
	regists.classList.remove("show")
});
avtoriz.addEventListener("click", function(){
	regists.classList.toggle("show")
});


//Валидация формы

function valid(form){
	var fail = false;
	var name = form.username.value;
	var password = form.password.value;
	var passwordLast = form.password2.value;
	var numberMob = form.numbermob.value;
	var mail = form.email.value;
	if(name == "" || name ==" "){
		fail = "Вы не вели свой логин или ввели его с ошибкой";
	} else if (password == "" || password == " "){
		fail = "Вы не ввели пароль или ввели его с ошибкой";
	} else if (password != passwordLast){
		fail = "Пароли не совпадают";
	} else if (numberMob == "" || numberMob == " "){
		fail = "Вы не ввели номер телефона или ввели его с ошибкой";
	} else if (mail == "" || mail == " "){
		fail = "Вы не ввели адрес электронной почты или ввели его с ошибкой";
	}   

	if(fail){
		alert(fail);
		return false;
	} else {
		return true;
	}
}