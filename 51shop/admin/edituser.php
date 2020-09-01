
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>用户管理</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body topmargin="0" leftmargin="0" bottommargin="0">
<?php
       include("conn/conn.php");//包含数据库连接文件
       $sql=mysqli_query($conn,"select count(*) as total from tb_user ");//执行查询语句
	   $info=mysqli_fetch_array($sql);//将查询结果返回到数组中
	   $total=$info['total'];//获取查询结果总记录数
	   if($total==0)//如果查询结果为空
	   {
	     echo "本站暂无用户注册!";//输出字符串
	   }
	   else
	   {
	      
?>


<form name="form1" method="post" action="deleteuser.php">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="20" bgcolor="#FFCF60"><div align="center" class="style1">用户管理</div></td>
  </tr>
  <tr>
    <td  bgcolor="#666666"><table width="600" border="0" align="center" cellpadding="0" cellspacing="1">
       <?php
	     $pagesize=10;//每页显示10条记录
		   if ($total<=$pagesize){//如果总记录数小于等于10
		      $pagecount=1;//总页数为1
			} 
			if(($total%$pagesize)!=0){//如果总记录数除以10的余数不为0
			   $pagecount=intval($total/$pagesize)+1;//定义总页数
			
			}else{
			   $pagecount=$total/$pagesize;//定义总页数
			
			}
			if(!isset($_GET['page'])){//如果地址栏中page参数没被设置
			    $page=1;//定义当前页数
			
			}else{
			    $page=intval($_GET['page']);//定义当前页数
			
			}
			 
             $sql1=mysqli_query($conn,"select * from tb_user  order by regtime desc limit ".($page-1)*$pagesize.",$pagesize ");//执行查询语句
            
	   
	   ?>
	   <tr>
          <td width="224" height="20" bgcolor="#FFFFFF"><div align="center">用户昵称</div></td>
          <td width="93" bgcolor="#FFFFFF"><div align="center">用户状态</div></td>
          <td width="79" bgcolor="#FFFFFF"><div align="center">删除</div></td>
          <td width="75" bgcolor="#FFFFFF"><div align="center">查看信息</div></td>
 
        </tr>
       <?php
	      while($info1=mysqli_fetch_array($sql1))//将查询结果循环返回到数组中
		     {
	   ?>
	   <tr>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['name'];?></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center">
		  <?php
		    if($info1['dongjie']==0)//如果查询结果中dongjie字段的值为0
			 {
			   echo "未被冻结";//输出字符串
			 }
			 else
			 {
			   echo "已被冻结";//输出字符串
			 }
		  
		  
		  ?>
		
          </div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center">
          <input type="checkbox" name="<?php echo $info1['id'];?>" value=<?php echo $info1['id'];?>></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><a href="lookuserinfo.php?id=<?php echo $info1['id'];?>"><img src="images/button_select.png" width="14" height="13" border="0"></a></div></td>
          
        </tr>
		<?php
	        }
		    
		?>
    </table></td>
  </tr>
</table>
<table width="600" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="508"><div align="left">
	&nbsp;本站共有注册用户&nbsp;<?php
		   echo $total;//输出总记录数
		  ?>&nbsp;位&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;位&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)//如果当前页数大于等于2
		  {
		  ?>
        <a href="edituser.php?page=1" title="首页"><font face="webdings"> 9 </font></a> 
		<a href="edituser.php?page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
        <?php
		  }
		   if($pagecount<=4){//如果总页数小于等于4
		    for($i=1;$i<=$pagecount;$i++){//循环输出数字页码
		  ?>
        <a href="edituser.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 //循环输出数字页码
		  ?>
        <a href="edituser.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="edituser.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 8 </font></a> 
		<a href="edituser.php?page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
        <?php }?>
	
	</div></td>
    <td width="92"><div align="center"><input type="submit" value="删除选项" class="buttoncss">
    </div></td>
  </tr>

</table>

<?php
   }
?>
</form>
</body>
</html>
