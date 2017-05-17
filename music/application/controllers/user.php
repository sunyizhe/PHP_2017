<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
		class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
		}
		
			
		public function login(){
			$this->load->view("html/login.php");
		}
		public function do_login(){
			$name=$this->input->post('name');
			$pass=$this->input->post('pass');
			$rs=$this->user_model->do_login($name,$pass);
			if($rs){
				$arr=array(
					'id'=>$rs->uid,
					'name'=>$rs->uname,
					'logged_in' => TRUE,
				);
				$this->session->set_userdata($arr);
				header("Refresh:0;url=index");
				echo"<script>alert('登录成功')</script>";
				
			}else{
				echo"<script>alert('对不起，用户名，密码输入错误!');history.back();</script>";
			}	
			
		}
		
		public function reg(){
			$this->load->view("html/reg.php");
		}
		
		public function check(){
			header("Access-Control-Allow-Origin:*");
			$name=$this->input->post('uemail');
			$rs=$this->user_model->get_check($name);
			if($rs){
				echo "success";
			}
		}	
		
		public function do_reg(){
			$name=$this->input->post('name');
			$zname=$this->input->post('zname');
			$pass=$this->input->post('pass1');
			$rpass=$this->input->post('pass2');
			if($pass==$rpass){
				$rs=$this->user_model->checkname($name);
			if($rs){
				redirect("user/reg");
			}else{
				$rs=$this->user_model->set_insert($zname,$name,$pass);
				if($rs){
					redirect("user/login");
				}	
			}	
			}else{
				redirect("user/reg");
			}
			
		}
		
		
		
		public function index(){
			$rs=$this->user_model->do_singer();
			$arr['singer']=$rs;
			$rs1=$this->user_model->get_album();
			$arr['album']=$rs1;
			$this->load->view("html/index.php",$arr);
		}
		public function unindex(){
			$rs=$this->user_model->do_singer();
			$arr['singer']=$rs;
			$rs1=$this->user_model->get_album();
			$arr['album']=$rs1;
			$this->load->view("html/unindex.php",$arr);
		}
		
		public function lists(){
			$rs=$this->user_model->do_lists();
			$arr['lists']=$rs;
			$this->load->view("html/list.php",$arr);
		}
		public function list1(){
			$rs=$this->user_model->do_list1();
			$arr['lists']=$rs;
			$this->load->view("html/list1.php",$arr);
		}
		
		public function listen(){
			$uid = $this->session->userdata('id');
			$id=$this->input->get('id');
			
			if($id){
				$rs1=$this->user_model->do_listen_hits($id);
			} 
				$r=$this->user_model->get_all_pl($id);
				
				$rs=$this->user_model->do_listen($id);
				$key=$this->user_model->do_listen_aa($rs->aid);
				
				$arr['pl']=$r;
				$arr['listen']=$rs;
				$arr['id']=$id;
				$arr['lis']=$key;
				$this->load->view("html/listen.php",$arr);
		}
		
		public function search(){
			$search=$this->input->post('search');
			if($search){
				$rs=$this->user_model->do_search1($search);
				if($rs){
					$rs1=$this->user_model->do_search_shits($search);
				}
			}else{
				$rs=$this->user_model->do_search();
			}
			$arr['search']=$rs;
			$this->load->view("html/search.php",$arr);
		}
		
		public function collect(){
			$uid = $this->session->userdata('id');//用户id
			$rs = $this->user_model->get_collect($uid);
			$arr['all']=$rs;
			$this->load->view("html/collect.php",$arr);
		}
		public function album(){
			$id=$this->input->get('id');
			$rs=$this->user_model->do_album($id);
			$arr['album']=$rs;
			$this->load->view("html/album.php",$arr);
		}
		
		public function album_detail(){
			$id=$this->input->get('id');
			$rs=$this->user_model->do_album_d($id);
			$rs1=$this->user_model->do_album_m($id);
			$arr['albumd']=$rs;
			$arr['albumm']=$rs1;
			$this->load->view("html/album_detail.php",$arr);
		}
		
		
		public function singer(){
			$rs=$this->user_model->do_singer();
			$arr['singer']=$rs;
			$this->load->view("html/singer.php",$arr);
		}
		public function do_collect(){
			$uid = $this->session->userdata('id');//用户id
			$mid=$this->input->get('id');
			$result = $this->user_model->check_collect($uid,$mid);
			 
			if(!$result){
				$rs = $this->user_model->collected($uid,$mid);
				echo"<script>alert('收藏成功');history.back();</script>";
				//echo "success";			
				}else{
				
				echo"<script>alert('已收藏，请勿重复添加');history.back();</script>";
				//echo "fail";
			}
		}
		public function do_collected(){
			$uid = $this->session->userdata('id');//用户id
			$mid=$this->input->get('id');
			$result = $this->user_model->check_collect($uid,$mid);
			 
			if(!$result){
				$rs = $this->user_model->collected($uid,$mid);
				header("Refresh:0;url=search");
				echo"<script>alert('收藏成功');</script>";
				//echo "success";			
				}else{
				
				echo"<script>alert('已收藏，请勿重复添加');</script>";
				header("Refresh:0;url=search");
				//echo "fail";
			}
		}
		//collect删除
		public function do_delete(){
			$uid = $this->session->userdata('id');//用户id
			$mid=$this->input->get('mid');//mid
			$rs = $this->user_model->col_delete($uid,$mid);
			if($rs){
				echo json_encode($rs2);
				
			}else{
				echo 'fail';
			}
			
		}
		
		
		/*----------评论代码------------------------------------------------------*/
		
		
		public function pl_con(){
			$uid = $this->session->userdata('id');//用户id
			$id=$this->input->get('xid');//mid
			$pltime= date("Y-m-d");
			$con = $this->input->get('comment');
			$rs = $this->user_model->save_comment($id,$uid,$con,$pltime);
			$rs2 = $this->user_model->get_one($con);
			if($rs){
				echo json_encode($rs2);
			}else{
				echo 'fail';
			}
		}
		public function in(){
			redirect("user/login");
		}
		
		
		
		/*管理员*/
		//管理员登录
		public function admin_login(){
			$this->load->view("html/admin_login.php");
		}
		public function do_admin_login(){
			$name=$this->input->post('name');
			$pass=$this->input->post('pass');
			$rs=$this->user_model->do_admin_login($name,$pass);
			if($rs){
				header("Refresh:0;url=admin_index");
				echo"<script>alert('登录成功')</script>";
			}else{
				echo"<script>alert('对不起，用户名，密码输入错误!');history.back();</script>";
			}	
		}
		
		
		//
		public function admin_index(){
			$rs=$this->user_model->do_admin_singer();
			$arr['admin_singer']=$rs;
			$this->load->view("html/admin_index.php",$arr);
		}
		//
		public function admin_album(){
			$id=$this->input->get('id');
			$rs=$this->user_model->do_album($id);
			$arr['album']=$rs;
			$arr['sid']=$id;
			$this->load->view("html/admin_album.php",$arr);
		}
		public function admin_sing(){
			$id=$this->input->get('id');
			$rs1=$this->user_model->do_album_m($id);
			$arr['albumm']=$rs1;
			$arr['sid']=$id;
			$this->load->view("html/admin_sing.php",$arr);
		}
		//删除歌手
		public function do_delete_singer(){
			$sid=$this->input->post('sid');
			$rs11=$this->user_model->do_delete_search_zj($sid);
			foreach ($rs11 as $key) {
				$key->aa=$this->user_model->do_delete_singer_mic($key->aid);
			}
			
				$rs=$this->user_model->do_delete_singer($sid);
				$rs1=$this->user_model->do_delete_singer_zj($sid);
			
			if($rs){
				echo "success";
			}
		}
		/*上传歌手*/
		public function search_upload(){
			$sname=$this->input->post('singer');
			$rs=$this->user_model->upload_search($sname);
			if($rs){
				echo "success";
			}
		}
			
		public function do_upload(){
			$sname=$this->input->post('sname');
			$file = $_FILES['file'];//得到传输的数据			
			$name = $file['name'];//得到文件名称	
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			$allow_type = array('jpg','jpeg','gif','png'); //判断文件类型是否被允许上传
			if(!in_array($type, $allow_type)){//如果不被允许，则直接停止程序运行
				echo "<script>alert('上传类型不正确');</script>";
			}
			$upload_path = 'C:/xampp/htdocs/music/assets/images/'; //上传文件的存放路径//开始移动文件到相应的文件夹
			if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
				$rs = $this->user_model->upload($sname,$name);
				  echo "<script>alert('上传成功');</script>";
				if($rs){
					header("Refresh:0;url=admin_index");
				}
			}else{
				 echo "<script>alert('上传失败！');</script>";
				 header("Refresh:0;url=admin_index");
			}
		}
		//专辑删除
		public function do_delete_album(){
			$aid=$this->input->post('aid');
			$rs=$this->user_model->do_delete_album($aid);
			$rs1=$this->user_model->do_delete_album_gq($aid);
			if($rs&&$rs1){
				echo "success";
			}
		}
		//修改专辑
		public function do_updata_album(){
			$aid=$this->input->post('aid');
			$sid=$this->input->post('sid');
			$aname=$this->input->post('aname');
			$asinger=$this->input->post('asinger');
			$atime=$this->input->post('atime');
			$acon=$this->input->post('acon');
			$rs=$this->user_model->do_updata_album($aid,$aname,$asinger,$atime,$acon);
			if($rs){
				echo "<script>alert('修改成功！');</script>";
				header("Refresh:0;url=admin_album?id=$sid");
			}
		}
		//上传专辑
		public function search_album(){
			$sname=$this->input->post('album');
			$rs=$this->user_model->search_album($sname);
			if($rs){
				echo "success";
			}
		}
		public function do_upload_album(){
			$sid=$this->input->post('sid');
			$aname=$this->input->post('aname');
			$asinger=$this->input->post('asinger');
			$atime=$this->input->post('atime');
			$acon=$this->input->post('acon');
			$file = $_FILES['file'];//得到传输的数据			
			$name = $file['name'];//得到文件名称	
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			$allow_type = array('jpg','jpeg','gif','png'); //判断文件类型是否被允许上传
			if(!in_array($type, $allow_type)){//如果不被允许，则直接停止程序运行
				echo "<script>alert('上传类型不正确');</script>";
			}
			$upload_path = 'C:/xampp/htdocs/music/assets/images/'; //上传文件的存放路径//开始移动文件到相应的文件夹
			if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
				$rs = $this->user_model->upload_album($sid,$aname,$asinger,$acon,$atime,$name);
				  echo "<script>alert('上传成功');</script>";
				if($rs){
					header("Refresh:0;url=admin_album?id=$sid");
				}
			}else{
				 echo "<script>alert('上传失败！');</script>";
				 header("Refresh:0;url=admin_album?id=$sid");
			}
		}
		//歌曲删除
		public function do_delete_sing(){
			$mid=$this->input->post('mid');
			$rs=$this->user_model->do_delete_sing($mid);
			$rs1=$this->user_model->do_delete_sing_pl($mid);
			if($rs&&$rs1){
				echo "success";
			}
		}
	//上传歌曲
	
		public function search_sing(){
			$mname=$this->input->post('sing');
			$rs=$this->user_model->search_sing($mname);
			if($rs){
				echo "success";
			}
		}
		public function do_upload_sing(){
			$aid=$this->input->post('sid');
			$mname=$this->input->post('mname');
			$msinger=$this->input->post('msinger');
			$file = $_FILES['file'];//得到传输的数据			
			$name = $file['name'];//得到文件名称
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			$allow_type = array('mp3','mp4'); //判断文件类型是否被允许上传
			if(!in_array($type, $allow_type)){//如果不被允许，则直接停止程序运行
				echo "<script>alert('上传类型不正确');</script>";
				header("Refresh:0;url=admin_sing?id=$aid");
			}else{
					$upload_path = 'C:/xampp/htdocs/music/assets/mp3/'; //上传文件的存放路径//开始移动文件到相应的文件夹
			// if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
				$rs = $this->user_model->upload_sing($aid,$mname,$msinger,$name);  
				if($rs){
					echo "<script>alert('上传成功');</script>";
					header("Refresh:0;url=admin_sing?id=$aid");
				}else{
				 echo "<script>alert('上传失败！');</script>";
				 header("Refresh:0;url=admin_sing?id=$aid");
			}
			}
		}
		//评论
		public function admin_pl(){
			$mid=$this->input->get("id");
			$rs=$this->user_model->do_admin_pl($mid);
			foreach ($rs as $key) {
				$key->aa=$this->user_model->admin_pl_user($key->uid);
			}	
			$arr['pl']=$rs;
			$this->load->view("html/admin_pl.php",$arr);
		}
		//删除评论
		public function do_delete_pl(){
			$plid=$this->input->post('plid');
			$rs=$this->user_model->do_delete_pl($plid);
			if($rs){
				echo "success";
			}
		}
	
	
	
		
}
?>