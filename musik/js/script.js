var keyword=document.getElementById('keyword');
var tobolcari=document.getElementById('tombolcari');
var container=document.getElementById('containert');

keyword.addEventListener('keyup',function () {
	
	var xhr = new XMLHttpRequest();
	xhr.open('GET','ajax/coba.php?keyword='+keyword.value,true);
	xhr.onreadystatechange=function()
	{
		if(xhr.readyState == 4 && xhr.status == 200)
		{
			container.innerHTML=xhr.responseText;
		}
	}
	
	xhr.send();

});