function admin_top_nav(j) {
	for(var i=1;i<5;i++) {
		document.getElementById('nav'+i).style.background='#464b4c';
		document.getElementById('nav'+i).onmouseover=function() { this.style.backgroundColor='#4d5354'; }
		document.getElementById('nav'+i).onmouseout=function() { this.style.backgroundColor='#464b4c'; }
		document.getElementById('nav'+i).style.borderBottom='1px solid #464b4c';
	}
	
	switch (j) {
		case 1:
			document.getElementById('nav'+j).style.background='#4d5354';
			document.getElementById('nav'+j).style.background='rgba(255, 255, 255, 0.05)';
			document.getElementById('nav'+j).style.borderBottom='3px solid #c0bb30';
			break;
		case 2:
			document.getElementById('nav'+j).style.background='#4d5354';
			document.getElementById('nav'+j).style.background='rgba(255, 255, 255, 0.05)';
			document.getElementById('nav'+j).style.borderBottom='3px solid #56c93d';
			break;
		case 3:
			document.getElementById('nav'+j).style.background='#4d5354';
			document.getElementById('nav'+j).style.background='rgba(255, 255, 255, 0.05)';
			document.getElementById('nav'+j).style.borderBottom='3px solid #d00';
			break;
		case 4:
			document.getElementById('nav'+j).style.background='#4d5354';
			document.getElementById('nav'+j).style.background='rgba(255, 255, 255, 0.05)';
			document.getElementById('nav'+j).style.borderBottom='3px solid #c052b9';
			break;
	}
}
