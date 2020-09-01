<?php
namespace Admin\Controller;
use Think\Controller;
class UploadController extends BaseController {

    public function index(){
		header('Content-Type:text/html;charset=utf-8');
		$fileType = I('get.fileType');
		$this->assign('fileType',$fileType);
		$this->display('uploads/uploads_pic');
		exit;
    }
	
    public function up() {
        if (!empty($_FILES)) {
			$fileType = I('post.fileType');
            $this->_uploadAll($fileType);
        }
    }
	public function upOne() {
        if (!empty($_FILES)) {
			//$fileType = I('get.fileType');
			$fileType = I('fileType');
            $this->_uploadOne($fileType);
        }
    }
	
	public function uphtml5() {
        if (!empty($_FILES)) {
			$fileType = I('get.fileType');
			$this->_uploadOne($fileType,"html5");
        }
    }
	
    public function _uploadAll($fileType){
		header('Content-Type:text/html;charset=utf-8');
		$configArr = C('UPLOAD_CONFIG');//获取配置信息/Common/Conf/upload_config
		$config=$configArr[$fileType];
		if(!$config) {// 上传错误提示错误信息
			echo "未发现相应配置信息，请检查upload_config!";
			exit;
		}
		$upload = new \Think\Upload($config);// 实例化上传类
		$info = $upload->upload(); // 上传文件
		if(!$info) {// 上传错误提示错误信息
			echo $upload->getError();
			exit;
			//$this->error($upload->getError());
		}else{// 上传成功
			$image = new \Think\Image();// 实例化上传类
			foreach($info as $key=>$file){
				$imgUrl=$file['savepath'].$file['savename'];
				$PathimgUrl=$config['rootPath'].$imgUrl;
				if($config['thumb'] && strpos($info['type'],"image")!==false){// 缩略图
					//$fileinfo=pathinfo($file['savename']);
					//$file['thumbname']=$fileinfo["filename"]."_thumb.".$file['ext'];
					$file['thumbname']="thumb_".$file['savename'];
					$image->open($PathimgUrl)->thumb($config['thumbWidth'], $config['thumbHeight'],$config['thumbResizeType'])->save($config['rootPath'].$file['savepath'].$file['thumbname']);
				}
				if($config['watermark'] && strpos($info['type'],"image")!==false){// 加水印
					$image->open($PathimgUrl)->water($config['watermarkPic'],$config['watermarkPos'])->save($PathimgUrl);
				}
				//$image->crop(440, 440)->save("./Upload/".$file['savepath'].'crop.jpg');//裁剪图片
				if($key>0){$imgUrlx.="|";}// 批量分隔符
				$imgUrlx.= ''.$config['rootPath'].','.$config['ToPath'].','.$file['savepath'].','.$file['savename'].'';
				$appEndData.="<img src=\"".__ROOT__."/Upload/".$imgUrl."\" />";//编辑器路径
			}
			if($fileType=="edit"){//判断是否传到编辑器里
				echo "<script>";
				echo "var htmlData=parent.CKEDITOR.instances.content.getData();";
				echo "var appEndData='".$appEndData."';";
				echo "var theData=htmlData+appEndData;";
				echo "parent.CKEDITOR.instances.content.setData(theData);";
				echo "</script>";
			}else{
				echo '<script>';
				echo 'var imgurlX=\''.$imgUrlx.'\';';
				echo 'var Pvalue=parent.document.getElementById("'.$fileType.'_path").value;';
				echo 'if(Pvalue){imgurlX+="|"+Pvalue;}';
				echo 'parent.document.getElementById("'.$fileType.'_path").value=imgurlX;';
				echo '</script>';
				echo '上传成功，<a href="javascript:history.back();">返回</a>';
			}
			exit;
			//$this->success('上传成功！');
		}
    }
	
	public function _uploadOne($fileType,$type="one"){ // 单个上传
		header('Content-Type:text/html;charset=utf-8');
		$configArr = C('UPLOAD_CONFIG');//获取配置信息/Common/Conf/upload_config
		$config=$configArr[$fileType];
		if(!$config) {// 上传错误提示错误信息
			echo "未发现相应配置信息，请检查upload_config!";
			exit;
		}
		$upload = new \Think\Upload($config);// 实例化上传类
		$info = $upload->uploadOne($_FILES['file']);// 上传文件
		if(!$info) {// 上传错误提示错误信息
			echo "{error:'err', msg:'".$upload->getError()."',fileType:'".$fileType."'}";
			exit;
			//$this->error($upload->getError());
		}else{// 上传成功
			$image = new \Think\Image();// 实例化上传类
			$imgUrl=$info['savepath'].$info['savename'];
			$PathimgUrl=$config['rootPath'].$imgUrl;
			if($config['thumb'] && strpos($info['type'],"image")!==false){// 缩略图
				//$infoinfo=pathinfo($info['savename']);
				//$info['thumbname']=$fileinfo["filename"]."_thumb.".$file['ext'];
				$file['thumbname']="thumb_".$info['savename'];
				$image->open($PathimgUrl)->thumb($config['thumbWidth'], $config['thumbHeight'],$config['thumbResizeType'])->save($config['rootPath'].$info['savepath'].$file['thumbname']);
			}
			if($config['watermark'] && strpos($info['type'],"image")!==false){// 加水印
				$image->open($PathimgUrl)->water($config['watermarkPic'],$config['watermarkPos'])->save($PathimgUrl);
			}
			$imgUrlx= ''.$config['rootPath'].','.$config['ToPath'].','.$info['savepath'].','.$info['savename'].'';
			$appEndData="<img src=\"".__ROOT__."/Upload/".$imgUrl."\" />";//编辑器路径

			if($fileType=="pic" && $type=="html5"){ //详情页批量上传
				echo '<script>';
				echo 'var newElement = document.createElement(\'input\');';
				echo 'newElement.setAttribute(\'type\', \'hidden\');';
				echo 'newElement.setAttribute(\'name\', \''.$fileType.'_path_new[]\');';
				echo 'newElement.setAttribute(\'value\', \''.$imgUrlx.'\');';
				echo 'parent.main.document.getElementById(\''.$fileType.'_upload\').appendChild(newElement);';//insertBefore
				echo '</script>';
				exit;
			}elseif($fileType=="listAll" && $type=="html5"){ //类别批量上传
				$dbname=I("get.dbname");
				$classid=I("get.classid",0,"int");
				$rid=I("get.rid",0,"int");
				$UrlInfo=pathinfo(urlencode($info['name']));
				$UrlInfo['basename']=urldecode($UrlInfo['basename']);
				$UrlInfo['filename']=urldecode($UrlInfo['filename']);
				$m = M($dbname);
				$temp = $m->where('rid='.$rid.' and find_in_set('.$classid.',class_id) and title=\''.$UrlInfo['filename'].'\'')->find();
				$data["id"]=$temp['id'];
				if($UrlInfo['extension']=='txt'){
					$txturl=$config['rootPath'].iconv('utf-8','gb2312',$imgUrl);
					$content=file_get_contents($txturl);
					$encode = mb_detect_encoding($content, array('ASCII','GB2312','GBK','UTF-8')); 
					if ($encode != 'UTF-8'){
						$content=iconv('gb2312','utf-8',$content);
					}
					$data["content"]=htmlspecialchars($content);//nl2br
				}else{
					$data["pic_path"]=$imgUrl;
				}
				if($data["id"]){
					$m->save($data);
				}else{
					$data['rid'] = $rid;
					//$data['class_id'] = $classid;
					$data['class_id'] = D($dbname.'_class')->getAllParentIds(M($dbname.'_class')->where(array('status'=>1,'language'=>cookie('AUTH_USER_LANG')))->select(),$classid);
					$data["title"]=$UrlInfo['filename'];
					$data["list_order"]=10;
					$data['addtime'] = $temp['addtime']?$temp['addtime']:time();
					$data["language"]= cookie('AUTH_USER_LANG');
					$m->add($data);
				}
				//print_r($data);
				exit;
			}
			if($fileType=="edit"){//判断是否传到编辑器里
				echo "<script>";
				echo "var htmlData=parent.CKEDITOR.instances.content.getData();";
				echo "var appEndData='".$appEndData."';";
				echo "var theData=htmlData+appEndData;";
				echo "parent.CKEDITOR.instances.content.setData(theData);";
				echo "</script>";
			}else{ //编辑页上传
				echo "{error:'ok', msg:'上传成功',fileType:'".$fileType."',imgname:'".$info['name']."',imgurl:'".$imgUrlx."',temurl:'".$imgUrl."',savename:'".$info['savename']."'}";
				exit;
				//echo '<script>parent.document.getElementById("'.$fileType.'_path").value="'.$imgUrlx.'";< /script>';
				echo '<script>';
				echo 'var newElement = document.createElement(\'input\');';
				echo 'newElement.setAttribute(\'type\', \'hidden\');';
				echo 'newElement.setAttribute(\'name\', \''.$fileType.'_path_new\');';
				echo 'newElement.setAttribute(\'value\', \''.$imgUrlx.'\');';
				echo 'parent.document.getElementById(\''.$fileType.'_upload\').appendChild(newElement);';//insertBefore
				echo '</script>';
				echo '上传成功，<a href="javascript:history.back();">返回</a>';
			}
			exit;
			//$this->success('上传成功！');
		}
		exit;
	}
	


}