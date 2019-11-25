$( document ).ready(function() {

// Hide loginbar by default, only to be shown when clicked
$('#loginBar').hide();
$('#logoutDiv').hide();

ScrollReveal().reveal('#ps4bg', {delay: 300, distance: '100px',});
ScrollReveal().reveal('#xboxonebg', {delay: 300, distance: '100px',});
ScrollReveal().reveal('#customizebg', {delay: 300, distance: '100px',});

$('.buyps4').click(function() {
	$('.paymentps4').slideToggle(200, function() {
		
	});	
});

$('.buyxbox').click(function() {
	$('.paymentxbox').slideToggle(200, function() {
		
	});	
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