function checkComment() {
	var fm=document.comment;

	if(fm.content.value=='' || fm.content.value.length>255) {
		alert('content empty or longer than 255');
		fm.content.focus();
		return false;
	}

	if(fm.code.value.length!=4) {
		alert('validation code must be 4 digits');
		fm.code.focus();
		return false;
	}
	return true;
}
