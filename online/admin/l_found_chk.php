<?php
	$types=$_POST['style'];//Ϊ������ֵ
	$days=$_POST['days'];//Ϊ������ֵ
?>


<script language="javascript">
	top.opener.location="main.php?action=log&types=<?php echo $types; ?>&days=<?php echo $days; ?>";
	top.window.close();
</script>
