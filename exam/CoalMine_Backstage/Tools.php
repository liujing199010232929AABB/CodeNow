<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pkh
 * Date: 12-9-11
 * Time: ÏÂÎç1:26
 * To change this template use File | Settings | File Templates.
 */

require_once 'Tree.php';
class Tools{
    protected $categoryArr = array();

    /**
     * get typename recursion
     *
     * @param $pid,$level
     */
    public function recursion ($row,$pid,$spacenum)
    {
        foreach($row as $v){
            if($v['pid'] == $pid){
                if($pid != 0){
                    $spacenum = $spacenum+2;
                    for($i=0;$i<$spacenum;$i++){
                        $v['typename'] = "&nbsp;".$v['typename'];
                    }
                }
                $this->categoryArr[] = $v;
                $this->recursion ($row,$v['id'],$spacenum);
            }
        }
        return $this->categoryArr;
    }

    function getMockExams(){
        global $adminDB;
        global $connID;
        $mockExamArr = array();
        $mockexams = $adminDB->executeSQL("select * from tb_mockexaminations", $connID);
        foreach($mockexams as $mockexam){
            $mockExamArr[$mockexam['id']] = $mockexam['title'];
        }
        return $mockExamArr;
    }

    public function getWorktype($worktypes,$chk=0){
        $arr = array();
        for ($i = 0; $i < count($worktypes); $i ++) {
            $arr[$i] = array(
                'id'      => $worktypes[$i]['id'],
                'parentid'=> $worktypes[$i]['pid'],
                'name'    => $worktypes[$i]['typename'],
                'addtime'    => $worktypes[$i]['addtime'],
            );
        }
        $tree = new Tree();
        $tree->tree($arr);
        $displayType = $tree->get_tree(0,"<option value=\$id \$selected>\$spacer\$name</option>",$chk);
        return $displayType;
    }

    public function getExamType($examtypes,$flag,$pid=0){
        $arr = array();
        for ($i = 0; $i < count($examtypes); $i ++) {
            $arr[$i] = array(
                'id'      => $examtypes[$i]['id'],
                'parentid'=> $examtypes[$i]['pid'],
                'name'    => $examtypes[$i]['chinese'],
                'english'=>$examtypes[$i]['english'],
                'addtime'=>$examtypes[$i]['addtime']
            );
        }
        $tree = new Tree();
        $tree->tree($arr);
        if($flag == 'id'){
            $displayType = $tree->get_tree(0,"<option value='\$id' \$selected>\$spacer\$name</option>",$pid);
        }
        if($flag == "en"){
            $displayType = $tree->get_tree(0,"<option value='\$a[english]' \$selected>\$spacer\$name</option>",$pid);

        }
        return $displayType;
    }

    public static function printlog($v){
        if(is_array($v)){
            print_r($v);
            echo "<br>";
        }else{
            echo $v;
            echo "<br>";
        }
        return;
    }

    function getExamtypeArr(){
        global $adminDB;
        global $connID;
        $examtypeArr = array();
        $examtypes = $adminDB->executeSQL("select * from tb_exam_type", $connID);
        foreach($examtypes as $examtype){
            $examtypeArr[$examtype['english']] = $examtype['chinese'];
        }
        return $examtypeArr;
    }

    function getExamtypeIdArr(){
        global $adminDB;
        global $connID;
        $examtypeArr = array();
        $examtypes = $adminDB->executeSQL("select id,english,chinese from tb_exam_type order by id", $connID);
        foreach($examtypes as $examtype){
            $examtypeArr[] = $examtype;
        }
        return $examtypeArr;
    }

    function getworktypeIdArr(){
        global $adminDB;
        global $connID;
        $worktypeArr = array();
        $worktypes = $adminDB->executeSQL("select id,typename from tb_types_work", $connID);
        foreach($worktypes as $worktype){
            $worktypeArr[] = $worktype;
        }
        return $worktypeArr;
    }

    function convertStr($str){
        $str = iconv("gb2312","utf-8",$str);
        return $str;
    }
    function convertStr1($str){
        $str = iconv("utf-8","gb2312",$str);
        return $str;
    }
}