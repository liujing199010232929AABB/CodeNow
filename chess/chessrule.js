/****************************************���ӵ��㷨************************************/
/****************chess�������ӣ�from�������ӵ�ԭ���꣬to�������ӵ�Ŀ������**************/
function check(chess, from, to){               //����ĺ������������������д����������Ƹ����ӵ��߷�
    /**************************************���ƺ��塰�䡱���߷�**********************************/
    if(chess == "011" || chess == "012" || chess == "013" || chess == "014" || chess == "015"){
        if(from >= 46 && (from - to == 1 || to - from == 1))      //���塰�䡱���Ӻ���Ժ�����
            return 1;                          //����ֵΪ1
        if(to - from == 9)                   //���Ŀ�������ȥԭʼ�������9��˵����ֱ�·���һ��
            return 1;                       //����ֵΪ1
    }
    /*************************************���塰�䡱���㷨***********************************/
    if(chess == "111" || chess == "112" || chess == "113" || chess == "114" || chess == "115"){
        if(from <= 45 && (from - to == 1 || to - from == 1))      //���塰�䡱���Ӻ���Ժ�����
            return 1;            //����ֵΪ1
        if(from - to == 9)       //���ԭʼ�����ȥĿ���������9��˵����ֱ�Ϸ���һ��
            return 1;             //����ֵΪ1
    }
    /*****************************************���ڡ����㷨*********************************/
    if(chess == "010" || chess == "009" || chess == "110" || chess == "109") {    //�����ǰ���ƶ�����Ϊ���ڡ�
        if (to - from > 0 && (to - from) % 9 == 0) {                     //���ơ��ڡ�������
            var count = 0;                //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for (var i = from + 9; i < to; i += 9) {      //ԭʼ�����ֵÿ��ѭ����9
                if (document.getElementById("chess_value_" + i).value != "blank")  //����ô����ӵ�ֵ������blank
                    count++;                        //�����Զ���1
            }
            if (count == 0 && document.getElementById("chess_value_" + to).value == "blank") //������ڡ����н�������û������
                return 1; //����ֵΪ1
            if (count == 1 && document.getElementById("chess_value_" + to).value != "blank") //������ڡ����н���������һ������
                return 1; //����ֵΪ1
        }
        if(from - to > 0 && (from - to) % 9 == 0){           //���ơ��ڡ�������
            var count = 0;       //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = to + 9;i < from;i += 9){   //Ŀ�������ֵÿ��ѭ����9
                if(document.getElementById("chess_value_"+i).value != "blank") //����ô����ӵ�ֵ������blank
                    count ++;        //�����Զ���1
            }
            if(count == 0 && document.getElementById("chess_value_"+to).value == "blank")//������ڡ����н�������û������
                return 1;  //����ֵΪ1
            if(count == 1 && document.getElementById("chess_value_"+to).value != "blank")//������ڡ����н���������һ������
                return 1;  //����ֵΪ1
        }
        if(to - from > 0 && to - from < 9){             //���ơ��ڡ�������
            var count = 0;    //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = from + 1;i < to;i ++){ //ԭʼ�����ֵÿ��ѭ����1
                if(document.getElementById("chess_value_"+i).value != "blank")    //����ô����ӵ�ֵ������blank
                    count ++;              //�����Զ���1
            }
            if(count == 0 && document.getElementById("chess_value_"+to).value == "blank") //������ڡ����н�������û������
                return 1;  //����ֵΪ1
            if(count == 1 && document.getElementById("chess_value_"+to).value != "blank") //������ڡ����н���������һ������
                return 1;  //����ֵΪ1
        }
        if(from - to > 0 && from - to < 9){       //���ơ��ڡ�������
            var count = 0;    //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = to + 1;i < from;i ++){ //Ŀ�������ֵÿ��ѭ����1
                if(document.getElementById("chess_value_"+i).value != "blank")    //����ô����ӵ�ֵ������blank
                    count ++;           //�����Զ���1
            }
            if(count == 0 && document.getElementById("chess_value_"+to).value == "blank")//������ڡ����н�������û������
                return 1;  //����ֵΪ1
            if(count == 1 && document.getElementById("chess_value_"+to).value != "blank")//������ڡ����н���������һ������
                return 1;  //����ֵΪ1
        }
    }
    /****************************************���������㷨************************************/
    if(chess == "008" || chess == "007" || chess == "108" || chess == "107") {    //�����ǰ���ƶ�����Ϊ������
        if (to - from > 0 && (to - from) % 9 == 0) {                     //���ơ�����������
            var count = 0;    //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for (var i = from + 9; i < to; i += 9) {      //ԭʼ�����ֵÿ��ѭ����9
                if (document.getElementById("chess_value_" + i).value != "blank")     //����ô����ӵ�ֵ������blank
                    count++;               //�����Զ���1
            }
            if (count == 0)       //������������н�������û������
                return 1;     //����ֵΪ1
        }
        if(from - to > 0 && (from - to) % 9 == 0){        //���ơ�����������
            var count = 0;    //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = to + 9;i < from;i += 9){      //Ŀ�������ֵÿ��ѭ����9
                if(document.getElementById("chess_value_"+i).value != "blank")  //����ô����ӵ�ֵ������blank
                    count ++;              //�����Զ���1
            }
            if(count == 0)    //������������н�������û������
                return 1;     //����ֵΪ1
        }
        if(to - from > 0 && to - from < 9){       //���ơ�����������
            var count = 0;    //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = from + 1;i < to;i ++){ //ԭʼ�����ֵÿ��ѭ����1
                if(document.getElementById("chess_value_"+i).value != "blank")    //����ô����ӵ�ֵ������blank
                    count ++;                 //�����Զ���1
            }
            if(count == 0)    //������������н�������û������
                return 1;     //����ֵΪ1
        }
        if(from - to > 0 && from - to < 9){       //���ơ�����������
            var count = 0;    //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = to + 1;i < from;i ++){    //Ŀ�������ֵÿ��ѭ����1
                if(document.getElementById("chess_value_"+i).value != "blank")    //����ô����ӵ�ֵ������blank
                    count ++;              //�����Զ���1
            }
            if(count == 0)    //������������н�������û������
                return 1;     //����ֵΪ1
        }
    }
    /*****************************************�������㷨***********************************/
    if(chess == "006" || chess == "005" || chess == "106" || chess == "105"){     //�����ǰ���ƶ�����Ϊ����
        if(to - from == 19 || to - from == 17){            //���ơ��������ߡ��ա���
            if(document.getElementById("chess_value_"+(from + 9)).value == "blank")//���ԭʼ������ֱ�·��ǿ���
                return 1;     //����ֵΪ1
        }
        if(from - to == 19|| from - to == 17){       //���ơ��������ߡ��ա���
            if(document.getElementById("chess_value_"+(from - 9)).value == "blank")//���ԭʼ������ֱ�Ϸ��ǿ���
                return 1;     //����ֵΪ1
        }
        if(to - from == 7 || from - to == 11){    //����������ߡ��ա���
            if(document.getElementById("chess_value_"+(from - 1)).value == "blank")    //���ԭʼ���������ǿ���
                return 1;     //����ֵΪ1
        }
        if(from - to == 7 || to - from == 11){    //�������Һ��� ���ա���
            if(document.getElementById("chess_value_"+(from + 1)).value == "blank")    //���ԭʼ������Ҳ��ǿ���
                return 1;     //����ֵΪ1
        }
    }
    /***************************************���󡱵��㷨**************************************/
    if(((chess == "004" || chess == "003") && to <= 45) || ((chess == "104" || chess == "103") && to >= 46)){
//�����ǰ���ƶ�����Ϊ����
        if(to - from == 16){                                     //���ơ�����������
            if(document.getElementById("chess_value_"+(from + 8)).value == "blank")       //���ԭʼ������8�ǿ���
                return 1;     //����ֵΪ1
        }
        if(from - to == 16){                                    //���ơ�����������
            if(document.getElementById("chess_value_"+(from - 8)).value == "blank")    //���ԭʼ������8�ǿ���
                return 1;     //����ֵΪ1
        }
        if(to - from ==20){           //���ơ�����������
            if(document.getElementById("chess_value_"+(from + 10)).value == "blank")   //���ԭʼ������10�ǿ���
                return 1;     //����ֵΪ1
        }
        if(from - to == 20){                                 //���ơ�����������
            if(document.getElementById("chess_value_"+(from - 10)).value == "blank")   //���ԭʼ������10�ǿ���
                return 1;     //����ֵΪ1
        }
    }
    /*************************************���塰ʿ�����㷨***********************************/
    if(chess == "002" || chess == "001"){     //�����ǰ���ƶ�����Ϊ���塰ʿ��
        if((to == 6 || to == 4 || to == 14 || to == 22 || to == 24) && (to - from == 8 || from - to == 8 || to - from == 10 || from - to == 10)) //���ƺ��塰ʿ�����߷�(���߷�Χ��4��6��14��22��24��)�����ܳ���8����10�������
            return 1;     //����ֵΪ1
    }
    /*************************************���塰ʿ�����㷨***********************************/
    if(chess == "102" || chess == "101"){        //�����ǰ���ƶ�����Ϊ���塰ʿ��
        if((to == 85 || to == 87 || to == 77 || to == 69 || to == 67) && (to - from == 8 || from - to == 8 || to - from == 10 || from - to == 10)) //���ƺ��塰ʿ�����߷�(���߷�Χ��67��69��77��85��87��)�����ܳ���8����10�������
            return 1;     //����ֵΪ1
    }
    /**************************************���塰�������㷨**********************************/
    if(chess == "000"){          //�����ǰ���ƶ�����Ϊ���塰����
        if(((to >= 4 && to <= 6) || (to >= 13 && to <= 15) || (to >= 22 && to <= 24)) && (to - from == 1 || from - to == 1 || to - from == 9 || from - to == 9))   //���ƺ��塰�������߷�
            return 1;     //����ֵΪ1
        if(to > from && (to - from) % 9 == 0 && document.getElementById("chess_value_"+to).value == "100"){               //������塰����ԭʼ���������塰˧����һ��ֱ����
            var count = 0; //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = from + 9;i < to;i += 9){      //���塰����ԭʼ�����ÿ��ѭ����9
                if(document.getElementById("chess_value_"+i).value != "blank")//����ô����ӵ�ֵ������blank
                    count ++;        //�����Զ���1
            }
            if(count == 0)          //���count����ֵΪ0����˵��ԭʼ�����Ŀ������֮��û������
                return 1;  //����ֵΪ1�������塰�������ԳԵ����塰˧��
        }
    }
    /**************************************���塰˧�����㷨**********************************/
    if(chess == "100"){       //�����ǰ���ƶ�����Ϊ���塰˧��
        if(((to <= 87 && to >= 85) || (to <= 78 && to >=76) || (to <= 69 && to >= 67)) && (to - from == 1 || from - to == 1 || to - from == 9 || from - to == 9)) //���ƺ��塰˧�����߷�
            return 1;  //����ֵΪ1
        if(from > to && (from - to) % 9 == 0 && document.getElementById("chess_value_"+to).value == "000"){ //������塰˧��ԭʼ���������塰������һ��ֱ����
            var count = 0; //����������ڴ洢ԭʼ�����Ŀ������֮�����ӵ�����
            for(var i = to + 9;i < from;i += 9){    //���塰˧��Ŀ�������ÿ��ѭ����9
                if(document.getElementById("chess_value_"+i).value != "blank")//����ô����ӵ�ֵ������blank
                    count ++;     //�����Զ���1
            }
            if(count == 0)             //���count����ֵΪ0����˵��ԭʼ�����Ŀ������֮��û������
                return 1;  //����ֵΪ1�������塰˧�����ԳԵ����塰����
        }
    }
    return 0;
}
