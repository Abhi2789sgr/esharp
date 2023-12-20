function sw()
{
var p = document.getElementById("process");
if(p.style.display=="none")
p.style="text-align:center; display:table;height:100vh;width:100%;text-align:center;color:#fff!important;background-color:rgba(5,0,0,0.3)!important;";
else
p.style="text-align:center; display:none;height:100vh;width:100%;text-align:center;color:#fff!important;background-color:rgba(5,0,0,0.3)!important;";
}

function msg(txt)
{
	document.getElementById('msg_content').innerHTML=txt;
	document.getElementById('msg').style.display='block';
}

function _close()
{
	document.getElementById('msg').style.display='none';
	var u = window.location.pathname;
	u.replace("?err","");
	window.history.replaceState('Object', 'Title', u);
}