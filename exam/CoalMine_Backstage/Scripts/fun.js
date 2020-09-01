function chkinputlogin(form) {
	if (form.netname.value == "") {
		alert("请输入用户名！");
		form.netname.focus();
		return false;
	}
	if (form.pwd.value == "") {
		alert("请输入登录密码！");
		form.pwd.focus();
		return false;
	}
	if (form.xym.value == "") {
		alert("请输入验证码！");
		form.xym.focus();
		return false;
	}
	if (form.xym.value != form.xym1.value) {
		alert("验证码输入有误！");
		form.xym.focus();
		return false;
	}
	return true;
}

function chkinputlogin1(form) {
	if (form.netname.value == "") {
		alert("请输入用户名！");
		form.netname.focus();
		return false;
	}
	if (form.pwd.value == "") {
		alert("请输入登录密码！");
		form.pwd.focus();
		return false;
	}
	return true;
}

function chkchangeface(form) {
	if (form.face.value == "") {
		alert("请选择要更改的头像！");
		form.face.focus();
		return false;
	}
	return true;
}

function chkinputstudypj(form) {
	if (form.content.value == "") {
		alert("请输入评论内容！");
		form.content.focus();
		return false;
	}
	return true;
}
//
function checkIdcard2(idcard){
var Errors=new Array(
"验证通过!",
"身份证号码位数不对!",
"身份证号码出生日期超出范围或含有非法字符!",
"身份证号码校验错误!",
"身份证地区非法!"
);
var area={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}

var idcard,Y,JYM;
var S,M;
var idcard_array = new Array();
idcard_array = idcard.split("");
//地区检验
if(area[parseInt(idcard.substr(0,2))]==null)
{
alert(Errors[4]);
return false ;
}
//身份号码位数及格式检验
switch(idcard.length){
case 15:
if ( (parseInt(idcard.substr(6,2))+1900) % 4 == 0 || ((parseInt(idcard.substr(6,2))+1900) % 100 == 0 && (parseInt(idcard.substr(6,2))+1900) % 4 == 0 )){
ereg=/^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}$/;//测试出生日期的合法性
} else {
ereg=/^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}$/;//测试出生日期的合法性
}
if(ereg.test(idcard)) return true;
else
{
alert(Errors[2]);
return false;
}
break;
case 18:
//18位身份号码检测
//出生日期的合法性检查
//闰年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))
//平年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))
if ( parseInt(idcard.substr(6,4)) % 4 == 0 || (parseInt(idcard.substr(6,4)) % 100 == 0 && parseInt(idcard.substr(6,4))%4 == 0 )){
ereg=/^[1-9][0-9]{5}(19|20)[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}[0-9Xx]$/;//闰年出生日期的合法性正则表达式
} else {
ereg=/^[1-9][0-9]{5}(19|20)[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}[0-9Xx]$/;//平年出生日期的合法性正则表达式
}
if(ereg.test(idcard)){//测试出生日期的合法性
//计算校验位
S = (parseInt(idcard_array[0]) + parseInt(idcard_array[10])) * 7
+ (parseInt(idcard_array[1]) + parseInt(idcard_array[11])) * 9
+ (parseInt(idcard_array[2]) + parseInt(idcard_array[12])) * 10
+ (parseInt(idcard_array[3]) + parseInt(idcard_array[13])) * 5
+ (parseInt(idcard_array[4]) + parseInt(idcard_array[14])) * 8
+ (parseInt(idcard_array[5]) + parseInt(idcard_array[15])) * 4
+ (parseInt(idcard_array[6]) + parseInt(idcard_array[16])) * 2
+ parseInt(idcard_array[7]) * 1
+ parseInt(idcard_array[8]) * 6
+ parseInt(idcard_array[9]) * 3 ;
Y = S % 11;
M = "F";
JYM = "10X98765432";
M = JYM.substr(Y,1);//判断校验位
if(M == idcard_array[17]) return true; //检测ID的校验位
else
{ alert(Errors[3]);
return false;
}
}
else
{
alert(Errors[2]);
return false;
}
break;
default:
alert(Errors[1]);
return false ;
break;
}
}


function chkinputaddserver(form,flag) {
    if (form.servername.value == '') {
        alert("请输入考生名称！");
        form.servername.focus();
        return false;
    }
    if(flag == 2){
        if (form.password.value.length>0 && form.password.value.length<6) {
            alert("密码必须大于6位，请重新输入！");
            form.password.focus();
            return false;
        }
        if (form.password.value == '') {
            alert("请输入密码！");
            form.password.focus();
            return false;
        }
        if (form.password1.value == '') {
            alert("请输入确认密码！");
            form.password1.focus();
            return false;
        }
        if (form.password1.value != form.password.value) {
            alert("密码和确认密码请输入一致！");
            form.password1.focus();
            return false;
        }
    }

	if (form.ID_number.value == '') {
		alert("请输入身份证号码！");
		form.ID_number.focus();
		return false;
	}
	if (!checkIdcard2(form.ID_number.value)) {

		form.ID_number.focus();
		return false;
	}



	if (form.pro_class.value == '') {
		alert("请选择类别！");
		form.pro_class.focus();
		return false;
	}

	if (form.post.value == '') {
		alert("请输入人员职务！");
		form.post.focus();
		return false;
	}
	if (form.units.value == '') {
		alert("请输入所属单位！");
		form.units.focus();
		return false;
	}
	if (form.address.value == '') {
		alert("请输入地址！");
		form.address.focus();
		return false;
	}
	if (form.tel.value == '') {
		alert("请输入电话！");
		form.tel.focus();
		return false;
	}
    /*
    检查规则：
    (1)电话号码由数字、"("、")"和"-"构成
    (2)电话号码为3到8位
    (3)如果电话号码中包含有区号，那么区号为三位或四位
    (4)区号用"("、")"或"-"和其他部分隔开
    (5)移动电话号码为11或12位，如果为12位,那么第一位为0
    (6)11位移动电话号码的第一位和第二位为"13"
    (7)12位移动电话号码的第二位和第三位为"13"
       */
    var pattern=/(^[0-9]{3,4}\-[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/;
    if(!pattern.test(form.tel.value))
    {
        alert('请输入合法的电话号码！');
        return false;
    }


    return true;

}

//
function chkinputaddbcjyz(form) {
	if (form.title.value == "") {
		alert("请输入主题！");
		form.title.focus();
		return false;
	}

	if (form.bccdtypeid.value == "") {
		alert("请选择编程词典类别！");
		form.bccdtypeid.focus();
		return false;
	}
	if (form.classid.value == "") {
		alert("请选择课程名称！");
		form.classid.focus();
		return false;
	}
	if (form.type.value == "") {
		alert("请选择所属类别！");
		form.type.focus();
		return false;
	}
	if (form.serverid.value == "") {
		alert("请选择开发或服务人员名称！");
		form.serverid.focus();
		return false;
	}
	if (form.address.value == "") {
		alert("请选择程序主界面！");
		form.address.focus();
		return false;
	}
	if (form.filename.value == "") {
		alert("请选择上传文件名！");
		form.filename.focus();
		return false;
	}
	if (form.vodname.value == "") {
		alert("请选择视频文件名！");
		form.vodname.focus();
		return false;
	}
	var oEditor = FCKeditorAPI.GetInstance("content");
	var chkContent = oEditor.GetXHTML();
	chkContent = chkContent.replace("<br />", "");
	chkContent = chkContent.replace("nbsp;", "");
	if (chkContent == "") {
		alert("请输入详细内容！");
		return false;
	}
	return true;
}
//
function chkinputedibcjyz(form) {
	if (form.title.value == "") {
		alert("请输入主题！");
		form.title.focus();
		return false;
	}

	if (form.bccdtypeid.value == "") {
		alert("请选择编程词典类别！");
		form.bccdtypeid.focus();
		return false;
	}
	if (form.classid.value == "") {
		alert("请选择课程名称！");
		form.classid.focus();
		return false;
	}
	if (form.type.value == "") {
		alert("请选择所属类别！");
		form.type.focus();
		return false;
	}
	if (form.serverid.value == "") {
		alert("请选择开发或服务人员名称！");
		form.serverid.focus();
		return false;
	}
	var oEditor = FCKeditorAPI.GetInstance("content");
	var chkContent = oEditor.GetXHTML();
	chkContent = chkContent.replace("<br />", "");
	chkContent = chkContent.replace("nbsp;", "");
	if (chkContent == "") {
		alert("请输入详细内容！");
		return false;
	}
	return true;
}
//

//

//

function chkinputbuyuserinfo(form, mark) {
	if (mark == 0 || mark == "all") {
		if (form.username.value == "") {
			chkusername.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;请输入收货人姓名！";
			chkusername.style.display = '';
			form.username.style.backgroundColor = "#FF0000";
			return false;
		} else {
			chkusername.innerHTML = "";
			chkusername.style.display = 'none';
			form.username.style.backgroundColor = "#FFFFFF";
		}

	}

	if (mark == 1 || mark == "all") {
		if (form.sex.value == "") {
			chksex.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;请选择收货人性别！";
			chksex.style.display = '';
			form.sex.style.backgroundColor = "#FF0000";
			return false;
		} else {
			chksex.innerHTML = "";
			chksex.style.display = 'none';
			form.sex.style.backgroundColor = "#FFFFFF";
		}

	}

	if (mark == 2 || mark == "all") {
		if (form.address.value == "") {
			chkaddress.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;请输入收货人详细联系地址！";
			chkaddress.style.display = '';
			form.address.style.backgroundColor = "#FF0000";
			return false;
		} else {
			chkaddress.innerHTML = "";
			chkaddress.style.display = 'none';
			form.address.style.backgroundColor = "#FFFFFF";
		}

	}

	if (mark == 3 || mark == "all") {
		if (form.yb.value == "") {
			chkyb.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;请输入邮编！";
			form.yb.style.backgroundColor = "#FF0000";
			chkyb.style.display = '';
			return false;
		} else if (isNaN(form.yb.value)) {
			chkyb.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;邮编由数字组成！";
			form.yb.style.backgroundColor = "#FF0000";
			chkyb.style.display = '';
			return false;
		} else if (form.yb.value.length != 6) {
			chkyb.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;邮编由6位数字组成！";
			form.yb.style.backgroundColor = "#FF0000";
			chkyb.style.display = '';
			return false;
		} else {
			chkyb.innerHTML = "";
			chkyb.style.display = 'none';
			form.yb.style.backgroundColor = "#FFFFFF";
		}
	}

	if (mark == 4 || mark == "all") {
		if (form.tel.value == "") {
			chktel.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;请输入联系电话！";
			form.tel.style.backgroundColor = "#FF0000";
			chktel.style.display = '';
			return false;
		} else if (isNaN(form.tel.value)) {
			chktel.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;电话号由数字组成！";
			form.tel.style.backgroundColor = "#FF0000";
			chktel.style.display = '';
			return false;
		} else {
			chktel.innerHTML = "";
			chktel.style.display = 'none';
			form.tel.style.backgroundColor = "#FFFFFF";
		}
	}

	if (form.but_showtt.checked && (mark == 5 || mark == "all")) {
		if (form.tt.value == "") {
			chktt.innerHTML = "<font color='#990000'>·</font>&nbsp;&nbsp;请输入发票抬头！";
			chktt.style.display = '';
			form.tt.style.backgroundColor = "#FF0000";
			return false;
		} else {
			chktt.innerHTML = "";
			chktt.style.display = 'none';
			form.tt.style.backgroundColor = "#FFFFFF";
		}

	}

	return true;

}

function isShowtt(form) {
	if (showtt.style.display == '') {
		showtt.style.display = 'none';
		form.tt.value = '';
	} else {
		showtt.style.display = '';
	}
}
// JavaScript Document
/*<!--function funs(nu){     //为省份下拉列表增加改变事件

$(document).ready(

	function (){
	//	$("#c").css("display","none");     //初始状态使城市下拉列表不可见
			$("#"+nu).css("background","url(img/bccd_09.jpg)");
			$("#"+nu).css("color","#000000");


			$("#"+nu).click(function(){     //为省份下拉列表增加改变事件

if($("#nu").val()!="p_2"){
		$("#"+'p_2').css("background","url(img/bccd_09.jpg)");
			$("#"+'p_2').css("color","#000000");
	}
			$("#"+nu).css("background","url(img/bccd_10.jpg)");
			$("#"+nu).css("color","#C70102");

//   if($("#p").val()==""){		 //在没选择省份的情况下，使城市下拉列表不可见
			//    $("#c").css("display","none");
		//}else{
		        $.get("returnpc.php?p="+$("#"+nu).text(), null, function(data){     //如果选择了某省份，则向服务器发送GET请求，使用回调函数为城市下拉列表赋值，并使城市下拉列表可见

					$("#c").empty();
			        $("#c").append(data);      //将数据追加到城市下拉列表
//					$("#cs").css("display","none");     //初始状态使城市下拉列表不可见
			    });
		  //   }
		});

		$("#"+nu).blur(function(){     //为省份下拉列表增加改变事件
			$("#"+nu).css("background","url(img/bccd_09.jpg)");
			$("#"+nu).css("color","#000000");

		});
    }
);
}
-->*/