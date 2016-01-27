window.onload=function() {
	var level=document.getElementById("level");
	var options=document.getElementsByTagName("option");

	if(level) {	
		for(i=0; i<options.length; i++) {
			if(options[i].value==level.value)
				options[i].setAttribute('selected', 'selected');
		}
	}

	var title=document.getElementById('title');
	var ol=document.getElementsByTagName('ol');
	var a=ol[0].getElementsByTagName('a');

	for(i=0;i<a.length;i++) {
		a[i].className=null;
		if(title.innerHTML==a[i].innerHTML) 
			a[i].className='selected';
	}
}

function checkUpdateForm() {
	var fm=document.update;
	
	if(fm.admin_pass.value != '') {
		if(fm.admin_pass.value.length<6) {
			alert('password less than 6');
			fm.admin_pass.focus();
			return false;
		}
	}

	return true;
}

function checkAddForm() {
	var fm=document.add;
	
	if(fm.admin_user.value=='' || fm.admin_user.value.length<2 || fm.admin_user.value.length>20) {
		alert('username empty or less than 2 or more than 20');
		fm.admin_user.focus();
		return false;
	}

	if(fm.admin_pass.value=='' || fm.admin_pass.value.length<6) {
		alert('password empty or less than 6');
		fm.admin_pass.focus();
		return false;
	}

	if(fm.admin_pass.value != fm.admin_notpass.value) {
		alert('password not match');
		fm.admin_notpass.focus();
		return false;
	}

	return true;
}
