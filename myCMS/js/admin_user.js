window.onload=function() {
	var title=document.getElementById('title');
	var ol=document.getElementsByTagName('ol');
	var a=ol[0].getElementsByTagName('a');

	for(i=0;i<a.length;i++) {
		a[i].className=null;
		if(title.innerHTML==a[i].innerHTML) 
			a[i].className='selected';
	}
}

function sface() {
	var fm=document.reg;
	var index=fm.face.selectedIndex;

	fm.faceimg.src='../images/'+fm.face.options[index].value;
}

function checkForm() {
	var fm=document.add;
	
	if(fm.level_name.value=='' || fm.level_name.value.length<2 || fm.level_name.value.length>20) {
		alert('level name empty or less than 2 or more than 20');
		fm.level_name.focus();
		return false;
	}

	if(fm.level_info.value.length>200) {
		alert('level info more than 200');
		fm.level_info.focus();
		return false;
	}

	return true;
}
