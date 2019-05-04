function loginActive(){
  var login_text= document.getElementById("login-text");
  var login=document.getElementById("login-select");;
  var register=document.getElementById("register-select");;
  var register_text=document.getElementById("register-text");;

  login_text.style.color="#242B2D";
  login_text.style.fontWeight="bold";
  login.style.background= "#ACDB01";
  login.style.boxShadow="box-shadow:1px 1px #242B2D";
  
  register_text.style.color="white";
  register_text.style.fontWeight="normal";
  register.style.background="#242B2D";  
}
function registerActive(){
  var login_text= document.getElementById("login-text");
  var login= document.getElementById("login-select");
  var register= document.getElementById("register-select");
  var register_text= document.getElementById("register-text");;

  register_text.style.color="#242B2D";
  register_text.style.fontWeight="bold";
  register.style.background= "#ACDB01";
  register.style.boxShadow="box-shadow:1px 1px #242B2D";
  /*Change back to original color*/
  login_text.style.fontWeight="normal";
  login_text.style.color="white";
  login.style.background="#242B2D";  
}
function openLoginPage() {
    document.getElementById("login-form").style.display = 'block';
    document.getElementById("registration-form").style.display = 'none';
    loginActive();
  }
  
  function openRegistrationPage() {
    document.getElementById("registration-form").style.display = 'block';
    document.getElementById("login-form").style.display = 'none';
    registerActive();
  }
  function validation() {
    var name = document.getElementById("name").value;
    var emailid = document.getElementById("emailid").value;
    var passward = document.getElementById("passward").value;
    var passwardagain = document.getElementById("passwardagain").value;
    var phoneno = document.getElementById("phoneno").value;
    if (name == "") {
      alert('name field requird');
      document.getElementById("name").style.bordorcolor = "red";
      return false;
    }
    else {
      return true;
    }
  }

  registerActive()
  loginActive();