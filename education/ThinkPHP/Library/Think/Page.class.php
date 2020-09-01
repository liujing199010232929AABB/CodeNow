<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Think;

class Page{
    public $firstRow; // 起始行数
    public $listRows; // 列表每页显示行数
    public $parameter; // 分页跳转时要带的参数
    public $totalRows; // 总行数
    public $totalPages; // 分页总页面数
    public $rollPage   = 5;// 分页栏每页显示的按钮数
	public $lastSuffix = false; // 最后一页是否显示总页数
	public $isOneHide = true; // 分页小于等于1页隐藏分页元素。true隐藏，false显示

    private $p       = 'p'; //分页参数名
    private $url     = ''; //当前链接URL
    private $nowPage = 1;  //当前页码

	// 分页显示定制
    private $config  = array(
        'header' => '<span class="rows">共 %TOTAL_ROW% 条记录</span>',
        'prev'   => '<<',
        'next'   => '>>',
        'first'  => '1...',
        'last'   => '...%TOTAL_PAGE%',
        'rollPage'   => 0,
        'theme'  => '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%',
    );

    /**
     * 架构函数
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     */
    public function __construct($totalRows, $listRows=20, $parameter = array()) {
        C('VAR_PAGE') && $this->p = C('VAR_PAGE'); //设置分页参数名称
        /* 基础设置 */
        $this->totalRows  = $totalRows; //设置总记录数
        $this->listRows   = $listRows;  //设置每页显示行数
        $this->parameter  = empty($parameter) ? $_GET : $parameter;
        $this->nowPage    = empty($_GET[$this->p]) ? 1 : intval($_GET[$this->p]);
        $this->nowPage    = $this->nowPage>0 ? $this->nowPage : 1;
        $this->firstRow   = $this->listRows * ($this->nowPage - 1);
    }

    /**
     * 定制分页链接设置
     * @param string $name  设置名称
     * @param string $value 设置值
     */
    public function setConfig($name,$value) {
	

        if(isset($this->config[$name])) {
            $this->config[$name] = $value;
        }
    }



    /**
     * 生成链接URL
     * @param  integer $page 页码
     * @return string
     */
    private function url($page){
        return str_replace(urlencode('[PAGE]'), $page, $this->url);
    }

    /**
     * 组装分页链接
     * @return string
     */
   public function show() {
        if(0 == $this->totalRows) return '';
		$this->config['rollPage'] && $this->rollPage = $this->config['rollPage'];
        /* 生成URL */
        $this->parameter[$this->p] = '[PAGE]';
        $this->url = U(ACTION_NAME, $this->parameter);
        /* 计算分页信息 */
        $this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
        if(!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
		if($this->totalPages<=1 && $this->isOneHide) return '';

        /* 计算分页零时变量 */
        $now_cool_page      = $this->rollPage/2;
		$now_cool_page_ceil = ceil($now_cool_page);
		$this->lastSuffix && $this->config['last'] = $this->totalPages;

        //上一页
        $up_row  = $this->nowPage - 1;
        $up_page = $up_row > 0 ? '<li class="down"><a href="' . $this->url($up_row) . '" title="' . $this->config['prev'] . '"><span>' . $this->config['prev'] . '</span></a></li>' : '<li class="no_link"><span>' . $this->config['prev'] . '</span></li>';

        //下一页
        $down_row  = $this->nowPage + 1;
        $down_page = ($down_row <= $this->totalPages) ? '<li class="down"><a href="' . $this->url($down_row) . '" title="' . $this->config['next'] . '"><span>' . $this->config['next'] . '</span></a></li>' : '<li class="no_link"><span>' . $this->config['next'] . '</span></li>';

        //第一页
        $the_first = '';
        if($this->totalPages > $this->rollPage && ($this->nowPage - $now_cool_page) >= 1){
            $the_first = '<li class="down"><a href="' . $this->url(1) . '" title="' . $this->config['first'] . '"><span>' . $this->config['first'] . '</span></a></li>';
        }
		//else{$the_first = '<li class="no_link"><span>' . $this->config['first'] . '</span></li>';}

        //最后一页
        $the_end = '';
        if($this->totalPages > $this->rollPage && ($this->nowPage + $now_cool_page) < $this->totalPages){
            $the_end = '<li class="down"><a href="' . $this->url($this->totalPages) . '"><span>' . $this->config['last'] . '</span></a></li>';
        }
		//else{$the_end = '<li class="no_link"><span>' . $this->config['last'] . '</span></li>';}

        //数字连接
        $link_page = "";
        for($i = 1; $i <= $this->rollPage; $i++){
			if(($this->nowPage - $now_cool_page) <= 0 ){
				$page = $i;
			}elseif(($this->nowPage + $now_cool_page - 1) >= $this->totalPages){
				$page = $this->totalPages - $this->rollPage + $i;
			}else{
				$page = $this->nowPage - $now_cool_page_ceil + $i;
			}
            if($page > 0 && $page != $this->nowPage){

                if($page <= $this->totalPages){
                    $link_page .= '<li><a href="' . $this->url($page) . '" title="' . $page . '">' . $page . '</a></li>';
                }else{
                    break;
                }
            }else{
                if($page > 0 && $this->totalPages != 1){
                    $link_page .= '<li class="linkOn"><span class="current" title="' . $page . '">' . $page . '</span></li>';
                }
            }
        }

        //替换分页内容
        $page_str = str_replace(
            array('%HEADER%', '%NOW_PAGE%', '%UP_PAGE%', '%DOWN_PAGE%', '%FIRST%', '%LINK_PAGE%', '%END%', '%TOTAL_ROW%', '%TOTAL_PAGE%'),
            array($this->config['header'], $this->nowPage, $up_page, $down_page, $the_first, $link_page, $the_end, $this->totalRows, $this->totalPages),
            $this->config['theme']);
        return "{$page_str}";
    }
	
    /**
     * 后台分页链接
     * @return string
     */
	public function showAdmin()	{
	
		$define_para = C('TMPL_PARSE_STRING');
        if(0 == $this->totalRows) return '';
		$this->config['rollPage'] && $this->rollPage = $this->config['rollPage'];
        /* 生成URL */
        $this->parameter[$this->p] = '[PAGE]';
        $this->url = U(ACTION_NAME, $this->parameter);
        /* 计算分页信息 */
        $this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
        if(!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
		if($this->totalPages<=1 && $this->isOneHide) return '';
		$vars = array(
			'lineCount'				=> $this->totalRows,	//总行数
			'pageCount'				=> $this->totalPages,	//总页数
			'lines'					=> $this->listRows,	//每页行数
			'currentPage'			=> $this->nowPage,	//当前页
			'nextPage'				=> $this->nowPage+1,
			'prePage'				=> $this->nowPage-1,
			);
		
		
		$pageList = array();
		for($i=1; $i<=$this->totalPages; $i++){
			// $p 存储页的数组
			if($i == $this->nowPage){
				$pageList[$i] = ' selected="selected"'; // 当前页时下拉菜单默认选中该页
			} else {
				$pageList[$i] = '';
			}
			
		}
		
		
		$str = "\n";
		$str.= '<table border="0" cellspacing="5" cellpadding="1" align="center">'."\n";
		$str.= '<tr>'."\n";
		$str.= '<td>'."\n";
		$str.= '共<span>'.$vars['lineCount'].'</span>行　当前'.$vars['currentPage'].'/'.$vars['pageCount'].'页  '."\n";
		if($vars['currentPage']==1){
			$str.= '<span disabled="1">首页  上一页</span>'."\n";
		}else{
			$str.= '<a href="'.$this->url(0).'" title="首页">首页</a>'."\n";
			$str.= '<img src="'.$define_para['__IMG__'].'/page_up.gif" />'."\n";
			$str.= '<a href="'.$this->url($vars['prePage']).'" title="上一页">上一页</a>'."\n";
		}
		
		if($vars['currentPage']==$vars['pageCount']){
			$str.= '<span>下一页  末页</span>'."\n";
		}else{
			$str.= '<a href="'.$this->url($vars['nextPage']).'" title="下一页">下一页</a>'."\n";
			$str.= '<img src="'.$define_para['__IMG__'].'/page_down.gif" />'."\n";
			$str.= '<a href="'.$this->url($vars['pageCount']).'" title="末页">末页</a>'."\n";
		}
		$str.= '转到&nbsp;&nbsp;'."\n";
		$str.= '<select name="UIPageNoSelect" onChange="goToPage(this)" style="width:50px;">'."\n";
        foreach($pageList as $key => $item){
			$str.= '<option value="'.$this->url($key).'" '.$item.'>'.$key.'</option>'."\n";
		}
		$str.= '</select>'."\n";
		$str.= '</td>'."\n";
		$str.= '</tr>'."\n";
		$str.= '</table>'."\n";
		$str.= '<script language="javascript">'."\n";
		$str.= 'function goToPage(obj) {'."\n";
		$str.= '$str = obj.options[obj.selectedIndex].value ;'."\n";
		$str.= 'window.location = $str;'."\n";
		$str.= '}'."\n";
		$str.= '</script>'."\n";

		return $str;	
	
	
	
	
	
	}
	
	
	
	
}
