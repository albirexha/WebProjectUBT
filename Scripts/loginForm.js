function switchVisibleSignUp() {
  document.getElementById('signup-form').style.display = 'Block';
  document.getElementById('login-form').style.display = 'none';
  document.getElementsByClassName('signup')[0].style.background="#FFF";
  document.getElementsByClassName('login')[0].style.background="none";
}

function switchVisibleLogin(){
document.getElementById('login-form').style.display = 'Block';
document.getElementById('signup-form').style.display = 'none';
document.getElementsByClassName('login')[0].style.background="#FFF";
document.getElementsByClassName('signup')[0].style.background="none";

}


function validateLogin(){
  var emailLog = document.getElementById("emailLog").value;
  var pwLog = document.getElementById("pwLog").value;
  if(emailLog=="" && pwLog!="")
    alert("Ju lutem shtypni email ose username tuaj");
  else if(emailLog!="" && pwLog=="")
    alert("Ju lutem shtypni fjalekalimin tuaj")
  else if(emailLog=="" && pwLog=="")
    alert("Plotesoni format qe te vazhdoni tutje");
  else{
    document.getElementById("Usr").innerHTML = "Duke u verifikuar...";
    setTimeout(function loggedIn(){    
    localStorage.setItem("textvalue",emailLog);
    window.location="index.html";},1500);
  }
}

function validateSignUp(){
  var emailSI = document.getElementById("emailSI").value;
  var pwSI = document.getElementById("pwSI").value;
  var userSI = document.getElementById("userSI").value;
  if(emailSI=="" || pwSI=="" || userSI=="")
    alert("Plotesoni te gjitha format qe te vazhdoni tutje");
  else if(validateEmail(emailSI)==false)
    alert("Ky format i email nuk eshte i lejuar");
  else if(validateEmail(emailSI) && validateUsername(userSI)==false)
    alert("Username nuk eshte valid. Formati i lejuar A-Z, a-z, 0-9 dhe '-' ");
  else if(validateEmail(emailSI) && validateUsername(userSI) && pwSI.length<8)
    alert("Fjalekalimi shume i shkurter, minimumi i karaktereve 8");
  else{
    document.getElementById("Usr").innerHTML = "U regjistruat me sukses, "+userSI+"!<br>Tani mund te logoheni.";
    document.getElementById("emailLog").value=userSI;
    setTimeout(switchVisibleLogin, 1000);
    
  }

}

function validateEmail(email){
  var RE = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return RE.test(email);
}

function validateUsername(username){
  var RE = /^[a-z0-9_-]{3,16}$/;
  return RE.test(username);
}
