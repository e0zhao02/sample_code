window.onload=function() {
	var oDiv=document.getElementsByTagName('div')[0];
	var oSpan=document.getElementsByTagName('span')[0];

	oSpan.style.left=document.body.clientWidth+'px';

	setInterval(function() {
		if(oSpan.offsetLeft<=-oSpan.offsetWidth) oSpan.style.left=document.body.clientWidth+'px';
		oSpan.style.left=oSpan.offsetLeft-2+'px';
	}, 30);
}
