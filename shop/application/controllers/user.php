<?php  defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');
        }
        public function show_login(){
            $this->load->view("login.php");
        }

        public function show_reg(){
            $this->load->view("reg.php");
        }
        public function show_unindex(){
            $cata=$this->user_model->home_cata();
            $catalog=$this->user_model->home_catalog();
            foreach ($cata as $keyq) {
                $keyq->aaa=$this->user_model->home_catas($keyq->ccid);
            }
            $rs['goodss']=$cata;
            $this->load->view("unindex.php",$rs);
        }
        public function show_index(){
            $id=$this->input->get('id');

            if($id){
                $sss=$this->user_model->do_city($id);
                $rs1=$this->user_model->click($id);
            }else{
                $id=14;
                $rs1=$this->user_model->click($id);
                $sss=$this->user_model->do_city($id);
            }

            $cata=$this->user_model->home_cata();
            $catalog=$this->user_model->home_catalog();
            foreach ($cata as $keyq) {
                $keyq->aaa=$this->user_model->home_catas($keyq->ccid);
            }
            $rs['goodss']=$cata;
            $rs['goods']=$rs1;
            $rs['good']=$sss;
            $this->load->view("index.php",$rs);
        }
        public function show_city(){

            $cata=$this->user_model->get_city();
            $rs['goods']=$cata;
            $this->load->view("city.php",$rs);
        }
        public function show_collect(){
            $uid = $this->session->userdata('id');
            $row=$this->user_model->get_collect($uid);
            $arr['goods']=$row;
            $this->load->view("collect.php",$arr);
        }
        public function show_mine(){
            $uid = $this->session->userdata('id');
            $rows=$this->user_model->get_items($uid);
            $arr['mine']=$rows;
            $this->load->view("mine.php",$arr);
        }
        public function show_personal(){
            $uid = $this->session->userdata('id');
            $rows=$this->user_model->get_all($uid);
            $arr['user']=$rows;
            $this->load->view("personal.php",$arr);
        }
        public function do_index(){
            $uname = $this->input->post('uname');
            $usex = $this->input->post('usex');
            $ubirth = $this->input->post('ubirth');
            $utel = $this->input->post('utel');
            $uid = $this->session->userdata('id');
            $rs=$this->user_model->insert_information($uid,$uname,$usex,$ubirth,$utel);


            // $uemail = $arr['user']->uemail;
            // var_dump($arr['user']->uemail);
            // die();
            // $this->load->view('person/index.php',$arr);
            if($rs){
                redirect('user/show_personal');
            }
        }
//        public function show_search(){
//
//        }
        public function show_search_none(){
            $this->load->view("search_none.php");
        }
        public function search_down(){
            $id=$this->input->get("id");
            if($id){
                $rs=$this->user_model->get_data2($id);
                $arr['goods']=$rs;
                $this->load->view('search.php',$arr);
            }

        }
         public function search_up(){
             $id=$this->input->get("id");

             if($id){
                 $rs=$this->user_model->get_data1($id);
                 $arr['goods']=$rs;
                 $this->load->view('search.php',$arr);
             }
         }

        public function do_search(){
            $id = $this->input->get('id');
            $sid = $this->input->get('sid');
            $ssid = $this->input->get('ssid');
            if ($id) {
                $as = $this->user_model->get_search_id($id);
                $rows = $this->user_model->get_allrows($id);
                if ($rows) {
                    $arr['id'] = $as;
                    $arr['goods'] = $rows;
                    $this->load->view('search.php', $arr);
                } else {
                    redirect('user/show_search_none');
                }
            }
            if ($sid) {
                $as = $this->user_model->get_search_id($sid);
                $rows = $this->user_model->get_data2($sid);
                if ($rows) {
                    $arr['id'] = $as;
                    $arr['goods'] = $rows;
                    $this->load->view('search.php', $arr);
                }
            }
            if ($ssid) {
                $as = $this->user_model->get_search_id($ssid);
                $rows = $this->user_model->get_data1($ssid);
                if ($rows) {
                    $arr['id'] = $as;
                    $arr['goods'] = $rows;
                    $this->load->view('search.php', $arr);
                }
            }

        }
        public function do_sear(){
            $search = $this->input->get('search');
            $sid = $this->input->get('sid');
            $ssid = $this->input->get('ssid');
            if($search){
                $arr=array(
                    'search'=>$search
                );
                $this->session->set_userdata($arr);
                $rs1=$this->user_model->get_title($search);
                if($rs1){
                    $arr['goods']=$rs1;
                    $this->load->view('sear.php', $arr);
                }else{
                    redirect('user/show_search_none');
                }
            }
            if ($sid) {
                $rows = $this->user_model->get_da1($sid);
                if ($rows) {
                    $arr['goods'] = $rows;
                    $this->load->view('sear.php', $arr);
                }
            }
            if ($ssid) {
                $rows = $this->user_model->get_da2($ssid);
                if ($rows) {
                    $arr['goods'] = $rows;
                    $this->load->view('sear.php', $arr);
                }
            }
            if($search==''&&$ssid==''&&$sid==''){
                redirect('user/show_search_none');
            }
        }
        public function show_single(){
            $id=$this->input->get('id');
            $rs=$this->user_model->get_id($id);
            $arr['id']=$rs;
            $this->load->view("single.php",$arr);
        }
        public function show_upload(){
            $uid = $this->session->userdata('id');
            $rs = $this->user_model->get_catalog();
            $city=$this->user_model->get_city();
            $arr['city']=$city;

            $arr['catalog']=$rs;
            $rows=$this->user_model->get_all($uid);
            $arr['user']=$rows;
            $this->load->view("upload.php",$arr);
        }
        public function do_login(){
            $email=$this->input->post('email');
            $pwd=$this->input->post('pwd');
            $rs=$this->user_model->do_login($email,$pwd);
            if($rs){
                $arr=array(
                    'id'=>$rs->uid,
                    'name'=>$rs->uname,
                    'logged_in' => TRUE,
                );
                $this->session->set_userdata($arr);
                redirect('user/show_index');
            }else{
                redirect('user/show_login');
            }
        }
        public function do_reg(){
            $name=$this->input->post('uemail');
            $pass=$this->input->post('pass');
            $rpass=$this->input->post('rpass');
            if($pass==$rpass){
                $rs=$this->user_model->checkname($name);
                if($rs){
                    redirect("user/show_reg");
                }else{
                    $rs=$this->user_model->set_insert($name,$pass);
                    if($rs){
                        header("Refresh:0;url=show_login");
                        echo"<script>alert('注册成功')</script>";
                    }

                }
            }else{
                echo"<script>alert('注册失败');history.back();</script>";
            }
        }
        public function check(){
            header("Access-Control-Allow-Origin:*");
            $name=$this->input->post('uemail');
            $rs=$this->user_model->get_check($name);
            if($rs){
                echo "success";
            }
        }
        public function  addSubmit(){
            $uid = $this->session->userdata('id');
            $wtitle = $this->input->post('wtitle');
            $cid = $this->input->post('cid');
            $id = $this->input->post('city');
            $wprice = $this->input->post('wprice');
            $wcon = $this->input->post('wcon');

            $file = $_FILES['file'];//得到传输的数据
            $name = $file['name'];//得到文件名称
            $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
            $allow_type = array('jpg','jpeg','gif','png'); //判断文件类型是否被允许上传
            if(!in_array($type, $allow_type)){//如果不被允许，则直接停止程序运行
                echo "<script>alert('上传类型不正确');</script>";
            }
            $upload_path = 'C:/xampp/htdocs/nshop/assets/uploads/'; //上传文件的存放路径//开始移动文件到相应的文件夹
            if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
                $rs = $this->user_model->upload($wtitle,$cid,$id,$wprice,$wcon,$name,$uid);
                echo "<script>alert('上传成功,请到个人物品中查看');</script>";
                    header("Refresh:0;url=show_mine");


            }else{
                echo "<script>alert('上传失败！');history.back();</script>";
            }
        }
        public function do_delete(){
            $wid = $this->input->get('id');
            $rs = $this->user_model->delete($wid);
            if($rs){
                redirect('user/show_mine');
            }
        }
        public function up(){
            $uid = $this->session->userdata('id');
            $rs = $this->user_model->get_catalog();
            // var_dump($rs);
            // die();
            $arr['catalog']=$rs;
            $rows=$this->user_model->get_all($uid);
            $arr['user']=$rows;

            $wid = $this->input->get('id');
            $rows = $this->user_model->update($wid);
            $arr['up']=$rows;
            $this->load->view('person/update.php',$arr);
        }
        public function show_update(){
            $uid = $this->session->userdata('id');
            $rs = $this->user_model->get_catalog();

            $arr['catalog']=$rs;
            $rows=$this->user_model->get_all($uid);
            $arr['user']=$rows;

            $wid = $this->input->get('id');
            $row1 = $this->user_model->get_goods_info($wid);
            $rows = $this->user_model->update($wid);
            $arr['up']=$rows;
            $arr['goods']=$row1;
            $this->load->view("update.php",$arr);
        }
        public function keep(){

            $wid = $this->input->get('id');
            $wtitle = $this->input->post('wtitle');
            $wprice = $this->input->post('wprice');
            $wcon = $this->input->post('wcon');
            $rs=$this->user_model->update_goods($wid,$wtitle,$wprice,$wcon);

            if($rs){
                redirect('user/show_mine');
                echo "<script>alert('修改成功');</script>";
            }
        }
        public function do_collect(){
            $uid = $this->session->userdata('id');
            $wid = $this->input->get('id');
            $row=$this->user_model->check_collect($wid,$uid);
            if(!$row){
                $rs=$this->user_model->insert_collect($wid,$uid);
                if($rs){
                    echo "<script>alert('收藏成功');</script>";
                    header("Refresh:0;url=show_single?id=$wid");

                }else{
                    echo "<script>alert('收藏失败');</script>";
                    header("Refresh:0;url=show_single?id=$wid");

                }
            }else{
                echo "<script>alert('已收藏，请勿重复添加');</script>";
                header("Refresh:0;url=show_single?id=$wid");
            }

        }
        public function do_delete_collect(){
            $uid = $this->session->userdata('id');
            $wid = $this->input->get('id');
            $row=$this->user_model->delete_collect($wid,$uid);
            if($row){
                echo "<script>alert('删除成功');</script>";
                header("Refresh:0;url=show_collect");
            }else{
                echo "<script>alert('删除失败');</script>";
                header("Refresh:0;url=show_collect");
            }
        }

    }
?>