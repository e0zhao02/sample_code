function sface() {
	var fm=document.reg;
	var index=fm.face.selectedIndex;

	fm.faceimg.src='images/'+fm.face.options[index].value;
}
