<?php  defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_user_model extends CI_Model {
        public function get_login($gname,$gpass){
            $arr = Array(
                "gname"=>$gname,
                "gpass"=>$gpass
            );
            $query = $this->db->get_where('admin',$arr);
            return $query->row();
        }
        public function admin_user(){
            $query=$this->db->get('user');
            return $query->result();
        }
        public function admin_goods(){
            $query=$this->db->get('goods');
            return $query->result();
        }
        public function get_single($id){
            $sql = "select c.name,g.*,u.* from goods g,city c,user u where g.id=c.id and u.uid=g.uid and wid='$id'";
            $query =$this->db->query($sql);

            return $query->result();
        }
        public function user_del($id){
            $all=array('goods','user');
            $this->db->where('uid',$id);
            $query=$this->db->delete($all);
            return $query->affected_rows();
        }
        public function goods_del($id){
            $this->db->where('wid',$id);
            $query=$this->db->delete('goods');
            return $query->affected_rows();
        }
    }
?>