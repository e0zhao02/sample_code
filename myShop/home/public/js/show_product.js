function show_products(brand_id) {
	var oSpan=document.getElementsByClassName('products');
	var oShop=document.getElementsByClassName('shopshow')[0];

	var xmlhttp=new XMLHttpRequest();	
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			oShop.innerHTML=xmlhttp.responseText;
		}
	};

	xmlhttp.open("GET","getproduct.php?q="+brand_id,true);
	xmlhttp.send();
}
