function showLogin(){
	//alert("showing login ");
	$('.small.modal.login').modal({
  	closable    : false
	});
	$('.small.modal.login').modal('hide others');
	$('.small.modal.login').modal('show');
}

function showRegister(){
	//alert("fuck i'm here");
	$('.large.modal.register').modal({
  	closable    : false
	});
	$('.error.red.message').hide();
	$('.large.modal.register').modal('hide all');
	$('.large.modal.register').modal('show');
}
