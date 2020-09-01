<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin,humane.libnotify" />
<import type="js" basepath="__JS__" file="jquery,admin,humane" />
</head>

<body>
<include file="Inc/head" />
<div class="position">
	系统管理 - 账户管理
</div>
<div class="funcform">
	<a href="{:U('User/edit')}" class="addSinglepage" title="增加账户">增加账户</a>
</div>
<div class="sin_form">
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dddddd">
		<tr>
		  <td width="461" height="36" align="center" bgcolor="#eeeeee">账号</td>
		  <td width="608" align="center" bgcolor="#eeeeee">分组</td>
	      <td width="318" align="center" bgcolor="#eeeeee">操作</td>
	  </tr>
      
       <foreach name="dataList" item="item" key='k'>
		<tr>
			<td height="36" align="center" bgcolor="#ffffff">{$item.username}</td>
			<td align="center" bgcolor="#ffffff">
            <if condition="$item.id eq 1">
            	超级管理员
            <else />
            	
            <select class="sel1" onchange="javascript:changePower(this.value , {$item.id} , {$k})">
                <option value="0">请选择</option>
              <foreach name="powerList" item="pp">
                <option value="{$pp.id}" <if condition="$pp['id'] eq $item['group_id']">selected</if>>{$pp.group_name}</option>
              </foreach>  
            </select>
            </if>
            </td>
			<td align="center" bgcolor="#ffffff">
                    <a href="{:U('User/del','id='.$item['id'])}" title="删除" onclick="javascript:if(confirm('确定删除此条目？')){return true;}else{return false;}"><img src="__IMG__/btns_05.jpg" class="opimg" /></a>
			</td>
		</tr>
        </foreach>
        
        
	</table>

</div>
<script language="javascript">

	function changePower(val , mid , k){
		
		$.post("{:U('User/ajaxSelectUserPower')}",{val:val,mid:mid},function(result){
				if(result=="success"){
					humane.success("修改完毕");
				}else{
					humane.error("修改失败");
				}
		});		
		
	}

</script>


</body>
</html>
