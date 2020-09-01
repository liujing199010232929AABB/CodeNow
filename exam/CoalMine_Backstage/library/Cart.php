<?php
/*********************************************
 * @ 说明：购物车类
 *
 * @ 作者：我的中文名叫 刘中华，我的英文名叫 lzh 
 * @ E-mail:jlnu_lzh@126.com
 * @ Tel：15043191896  
 *********************************************/
class Cart
{
    var $idStr;
    var $numStr;
    /**
     * @ 方法说明：
     *   构造方法
     *
     * @ 参数说明：
     *   $idStr：存储商品ID的字符串
     *   $numStr：存储商品数量的字符串
     */
    function Cart ($idStr, $numStr)
    {
        $this->idStr = $idStr;
        $this->numStr = $numStr;
    }
    /**
     * @ 方法说明：
     *   将商品添加到购物车
     *
     * @ 参数说明：
     *   $goodsId：商品ID
     *   $goodsNum：购买数量
     */
    function addCart ($goodsId, $goodsNum)
    {
        $arrayIds = explode('@', $this->idStr);
        $flag = 0;
        for ($i = 0; $i < count($arrayIds); $i ++) {
            if ($arrayIds[$i] == $goodsId) {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            $this->idStr .= $goodsId . '@';
            $this->numStr .= $goodsNum . '@';
        } else {
            echo "<script>alert('该商品已经添加！');</script>";
        }
    }
    /**
     * @ 方法说明：
     *   将商品从购物车移出
     *
     * @ 参数说明：
     *   $goodsId：商品ID
     */
    function removeCart ($goodsId)
    {
        $arrayIds = explode('@', $this->idStr);
        $arrayNums = explode('@', $this->numStr);
        for ($i = 0; $i < count($arrayIds); $i ++) {
            if ($arrayIds[$i] == $goodsId) {
                unset($arrayIds[$i]);
                unset($arrayNums[$i]);
            }
        }
        $this->idStr = implode('@', $arrayIds);
        $this->numStr = implode('@', $arrayNums);
    }
    /**
     * @ 方法说明：
     *   更改购物车中商品数量
     *
     * @ 参数说明：
     *   $goodsId：商品ID
     *   $goodsNum：购买数量
     */
    function changeNum ($goodsId, $goodsNum)
    {
        $arrayIds = explode('@', $this->idStr);
        $arrayNums = explode('@', $this->numStr);
        for ($i = 0; $i < count($arrayIds); $i ++) {
            if ($arrayIds[$i] == $goodsId) {
                $arrayNums[$i] = $goodsNum;
            }
        }
        $this->idStr = implode('@', $arrayIds);
        $this->numStr = implode('@', $arrayNums);
    }
    /**
     * @ 方法说明：
     *   清空购物车
     */
    function setCartNull ()
    {
        $this->idStr = '';
        $this->numStr = '';
    }
    /**
     * @ 方法说明：
     *   获取购物车中商品ID字符串
     */
    function getIdStr ()
    {
        return $this->idStr;
    }
    /**
     * @ 方法说明：
     *   获取购物车中商品数量字符串
     */
    function getNumStr ()
    {
        return $this->numStr;
    }
}


