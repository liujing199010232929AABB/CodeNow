function uncheckAll(form1,status)  //不选
{
	var elements = form1.getElementsByTagName('input');		//获取input标签
	for(var i=0; i<elements.length; i++)					//根据标签的长度执行循环
	{
		if(elements[i].type == 'checkbox')					//判断对象中元素的类型，如果类型为checkbox
		{
		  if(elements[i].checked==true){					//判断当checked的值为true时
			elements[i].checked=false;						//为checked赋值为false
		  }
		}
	}	
}

function checkAll(form1,status)		//全选
{
	var elements = form1.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++)
	{
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==false){
			elements[i].checked=true;
		  }


		}
	}	
}
function switchAll(form1,status)			//反选
{
	var elements = form1.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++)
	{
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==true){
			elements[i].checked=false;
		  }else if(elements[i].checked==false){
			elements[i].checked=true;

			}
		}
	}	
}
