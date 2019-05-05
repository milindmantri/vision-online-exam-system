function loginActive(){
  var login_text= document.getElementById("login-text");
  var login=document.getElementById("login-select");;
  var register=document.getElementById("register-select");;
  var register_text=document.getElementById("register-text");;

  login_text.style.color="#242B2D";
  login_text.style.fontWeight="bold";
  login.style.background= "#ACDB01";
  login.style.boxShadow="1px 1px #242B2D";
  
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
  register.style.boxShadow="1px 1px #242B2D";
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

  function check() {
      $password = document.getElementById('password');
      $confirmPassword = document.getElementById('confirmPassword');
      $message = document.getElementById('message');
      if($password.value=="" && $confirmPassword.value==""){
        $message .innerHTML = '';
      }
      else if ($password.value == $confirmPassword.value) {
        $message.style.color = 'rgb(85, 105, 10)';
        $message .innerHTML = '*password matched';
      } else {
        $message.style.color = 'red';
        $message .innerHTML = '*password do not match';
      }
      
  }
  registerActive()
  loginActive();