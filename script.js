var password = document.querySelector('.password');
var re_password = document.querySelector('.re_password');

 re_password.onkeyup = function(){
message_error = document.querySelector('.message_error');
if(password.value != re_password.value){
    message_error.innerText = "Les Mots de passes ne sont pas conformes";
}else{
    message_error.innerText = "";
}
 }