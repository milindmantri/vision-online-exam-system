function myFunction() {
    document.getElementById("demo").style.display = 'block';
    document.getElementById("demo1").style.display = 'none';
  }
  
  function myFunction1() {
    document.getElementById("demo1").style.display = 'block';
    document.getElementById("demo").style.display = 'none';
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