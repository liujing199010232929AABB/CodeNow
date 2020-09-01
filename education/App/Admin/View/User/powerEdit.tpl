<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<import type="css" basepath="__CSS__" file="admin" />
<import type="js" basepath="__JS__" file="jquery,form,passwordStrength-min" />
</head>

<body>
    <include file="Inc/head" />
    <div class="position">
        系统管理 - 权限管理 - 编辑权限组
    </div>
    <div class="wid1000">
        <form class="editForm" id="editForm" name="editForm" action="{:U('User/powerSave')}" method="post">
            <input type="hidden" name="id" value="{$dataInfo.id}" />
            <table width="1000" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
                <tr>
                    <td width="114" height="36" bgcolor="#FFFFFF">权限组名：</td>
                    <td width="886" bgcolor="#FFFFFF"><input type="text" class="text400bg" name="group_name" id="group_name" value="{$dataInfo.group_name}" /><span class="Validform_checktip"></span></td>
                </tr>
                <tr>
                    <td width="131" height="36" bgcolor="#FFFFFF">分配权限：</td>
                    <td width="869" bgcolor="#FFFFFF">
                    <!-- 如果是超级管理员，全部展示左侧nav导航-->
                    <if condition="$m_id eq 1">
                        <foreach name="subNav" item="one" key="a" >
                            <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#e9e9e9">
                                <tr>
                                      <td width="15%" height="35" bgcolor="#f0f0f0" align="center">
                                          <label>
                                          {$one.navTitle}
                                          <input type="checkbox" name="group_keys[]" id="parent_{$a}" value="{$a}" onclick="javascript:showCheck('{$a}',this.checked);"
                                          <in name="a" value="$dataInfo['group_keys']">checked</in> />
                                          </label>
                                      </td>
                                      <td width="85%" bgcolor="#FFFFFF">
                                        <table width="100%" border="0">
                                          <foreach  name="one.secNav" item="two" key="b">
                                                <tr>
                                                  <td height="35" bgcolor="#FFFFFF">
                                                  <label>
                                                  {$two.secTitle}
                                                  <input type="checkbox" name="group_keys[]" value="{$b}" class="child_check_{$a}" onclick="javascript:checkParent('{$a}');"
                                                  <in name="b" value="$dataInfo['group_keys']">checked</in> />
                                                  </label>
                                                  </td>
                                            </tr>
                                          </foreach>
                                        </table>
                                    </td>
                                  </tr>
                          </table>
                            <p style=" height:10px"></p>
                        </foreach>
                    <else />
                        <!-- 如果不是管理员，只展示用户组的权限 -->
                        <foreach name="subNav" item="one" key="a" >
                          <table width="100%" border="0" bgcolor="#e9e9e9">
                          <in name="a" value="$group_keys">
                                <tr>
                                  <td width="15%" height="35" align="center" bgcolor="#f0f0f0">
                                      <label>
                                          {$one.navTitle}
                                          <input type="checkbox" name="group_keys[]" id="parent_{$a}" value="{$a}" onclick="javascript:showCheck('{$a}',this.checked);" <in name="a" value="$dataInfo['group_keys']">checked</in> />
                                      </label>
                                  </td>
                                  <td width="85%" bgcolor="#ffffff">
                                    <table width="100%" border="0">
                                      <foreach  name="one.secNav" item="two" key="b">
                                         <in name="b" value="$group_keys">
                                            <tr>
                                              <td height="35" bgcolor="#FFFFFF">
                                              <label>
                                              {$two.secTitle}
                                              <input type="checkbox" name="group_keys[]" value="{$b}" class="child_check_{$a}" onclick="javascript:checkParent('{$a}');"
                                              <in name="b" value="$dataInfo['group_keys']">checked</in> />
                                              </label>
                                              </td>
                                           </tr>
                                         </in>
                                      </foreach>
                                    </table>
                                  </td>
                              </tr>
                            </in>
                          </table>
                             <p style=" height:10px"></p>
                        </foreach>
                    </if>
                    </td>
                </tr>
                <tr>
                    <td width="131" height="42" align="right" bgcolor="#FFFFFF"></td>
                    <td bgcolor="#FFFFFF"><input type="submit" class="linkcommon" value="保存" /></td>
                </tr>
            </table>
        </form>
    </div>

    <script language="javascript">
      function showCheck(pid , val){
        if(val==true){
            $(".child_check_"+pid).attr('checked', true);
        }else{
            $(".child_check_"+pid).attr('checked', false);
        }
      }
      function checkParent(pid){
            var val=false;
            $(".child_check_"+pid).each(function(){
              if(this.checked==true){
                $("#parent_"+pid).attr('checked', true);
                val = true;
                return false;
              }
            });
            if(val==false){
            $("#parent_"+pid).attr('checked', false);
            }
      }
    </script>

    <script language="javascript">
    $(function(){
        var obj=$(".editForm").Validform({
                tiptype:function(msg,o,cssctl){
                    if(!o.obj.is("form")){ //验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
                        var objtip=o.obj.siblings(".Validform_checktip");
                        cssctl(objtip,o.type);
                        objtip.text(msg);
                    }
                }
            });
        obj.addRule([{
            ele:"#group_name:eq(0)",
            datatype:"*",
            nullmsg:"请填写权限组名",
        }]);
    });

    </script>
</body>
</html>
