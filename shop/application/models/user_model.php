<?php  defined('BASEPATH') OR exit('No direct script access allowed');
    class User_model extends CI_Model{
        public function do_login($a,$b){
            $arr=array(
                'uemail'=>$a,
                'upass'=>$b,
            );
            $query=$this->db->get_where('user',$arr);
            return $query->row();
        }
        public function click($id){
            $query = $this->db->get_where('goods',array('id'=>$id));
            return $query->result();
        }
        public function get_check($name){
            $query=$this->db->get_where('user',array('uemail'=>$name));
            return $query->row();
        }
        public function do_city($id){
            $query = $this->db->get_where('city',array('id'=>$id));
            return $query->result();
        }
        public function home_catalog(){
            $query=$this->db->get('catalog');
            return $query->result();
        }
        public function home_cata(){
            $query=$this->db->get('cata');
            return $query->result();
        }
        public function home_catas($id){

            $query=$this->db->get_where('catalog',array("ccid"=>$id));
            return $query->result();
        }
        public function get_city(){
            $query=$this->db->get('city');
            return $query->result();
        }
        public function checkname($name){
            $arr=array(
                'uemail'=>$name,
            );
            $query=$this->db->get_where('user',$arr);
            return $query->row();
        }
        public function set_insert($name,$pass){
            $arr=array(
                'uemail'=>$name,
                'upass'=>$pass,
            );
            $query=$this->db->insert('user',$arr);
            return $query;
        }


        public  function  get_search_id($id){
            $query=$this->db->get_where('catalog',array('cid'=>$id));
            return $query->row();
        }



        public function get_all($uid){

            $query=$this->db->get_where('user',array('uid'=>$uid));
            // var_dump($query->row());
            // die();
            return $query->result();
        }
        public function insert_information($uid,$uname,$usex,$ubirth,$utel){

            $arr=array(
                'uname'=>$uname,
                'usex'=>$usex,
                'ubirth'=>$ubirth,
                'utel'=>$utel
            );
            // $arr1 = array('uid'=>$uid);
            $this->db->where('uid',$uid);
            $query=$this->db->update('user',$arr);

            // var_dump($query);
            // die();
            return $query;
        }
        public function get_catalog(){
            $query = $this->db->get('catalog');
            // var_dump($query->result());
            // die();
            return $query->result();
        }
        public function upload($wtitle,$cid,$id,$wprice,$wcon,$name,$uid){
            $arr=array(
                'wtitle'=>$wtitle,
                'cid'=>$cid,
                'id'=>$id,
                'wprice'=>$wprice,
                'wcon'=>$wcon,
                'wpic'=>$name,
                'uid'=>$uid
            );
            $query = $this->db->insert('goods',$arr);
            return $query;
        }
        public function get_items($uid){
            $sql = "select cat.cname,g.* from goods g,catalog cat where g.cid=cat.cid and uid='$uid'";
            $query =$this->db->query($sql);

            return $query->result();
        }
        public function delete($wid){
            $this->db->where('wid',$wid);
            $query=$this->db->delete('goods');
            return $query;
        }
        public function update($wid){
            $query = $this->db->get_where("goods",array('wid'=>$wid));
            return $query->result();
        }
        public function get_id($id){
            $sql = "select c.name,g.*,u.* from goods g,city c,user u where g.id=c.id and u.uid=g.uid and wid='$id'";
            $query =$this->db->query($sql);

            return $query->result();
        }
        public function get_goods_info($wid){
            $query=$this->db->get_where('goods',array('wid'=>$wid));
            return $query->result();
        }
        public function update_goods($wid,$wtitle,$wprice,$wcon){
            $arr=array(
                'wtitle'=>$wtitle,
                'wprice'=>$wprice,
                'wcon'=>$wcon
            );
            // $arr1 = array('uid'=>$uid);
            $this->db->where('wid',$wid);
            $query=$this->db->update('goods',$arr);
            return $query;
        }
        public function get_title($search){
            $this->db->like('wtitle',$search);
            $query=$this->db->get('goods');
            return $query->result();
        }
        public function get_data1($id){
            $this->db->order_by('wprice','DESC');
            $query=$this->db->get_where('goods',array('cid'=>$id));
            return $query->result();
        }
        public function get_data2($id){
            $this->db->order_by('wprice','ASC');
            $query=$this->db->get_where('goods',array('cid'=>$id));
            return $query->result();
        }
        public function get_da1($sid){
            $this->db->order_by('wprice','ASC');
            $this->db->like('wtitle',$sid);
            $query=$this->db->get('goods');
            return $query->result();
        }
        public function get_da2($ssid){
            $this->db->order_by('wprice','DESC');
            $this->db->like('wtitle',$ssid);
            $query=$this->db->get('goods');
            return $query->result();
        }
        public function insert_collect($wid,$uid){
            $arr=array(
                'wid'=>$wid,
                'uid'=>$uid
            );
            $query = $this->db->insert('collect',$arr);
            return $query;
        }
        public function check_collect($wid,$uid){
            $arr=array(
                'wid'=>$wid,
                'uid'=>$uid
            );
            $query = $this->db->get_where('collect',$arr);
//            var_dump($query);
//            die;
            return $query->row();
        }
        public function get_collect($uid){
            $sql = "select c.uid,g.*,ca.*,ci.name from goods g,collect c,catalog ca,city ci where g.wid=c.wid AND c.uid=$uid AND ca.cid=g.cid AND g.id=ci.id";
            $query =$this->db->query($sql);

            return $query->result();
        }
        public function delete_collect($wid,$uid){
            $arr=array(
                'wid'=>$wid,
                'uid'=>$uid
            );
            $query = $this->db->delete('collect',$arr);
//            var_dump($query);
//            die;
            return $query;
        }
        public function get_allrows($id){
            
            $query=$this->db->get_where('goods',array('cid'=>$id));
            return $query->result();
        }


    }
?>