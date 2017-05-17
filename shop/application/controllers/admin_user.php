<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_user extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin_user_model');
        }
        public function login(){
            $this->load->view("admin_login.php");
        }
        public function admin(){
            $rs=$this->admin_user_model->admin_user();
            $rs1=$this->admin_user_model->admin_goods();
            $arr['user']=$rs;
            $arr['goods']=$rs1;
            $this->load->view("admin.php",$arr);
        }
        public function do_login(){
            $gname=$this->input->post('username');
            $gpass=$this->input->post('password');
            $rs = $this->admin_user_model->get_login($gname,$gpass);
            if($rs){
                $arr=array(
                    'id'=>$rs->uid,
                    'name'=>$rs->uname,
                    'logged_in' => TRUE,
                );
                $this->session->set_userdata($arr);
                redirect('admin_user/admin');
            }else{
                redirect('admin_user/login');
            }
        }
        public function show_single(){
            $id=$this->input->get('id');
            $rs=$this->admin_user_model->get_single($id);
            $arr['id']=$rs;
            $this->load->view("admin_single.php",$arr);
        }
        public function user_del(){
            $id=$this->input->post('uid');
            $query=$this->admin_user_model->user_del($id);
            if($query)
            {
                echo "success";
            }
        }
        public function goods_del(){
            $id=$this->input->post('wid');
            $rs=$this->admin_user_model->goods_del($id);
            if($rs)
            {
                echo "success";
            }
        }
    }
?>