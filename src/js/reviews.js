$( document ).ready(function() {

// Hide loginbar by default, only to be shown when clicked
$('#loginBar').hide();
$('#logoutDiv').hide();

ScrollReveal().reveal('#addReview', {delay: 300, distance: '100px',});
ScrollReveal().reveal('#showReviews', {delay: 300, distance: '100px',});

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