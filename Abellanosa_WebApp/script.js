function showcontent()  {
  var x = document.getElementById("log_content");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function login_guide(){
	confirm("You can log-in using the pre-determined \nUsername:"+
		" admin\nPassword:  admin\nYou can also create new account!\n"+
    "Passwords are encrypted with md5 so you are safe :)");
}

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}