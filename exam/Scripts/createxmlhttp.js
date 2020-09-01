//定义XMLHttpRrequest对象
var xmlHttp=createXmlHttpRequestObject();

//获取XMLHttpRrequest对象
function createXmlHttpRequestObject(){
	//用来存储将要使用的XMLHttpRrequest对象
	var xmlHttp;
	//如果在internet Explorer下运行
	if(window.ActiveXObject){
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}

	}else{
	//如果在Mozilla或其他的浏览器下运行
		try{
			xmlHttp=new XMLHttpRequest();
		}catch(e){
			xmlHttp=false;
		}
	}
	 //返回创建的对象或显示错误信息
	if(!xmlHttp)
		alert("返回创建的对象或显示错误信息");
		else
		return xmlHttp;
}

//使用XMLHttpRequest对象创建异步HTTP请求
function process(){
	xmlHttp.open("POST","Random_Answers.php",true);
	//定义获取服务器端响应的方法
	xmlHttp.onreadystatechange=handleServerResponse;
	//向服务器发送请求
	xmlHttp.send(null);
}
//当收到服务器端的消息时自动执行
function handleServerResponse(){
	//在处理结束时进入下一步
	if(xmlHttp.readystate==4){
		//状态为200表示处理成功结束
		if(xmlHttp.status==200){
			//获取服务器端发来的XML信息
			xmlResponse=xmlHttp.responseText;
			//获取XML中的文档对象(根对象)
		}else{
			//如果HTTP的状态不是200表示发生错误
        	alert("There was a problem accessing the server:"+xmlHttp.statusText);
		}
	}
}