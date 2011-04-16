$(document).ready(function(){
	var form = $("#customForm");
	var name = $("#name");
	var nameInfo = $("#nameInfo");
	name.blur(validateName);
	name.keyup(validateName);

	
	function validateName(){
		if(name.val() == 911){
			nameInfo.text("Hi Rida ;)");
			return false;
		}
			if(name.val() == 1403){
			nameInfo.text("Happy Birthday");
			return false;
		}
			if(name.val() == 1234){
			nameInfo.text("5678");
			return false;
		}
			if(name.val() == 1503){
			nameInfo.text("Halo Met Malam, Puccy");
			return false;
		}
		if(name.val() == 666){
			nameInfo.text("Hi Mel Mel ;)");
			return false;
		} else {
			nameInfo.text("Wrong Password");
			return true;
	}
	}
});