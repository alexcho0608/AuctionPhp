//test file, not used in the website
<script>
function check(var ip){
  var msg;
	if(window.XMLHttpRequest){
	 msg=new XMLHttpRequest;
	}
	else{
	 msg=new ActiveXObjext("Microsoft.XMLHttp");
	}
  msg.open("GET","check.php?ip="+ip,true);
  msg.send();
  msg.onreadystatechange=function()
  {
    if (msg.readyState==4 && xmlhttp.msg==200 && msg.responseText=='1'){
      window.location("errorPage");
    }
  }		
}
<script>
