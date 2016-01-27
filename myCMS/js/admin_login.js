function checkLogin() {
	var fm=document.login;
	
	if(fm.admin_user.value==''||fm.admin_user.value.length<2||fm.admin_user.value.length>20) {
		alert('username empty or less than 2 or more than 20');
		fm.admin_user.focus();
		return false;
	}

	if(fm.admin_pass.value==''||fm.admin_pass.value.length<6) {
		alert('password empty or less than 6');
		fm.admin_pass.focus();
		return false;
	}

	if(fm.code.value.length!=4) {
		alert('validation code must be 4a');
		fm.code.focus();
		return false;
	}

	if(!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(fm.email.value)) {
		alert('wrong email format');
		fm.email.value='';
		fm.email.focus();
		return false;
	}

	return true;
}

