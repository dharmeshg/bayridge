// Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('e-mail').value == "" || document.getElementById('phone').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}


//Function To Display Popup
function div_show_new() {
document.getElementById('abcnew').style.display = "block";
}
//Function to Hide Popup
function div_hide_new(){
document.getElementById('abcnew').style.display = "none";
}