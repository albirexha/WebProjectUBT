
//var userName = localStorage.getItem("textvalue");
var divUsername = document.getElementById("hiddenUsername");
var userName = divUsername.textContent;

var welcomeMessage = "Welcome Back, "+userName+"!";
document.getElementById("wUser").innerHTML = welcomeMessage;
setTimeout(function removeUsrMsg() {
  document.getElementById('wUser').style.display = 'none';
  document.getElementById('welcome').style.width = '150px'
}, 3000);

function validateMessage(boxID) {
  if (/suggestBox/.test(boxID)) {
    var boxType = document.getElementById('suggestBox').value;
    if (boxType.length < 10) {
      alert("Sugjerimi i juaj duhet te kete te pakten 10 karaktere.");
    }
  } else if (/contactBox/.test(boxID)) {
    var boxType = document.getElementById('contactBox').value;
    if (boxType.length < 10) {
      return false;
    }
    return true;
  }
}

$(document).ready(function () {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 600) {
      $(".header").css("background-color", "black");
    }
    else {
      $(".header").css("background", "rgba(0, 0, 0,0.0)");
    }
  })
})



function validateEmailNL() {
  var emailNL = document.getElementById("emailNL").value;
  var RE = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var output = "Ju faleminderit!\nNga tani ne do ju njoftojme per cdo postim te ri."
  if (RE.test(emailNL) == false) {
    alert("Ju lutem shtypni email valid.");
  } else {
    alert(output);
  }
}

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1 }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 3000);
}

function validateContact(boxID) {
  var ConEmail = document.getElementById("ConEmail").value;
  var ConName = document.getElementById("ConName").value;
  var validBox = Boolean(validateMessage(boxID));
  var nameRE = /^[A-Za-z]+$/;
  var nameCheck = Boolean(ConName.match(nameRE));
  if (ConEmail == "" || ConName == "" || validBox == "false")
    alert("Plotesoni te gjitha format qe te vazhdoni tutje");
  else if (nameCheck == false)
    alert("Emri nuk eshte valid. Perdorni vetem shkronja.");
  else if (nameCheck == true && validateEmail(ConEmail) == false)
    alert("Ky format i email nuk eshte i lejuar");

  else if (validateEmail(ConEmail) && nameCheck == true && validBox == false)
    alert("Mesazhi i juaj duhet te kete te pakten 10 karaktere.");
  else {
    alert("Mesazhi u dergua me sukses.");
  }
}


function validateEmail(email) {
  var RE = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return RE.test(email);
}

function validateUsername(username) {
  var RE = /^[a-z0-9_-]{3,16}$/;
  return RE.test(username);
}
