<?php
include "./function.php";           //���ú����ļ�
include "./conn/conn.php";          //��������Դ�ļ�
$query = mysqli_query($connID,"select * from tb_room where id = '".$_GET['id']."'");
$info=mysqli_fetch_array($query);
if(!$info){
    header("location:index.php");           //��ת����Ϸ��ҳ
    exit;
}
$name = $info['name'];       //��ѯ��Ϸ�ķ����
$guest = $info['guest'];         //��ѯ�ͻ�������
$host = $info['host'];       //��ѯ����������
$chess = $info['chess'];         //��ѯȫ����������λ��
$flag = $info['flag'];       //�鿴���
$guest_win = $info['guest_win'];      //�鿴�ͻ��˵�Ӯ�ּ�¼
$host_win = $info['host_win'];       //�鿴�������˵�Ӯ�ּ�¼
if($guest != '' && $host != '' && $username != $guest && $username != $host){
    header("location:index.php");                 //��ת����Ϸ��ҳ
    exit;        //�˳�
}
if($host != '' && $guest == '' && $username != $host){
    header("location:join.php?roomid=".$_GET['id']);         //��ת��������Ϸҳ��
    exit;        //�˳�
}
/*if($host == '' && $guest != '' && $username != $guest){
    header("location:join.php?roomid=".$_GET['id']);         //��ת��������Ϸҳ��
    exit;        //�˳�
}*/
if(isset($_COOKIE['message'])){          //�����Ϣ�洢��Cookie�У������Cookie�е�������Ϣ
    echo "<script>alert('".$_COOKIE['message']."');</script>";
    setcookie("message", null);          //����Cookie�е���Ϣ
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <title>����������Ϸ--<?php echo $name."����";?></title>
    <link rel="stylesheet" href="css/room.css" />
    <script src="chessrule.js"></script>
    <script>
        function copy_url(){            //�Զ��帴����ַ����
            if(window.clipboardData && window.clipboardData.setData){
                window.clipboardData.setData('text',document.location.href);
                alert('���Ƴɹ���Ctrl + V �ѵ�ַ���͸�����');
            }else{
                alert('�����������֧�ָø��ƹ��ܣ���ʹ��Ctrl + C������Ҽ����и���');
            }
        }
    </script>
    <script>
        var allow_load = <?php
                    if(($username == $guest && $flag == "guest") || ($username == $host && $flag == "host"))
                        echo 0;
                    else
                        echo 1;
                  ?>;
        var site = "<?php echo $username != $host?'guest':'host';?>";
        var site_num = "<?php echo $username == $guest?'0':'1';?>";
        //���������壨1�������ˣ����壨0��
        var flag = "<?php echo $flag;?>";//��ʼ����Ǳ���
        var guest = "<?php echo $guest;?>";//��ȡ�����������
        var host = "<?php echo $host;?>";//��ȡ�����������
        var now_chess = "";//��ʼ����ǰ���ӵı���Ϊ��
        var moved = "";//��ʼ���ƶ����ӵı���Ϊ��
        var eated = "";//��ʼ������ı���
        var pause_time = 0;//��ʼ��������Ϣ��ʱ��
        var prompt_pause_time = 0;//��ʼ����ʾ��Ϣ��ʱ��
        var guest_win = <?php echo $guest_win;?>;//���巽��Ӯ�ִ���
        var host_win = <?php echo $host_win;?>;//���巽��Ӯ�ִ���
        var game_ended = 0;//��ʼ����Ϸ�������
        var t3 = "";
        function form_chess(chess){       //�Զ��庯��
            now_chess = chess;//�Ե�ǰ���ӵı������¸�ֵ
            var chess_split = chess.split(",");//�ָ������ַ���Ϊ����
            var pla = "<table width=556 height=601 border=0 cellpadding=0 cellspacing=0 bordercolor=#000000 background=images/bg.png><tr><td><table align=center border=0 cellpadding=0 cellspacing=0 width=540 height=601>";
            if(site == "host")
                for(var i = 0;i < 10;i ++){          //��������������������10��9�У���������������λ��
                    pla += "<tr>";
                    for(j = 0;j < 9;j ++){
                        pla += "<td><div id=chess_"+(i * 9 + j + 1)+"><input type=hidden name=chess_value_"+(i * 9 + j + 1)+" id=chess_value_"+(i * 9 + j + 1)+" value="+chess_split[i * 9 + j]+"><a href=javascript:click_chess("+(i * 9 + j + 1)+")><img alt="+chess_split[i * 9 + j]+","+(i * 9 + j + 1)+" src=images/"+chess_split[i * 9 + j]+".png border=0 width=58px height=58px></a></div></td>";
                    }
                    pla += "</tr>";
                }
            else
                for(var i = 9;i >= 0;i --){          //���������пͻ�������10��9�У������ÿͻ�����λ��
                    pla += "<tr>";
                    for(j = 8;j >= 0;j --){
                        pla += "<td><div id=chess_"+(i * 9 + j + 1)+"><input type=hidden name=chess_value_"+(i * 9 + j + 1)+" id=chess_value_"+(i * 9 + j + 1)+" value="+chess_split[i * 9 + j]+"><a href=javascript:click_chess("+(i * 9 + j + 1)+")><img alt="+chess_split[i * 9 + j]+","+(i * 9 + j + 1)+"  src=images/"+chess_split[i * 9 + j]+".png  border=0 width=58px height=58px></a></div></td>";
                    }
                    pla += "</tr>";
                }
            pla += "</table></td></tr></table>";
            return pla;
        }
        var prev_click = "";//��ʼ����һ�����������ӵı���
        var chess_flash = "";//��ʼ��������˸�ı���
        var flash_status = 0;//��ʼ��������˸״̬�ı���
        var message_guest = "";//��ʼ���������������Ϣ�ı���
        var message_host = "";//��ʼ���������������Ϣ�ı���
        var prev_message_guest = "";//��ʼ�����������һ��������Ϣ�ı���
        var prev_message_host = "";//��ʼ�����������һ��������Ϣ�ı���
        function click_chess(num){          //�������Ӳ���
            if(site != flag)               //�����ǰ��siteֵ���������ӵ�������,�����Է�ִ����ʾ��Ϣ
                open_prompt("�Է�ִ�壡", '40%', '2%');
            else{                       //����ִ���������
                close_prompt();                //�ر���ʾ��Ϣ������Ϊ����
                for(var i = 1;i < 91;i ++)
                    document.getElementById("chess_"+i).style.visibility = "visible";        //�������ӿɼ�
                chess_flash = "";//������˸�ı�������Ϊ��
                if(document.getElementById("chess_value_"+num).value.substr(0, 1) == site_num){
                    chess_flash = num;//����ǰ���������Ӷ���Ϊ��˸������
                    prev_click = num;        //��¼���ӵ�ǰλ��
                }else{
                    if(prev_click != ""){     //������ӵ����巽�����ԣ��򵯳���ʾ
                        if(!check(document.getElementById('chess_value_'+prev_click).value, prev_click, num))
                            open_prompt("���Ĳ�������", '40%', '2%');
                        else{//ִ�г��������������š����ӵ�ԭʼ����㡢Ŀ������㴫�ݵ�submit.phpҳ��
                            send_request("submit.php?roomid=<?php echo $_GET['id'];?>&from="+prev_click+"&to="+num+"&site="+site+"&time="+Math.random());
                            allow_load = 1;//Ϊ������ֵ
                            prev_click = "";//����һ�������ӵ�ֵ����Ϊ��
                        }
                    }else
                        open_prompt("�ⲻ���������ӣ�", '40%', '2%');//����ʾ��
                }
            }
        }
        var prompt_count = 0;//��ʼ������
        function open_prompt(message, top, left){           //�����ʾ�����ڵ�λ��
            prompt_count = 1;//������ֵ����Ϊ1
            prompt_pause_time ++;                       //��ʱ��ÿ1������ۼ�
            if(message){//���������Ϣ��Ϊ��
                document.getElementById("item").style.visibility = "visible";//����Ԫ�ؿɼ�
                document.getElementById("item").style.align = "center";//����Ԫ�ؾ�����ʾ
                document.getElementById("item").style.top = top ;//����Ԫ�ص������ľ���
                document.getElementById("item").style.left = left ;//����Ԫ�ص����ľ���
                document.getElementById("item").innerHTML =  '<table class=message_box><tr><td valign=middle>ϵͳ��ʾ��<br><br>&nbsp;&nbsp;'+message+'</td></tr></table>';//����Ԫ������ʾ������
            }
        }
        function close_prompt(){         //�ر���ʾ��Ϣ������Ϊ����
            document.getElementById("item").style.visibility = "hidden";//����Ԫ��Ϊ����
            document.getElementById("item").innerHTML =  '';//����Ԫ���е�����Ϊ��
            prompt_pause_time = 0;          //��ʱ���ܳ�ʼ��Ϊ0
        }
        var http_request = false;
        function send_request(url) {
            open_prompt((prompt_pause_time > 0?'�ȴ��Է���Ӧ��'+prompt_pause_time+'�룩':''), '40%', '2%');
            if (window.XMLHttpRequest) { //����XMLHTTPRequest����
                http_request = new XMLHttpRequest();
                if (http_request.overrideMimeType) {
                    http_request.overrideMimeType('text/xml');
                }
            } else if (window.ActiveXObject) { //����XMLHTTP����
                try {
                    http_request = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {}
                }
            }
            if (!http_request) {//���http_request��ֵΪ�٣����ܴ�������
                alert('���ܴ��� XMLHttpRequest ����!');
                return false;
            }
            http_request.onreadystatechange = processRequest;//ָ���ص�����
            http_request.open('GET', url, true);//��GET�����ύ����
            http_request.send(null);//���͵���ϢΪ��
        }
        var resultDiv;//���崴��divԪ�صı���
        var text = new Array();//���������
        function processRequest() {             //���������е���ʾ��Ϣ��
            if (http_request.readyState == 4 && http_request.status == 200) {//�����������ɲ����ͳɹ�
                if(http_request.responseText == "ended")//�������������ֵΪended
                    document.location.href = "index.php";//ҳ����ת����Ϸ��ҳ
                text = http_request.responseText.split("|");//������ֵ��|���зָ��������
                if(http_request.responseText){//�������ֵΪ��
                    t3 = text[3];//��ȡ�������ӵ�ֵ
                    message_guest = decodeURI(text[8]);//��ȡ��������������Ϣ
                    message_host = decodeURI(text[9]);//��ȡ��������������Ϣ
                    guest_win = text[6];//��ȡ��������Ӯ�����
                    host_win = text[7];//��ȡ��������Ӯ�����
                    if(text[4] != guest){//���������������б仯
                        if(text[4] == ""){//��������������Ϊ��
                            open_prompt(guest+"�˳���Ϸ���䣡", '40%', '2%');//����ʾ��
                            guest = "";//������������ƶ���Ϊ��
                            prompt_pause_time = 0;//����ʾ���е�ʱ�䶨��Ϊ0
                            allow_load = 0;//Ϊ������ֵ
                        }else{
                            open_prompt(text[4]+"������Ϸ���䣡", '40%', '2%');//����ʾ��
                            guest = text[4];//���¶�������������
                            flag = text[1];//���¶��嵱ǰ�����־
                            document.getElementById("pla").innerHTML = form_chess(text[0]);//�����̽������²���
                        }
                    }
                    if(text[5] != host){//���������������б仯
                        if(text[5] == ""){//��������������Ϊ��
                            open_prompt(host+"�˳���Ϸ���䣬���ѳ�Ϊ������", '40%', '2%');//����ʾ��
                            host = "";//������������ƶ���Ϊ��
                            prompt_pause_time = 0;//����ʾ���е�ʱ�䶨��Ϊ0
                            allow_load = 0;//Ϊ������ֵ
                            if(site == 'guest'){//���ִ�е�ǰ�������Ǻ������
                                setTimeout("location.href = 'join.php?roomid=<?php echo $_GET['id'];?>'",1000);//��1�������¼�����Ϸ
                            }
                        }
                    }
                }
                if(now_chess != text[0] && text[0]){//������������б仯
                    document.getElementById("pla").innerHTML = form_chess(text[0]);//���������²���
                    flag = text[1];//���¶��嵱ǰ�����־
                    moved = text[2];//���¶��嵱ǰ�ƶ�������
                    if(site == flag)//���ִ�е�ǰ��������Ҫ��������
                        allow_load = 0;//Ϊ������ֵ
                    if(text[3] == "000" && site == "guest"){//������塰�������ԣ������ִ���������
                        resultDiv = document.createElement("div");//����divԪ��
                        resultDiv.className = "imgDiv";//Ϊdiv����class����ֵ
                        resultDiv.innerHTML = "<img src='images/failure.png' width='100%' height='100%'>";//Ϊdiv����ͼƬ
                        document.body.appendChild(resultDiv);//��body�����divԪ��
                        setTimeout("document.body.removeChild(resultDiv)",3000);//��3�����Ƴ�divԪ��
                        eated = text[3];//�����Ե����Ӹ�ֵ������eated
                        game_ended = 1;//����Ϸ��������ֵ����Ϊ1
                        allow_load = 1;//Ϊ������ֵ
                        prompt_pause_time = 0;//����ʾ���е�ʱ�䶨��Ϊ0
                    }else if(text[3] == "100" && site == "host"){  //������塰˧�����ԣ������ִ���������
                        resultDiv = document.createElement("div");//����divԪ��
                        resultDiv.className = "imgDiv";//Ϊdiv����class����ֵ
                        resultDiv.innerHTML = "<img src='images/failure.png' width='100%' height='100%'>";//Ϊdiv����ͼƬ
                        document.body.appendChild(resultDiv);//��body�����divԪ��
                        setTimeout("document.body.removeChild(resultDiv)",3000);//��3�����Ƴ�divԪ��
                        eated = text[3];//�����Ե����Ӹ�ֵ������eated
                        game_ended = 1;//����Ϸ��������ֵ����Ϊ1
                        prompt_pause_time = 0;//����ʾ���е�ʱ�䶨��Ϊ0
                    }else if(text[3] == "000" && site == "host"){  //������塰�������ԣ������ִ���������
                        resultDiv = document.createElement("div");//����divԪ��
                        resultDiv.className = "imgDiv";//Ϊdiv����class����ֵ
                        resultDiv.innerHTML = "<img src='images/success.png' width='100%' height='100%'>";//Ϊdiv����ͼƬ
                        document.body.appendChild(resultDiv);//��body�����divԪ��
                        setTimeout("document.body.removeChild(resultDiv)",3000);//��3�����Ƴ�divԪ��
                        eated = text[3];//�����Ե����Ӹ�ֵ������eated
                        game_ended = 1;//����Ϸ��������ֵ����Ϊ1
                        prompt_pause_time = 0;//����ʾ���е�ʱ�䶨��Ϊ0
                    }else if(text[3] == "100" && site == "guest"){ //������塰˧�����ԣ������ִ���������
                        resultDiv = document.createElement("div");//����divԪ��
                        resultDiv.className = "imgDiv";//Ϊdiv����class����ֵ
                        resultDiv.innerHTML = "<img src='images/success.png' width='100%' height='100%'>";//Ϊdiv����ͼƬ
                        document.body.appendChild(resultDiv);//��body�����divԪ��
                        setTimeout("document.body.removeChild(resultDiv)",3000);//��3�����Ƴ�divԪ��
                        eated = text[3];//�����Ե����Ӹ�ֵ������eated
                        game_ended = 1;//����Ϸ��������ֵ����Ϊ1
                        prompt_pause_time = 0;//����ʾ���е�ʱ�䶨��Ϊ0
                    }else if(text[3] && eated != text[3] && text[3] != 'blank'){   //������µ����ӱ���
                        eated = text[3];//�����Ե����Ӹ�ֵ������eated
                    }
                }
            }
        }
        function send_message(){             //���巢��������Ϣ�ĺ���
            var message = document.getElementById('message').value;//��ȡ���������Ϣ
            if(message != ''){             //���������Ϣ��Ϊ��
                var message = encodeURI(encodeURI(message));//��������Ϣ���б���
                send_request('send_message.php?roomid=<?php echo $_GET['id'];?>&message='+message+'&site='+site+'&random='+Math.random());//��������Ϣ�洢�����ݱ���
                document.getElementById('message').value = '';                   //��Ϣ�����
                open_prompt('��Ϣ���ͳɹ���', '40%', '2%');                     //������Ϣ��
            }
        }
    </script>
</head>
<body>
<table align="center" style="padding-top:5%;">
    <tr>
        <td width="210" rowspan="3" valign="top">
            <table width="191" height="100%" border="0" cellpadding="0" cellspacing="0">
                <tr valign="top">
                    <script>document.write("<td height=240 valign='bottom' nowrap background='images/"+(site=='host'?'left1':'left2')+".png'>")</script>
                        <table width="191" height="60" border="0">
                            <tr>
                                <th width="40" height="30" align="right" valign="middle"><div id="top_box_flag" width="100%"></div></th>
                                <th width="130" height="30" align="left" valign="middle"><div id="top_box" width="100%"></div></th>
                                <th width="22" height="30" align="left" valign="middle"></th>
                            </tr>
                            <tr>
                                <td height="30" align="left" valign="middle"></td>
                                <td height="30" align="left" valign="top"><div id="top_box_tongji" width="100%"></div></td>
                                <td height="30" align="left" valign="middle"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="191" height="126" align="center">
                        <a href="javascript:copy_url()"><img src="images/left3.png" style="margin-top:6px;"></a>
                        <script>document.write("<a href=exit.php?roomid=<?php echo $_GET['id'];?>&site="+site+"><img src='images/btn_exit.png' width=90 height=39 style='margin-top:8px;'></a>");</script>
                        <script>if(site == "host") document.write("<a href=end.php?roomid=<?php echo $_GET['id'];?>><img src='images/btn_end.png' width=90 height=39 border=0></a>");</script><br>
                    </td>
                </tr>
                <tr valign="bottom">
                    <script>document.write("<td height=240 valign='bottom' nowrap background='images/"+(site=='host'?'left2':'left1')+".png'>")</script>
                        <table width="191" height="60" border="0">
                            <tr><th width="40" height="30" align="right"><div id=bottom_box_flag width=100%></div></th>
                                <th width="130" align="left"><div id=bottom_box width=100%></div></th>
                                <th width="22" align="left"></th>
                            </tr>
                            <tr><td height="30" align="left"></td>
                                <td height="30" align="left" valign="top"><div id=bottom_box_tongji width=100%></div></td>
                                <td height="30" align="left"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td width="3" rowspan="3">
            <!--��ʾ����-->
            <div id="pla"></div>
        </td>
        <td width="240" align="right" valign=top>
            <table style="position:relative;">
                <tr>
                    <td><img src="images/sign.png" width="220" height="63"></td>
                </tr>
                <tr>
                    <td><img src="images/roomcode.png" width="220" height="70"><div class="roomcode"><?php echo $name;?></div></td>
                </tr>
                <tr>
                    <td width="220" height="260"><div id="item" style="position:absolute; left:0px; top:0px; z-index:1; visibility: hidden;"></div></td>
                </tr>
                <tr>
                    <td width="220" height="201" valign=bottom>
                        <table class="message" cellspacing="0" cellpadding="0">
                            <tr align="left">
                                <td height="45" colspan="3" scope="col" valign=middle>&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="15"></td>
                                <td><div id="message_pla" class="message_chat"></div></td>
                                <td width="15"></td>
                            </tr>
                            <tr>
                                <td height="45" colspan="3" valign="middle" class="message_td">
                                    <input type="text" id="message" name="message" size="18" onBlur="this.focus();" onKeyPress="if(event.keyCode==13) {document.getElementById('button').click();}" />
                                    <input name="button" id="button" type="button" class="message_btn" onClick="send_message()" value="����" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<script>
    var message_sum = 5;                               //ÿ����ʾ5����Ϣ
    var message_arr = new Array();//���������
    function show_message(message){                      //��������¼��Ϣ
        var div = document.getElementById("message_pla");//��ȡָ����divԪ��
        if(message_arr.length < message_sum){     //��������¼������С��5������ô���ȫ����������Ϣ
            div.innerHTML += message;
            message_arr[message_arr.length] = message;
            div.scrollTop = div.scrollHeight;     //������ʼ�ձ����ڵײ�
        }else{                                     //��������¼��������5��
            for(var i = 1;i < message_sum;i ++){            //��ȡ�����¼�������0��4���±꣬
                message_arr[i - 1] = message_arr[i];
            }
            message_arr[message_sum - 1] = message;       //��������Ϣ�洢�������У���ȡ5�������¼
            div.innerHTML = "";    //�����¼����Ϊ��
            for(var i = 0;i < message_sum;i ++){              //Ӧ��forѭ�������������е�5�������¼
                div.innerHTML += message_arr[i];
            }
            div.scrollTop = div.scrollHeight;//������ʼ�ձ����ڵײ�
        }
    }
    function get_info() {               //����get_info()����
        if(guest && message_guest && prev_message_guest != message_guest){  //����������������Ϣ�б仯
            show_message(guest + "��" + message_guest+"<br />");//����������������Ϣ
            prev_message_guest = message_guest;//����ǰ������Ϣ����Ϊ��һ��������Ϣ
        }
        if(host && message_host && prev_message_host != message_host){ //����������������Ϣ�б仯
            show_message(host + "��" + message_host+"<br />");//����������������Ϣ
            prev_message_host = message_host;//����ǰ������Ϣ����Ϊ��һ��������Ϣ
        }
        if (site == "guest") {                //���ִ�е�ǰ�������Ǻ������
            document.getElementById('top_box').innerHTML = "<font class='style4'>" + host + "</font>";//����ָ��Ԫ���е�����
            document.getElementById('bottom_box').innerHTML = guest;//����ָ��Ԫ���е�����
            document.getElementById('top_box_tongji').innerHTML = "<font class='style4'>��ʤ��" + host_win + " ��</font>";//����ָ��Ԫ���е�����
            document.getElementById('bottom_box_tongji').innerHTML = "��ʤ��" + guest_win + " ��";//����ָ��Ԫ���е�����
            if (flag == "guest") {             //�����ǰҪ������Ǻ������
                //��������������ͼ��
                document.getElementById('bottom_box_flag').innerHTML = "<img src='./images/move.gif' width='27' height='16'>";
                document.getElementById('top_box_flag').innerHTML = "";//��Ԫ���е����ݶ���Ϊ��
            }
            else {
                //��������������ͼ��
                document.getElementById('top_box_flag').innerHTML = "<img src='./images/move.gif' width='27' height='16'>";
                document.getElementById('bottom_box_flag').innerHTML = "";//��Ԫ���е����ݶ���Ϊ��
            }
        } else if (site == "host") {               //���ִ�е�ǰ�������Ǻ������
            document.getElementById('bottom_box').innerHTML = "<font class='style4'>" + host + "</font>";//����ָ��Ԫ���е�����
            document.getElementById('top_box').innerHTML = guest;//����ָ��Ԫ���е�����
            document.getElementById('bottom_box_tongji').innerHTML = "<font class='style4'>��ʤ��" + host_win + " ��</font>";//����ָ��Ԫ���е�����
            document.getElementById('top_box_tongji').innerHTML = "��ʤ��" + guest_win + " ��";//����ָ��Ԫ���е�����
            if (flag == "host") {              //�����ǰҪ������Ǻ������
                //��������������ͼ��
                document.getElementById('bottom_box_flag').innerHTML = "<img src='./images/move.gif' width='27' height='16'>";
                document.getElementById('top_box_flag').innerHTML = "";//��Ԫ���е����ݶ���Ϊ��
            }
            else {
                //��������������ͼ��
                document.getElementById('top_box_flag').innerHTML = "<img src='./images/move.gif' width='27' height='16'>";
                document.getElementById('bottom_box_flag').innerHTML = "";//��Ԫ���е����ݶ���Ϊ��
            }
        }
        if(chess_flash != ""){//�����˸���ӱ�����ֵ��Ϊ��
            if(flash_status == 0){//�����˸״̬����ֵΪ0
                document.getElementById("chess_"+chess_flash).style.visibility = "hidden";//������������Ϊ����
                flash_status = 1;//����˸״̬����ֵ����Ϊ1
            }else{
                document.getElementById("chess_"+chess_flash).style.visibility = "visible";//������������Ϊ�ɼ�
                flash_status = 0;//����˸״̬����ֵ����Ϊ0
            }
        }
        if(moved){    //����������ƶ�
            var moved_split = moved.split(",");//��movedֵ�Զ���Ϊ�ָ���ָ�Ϊ����
            document.getElementById("chess_"+moved_split[0]).className = "moved";  //Ϊ�����е�һ��Ԫ��ֵ�����ʽ
            document.getElementById("chess_"+moved_split[1]).className = "moved";  //Ϊ�����еڶ���Ԫ��ֵ�����ʽ
        }
        if(allow_load == 1){
            pause_time = 0;             //��ʼ������
            send_request('get_info.php?roomid=<?php echo $_GET['id'];?>&site='+site+'&random='+Math.random());//��ȡ������Ϣ
            //�Ƴ����ӵĳ����ӿ�ʼ���<a>
            document.getElementById("pla").innerHTML = document.getElementById("pla").innerHTML.replace(/<a(.*?)>/ig, "");
            //�Ƴ����ӵĳ����ӽ������</a>
            document.getElementById("pla").innerHTML = document.getElementById("pla").innerHTML.replace(/<\/a>/ig, "");
        }
        if(pause_time == 3 || host == "" || guest == ""){
            pause_time = 0;//Ϊ������ֵ
            send_request('get_info.php?roomid=<?php echo $_GET['id'];?>&site='+site+'&random='+Math.random());       //��ȡ������Ϣ
        }
        pause_time ++;          //��ʱ���Լ�1����
        if(prompt_count > 0){//�������ֵ����0
            if(prompt_count == 3){//�������ֵ����3
                prompt_count = 0;//������ֵ���¶���Ϊ0
                close_prompt();//�ر���ʾ��
            }else
                prompt_count ++;//������ִֵ�м�1����
        }
        if(game_ended == 1)//�����Ϸ��������ֵΪ1
            game_ended ++;//������ִ�м�1����
        else if(game_ended == 2){//�����Ϸ��������ֵΪ2
            if(site == "host"){//���ִ�е�ǰ�������Ǻ������
                if(t3 == "100")//������塰˧������
                    guest_win ++;        //���巽Ӯһ���Σ������ݱ��м�1
                else
                    host_win ++;         //���巽Ӯһ���Σ������ݱ��м�1
                send_request("restart.php?roomid=<?php echo $_GET['id'];?>&guest_win="+guest_win+"&host_win="+host_win+'&random='+Math.random());     //��¼��ǰ����ʤ�������¿���
                game_ended = 0;//����Ϸ��������ֵ����Ϊ0
            }
        }
    }
    //Ϊ�������ӽ��г�ʼ����
    send_request('get_info.php?roomid=<?php echo $_GET['id'];?>&site='+site+'&random='+Math.random());
    get_info();//ִ�к���
    setInterval("get_info()", 1000);//ÿ��һ��ִ��һ�κ���
</script>
</body>