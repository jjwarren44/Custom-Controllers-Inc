$( document ).ready(function() {

// Hide loginbar by default, only to be shown when clicked
$('#loginBar').hide();
$('#logoutDiv').hide();

ScrollReveal().reveal('#toplogo');
ScrollReveal().reveal('#firsttext', {delay: 300, distance: '100px',});
ScrollReveal().reveal('#secondtext', {delay: 300, distance: '100px'});
ScrollReveal().reveal('#thirdtext', {delay: 300, distance: '100px'});
ScrollReveal().reveal('#signupForm', {delay: 300, distance: '100px'});
ScrollReveal().reveal('#welcome', {delay: 300, distance: '100px'});

// Go up to login bar at top of screen when login instead is clicked
$("#loginInstead").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "medium");
  $('#loginBar').delay(300).slideToggle('normal');
  return false;
});

// When login button is clicked, show login bar
$('#loginbutton').click(function() {
	console.log("clicked");
	$('#loginBar').slideToggle('normal');
		// Animation complete
});

$('#loggedinLogout').click(function() {
	console.log("clicked");
	$('#logoutDiv').slideToggle('normal');
		// Animation complete
});



  
});

