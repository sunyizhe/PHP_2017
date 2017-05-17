<?php  defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model {
		
		public function do_login($a,$b){
			$arr=array(
				'uemail'=>$a,
				'upass'=>$b,
			);
			$query=$this->db->get_where('user',$arr);
			return $query->row();
		}
		
		public function get_check($name){			
			$query=$this->db->get_where('user',array('uemail'=>$name));
			return $query->row();
		}
		
		public function checkname($name){
			$arr=array(
				'uemail'=>$name,
			);
			$query=$this->db->get_where('user',$arr);
			return $query->row();	
		}
		
		public function set_insert($zname,$name,$pass){
			$arr=array(
				'uemail'=>$name,
				'uname'=>$zname,
				'upass'=>$pass,
			);
			$query=$this->db->insert('user',$arr);
			return $query;
		}
		public function do_singer(){
			$query=$this->db->get('singer');
			return $query->result();
		}
		public function do_album($id){
			$query=$this->db->get_where('album',array('sid'=>$id));
			return $query->result();
		}
		public function do_album_d($id){
			$query=$this->db->get_where('album',array('aid'=>$id));
			return $query->result();
		}
		public function do_album_m($id){
			$query=$this->db->get_where('mic',array('aid'=>$id));
			return $query->result();
		}
		public function do_lists(){
			$this->db->order_by('hits','DESC');
			$query=$this->db->get('mic');
			return $query->result();
		}
		public function do_list1(){
			$this->db->order_by('shits','DESC');
			$query=$this->db->get('mic');
			return $query->result();
		}
		public function do_listen($id){
			$query=$this->db->get_where('mic',array('mid'=>$id));
			return $query->row();
		}
		public function do_search(){
			$this->db->order_by('hits','DESC');
			$query=$this->db->get('mic');
			return $query->result();
		}
		public function do_search1($search){
			$this->db->like('mname',$search);
			$query=$this->db->get('mic');
			return $query->result();
		}
		
		public function do_search_shits($search){
			$this->db->set('shits', 'shits+1', FALSE);
			$this->db->like('mname',$search);
			$query=$this->db->update('mic');
			return $query;
		}
		
		public function do_listen_hits($id){
			$this->db->set('hits', 'hits+1', FALSE);
			$this->db->where('mid',$id);
			$query=$this->db->update('mic');
			return $query;
		}
	
	
		
		public function get_album(){
			$query=$this->db->get('album');
			return $query->result();
		}
		public function get_all_pl($id){
			$sql = "select user.uname,pl.* from user,pl where user.uid=pl.uid AND pl.mid='$id'";
			$query =$this->db->query($sql);
			return $query->result();
		}
		public function get_one($con){
			$sql = "select pl.*,user.uname from pl,user where pl.plcon='$con' AND user.uid=pl.uid";
			$query =$this->db->query($sql);
			return $query->result();
		}
		public function save_comment($id,$uid,$con,$pltime){
			$sql = "insert into pl (mid,uid,plcon,pltime) values ('$id','$uid','$con','$pltime')";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function collected($uid,$mid){
			$sql = "insert into collect (uid,mid) values ('$uid','$mid')";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function get_collect($uid){
			$sql = "select collect.*,mic.* from collect,mic where collect.uid='$uid' AND mic.mid=collect.mid";
			$query =$this->db->query($sql);
			return $query->result();
		}
		public function col_delete($uid,$mid){
			$sql = "delete from collect where uid='$uid' AND mid='$mid'";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function check_collect($uid,$mid){
			$arr=array(
				'uid'=>$uid,
				'mid'=>$mid
			);
			$query=$this->db->get_where('collect',$arr);
			return $query->row();
		}
	
	/*管理员*/
	
	//管理员登录
	public function do_admin_login($a,$b){
			$arr=array(
				'admin_email'=>$a,
				'admin_pass'=>$b,
			);
			$query=$this->db->get_where('admin',$arr);
			return $query->row();
		}
	
	public function do_admin_singer(){
		$query=$this->db->get('singer');
		return $query->result();
	}
	/*删除歌手*/
	public function do_delete_singer($sid){
		$this->db->where('sid',$sid);
		$query=$this->db->delete('singer');
		return $query;
	}
	public function do_delete_singer_zj($sid){
		$this->db->where('sid',$sid);
		$query=$this->db->delete('album');
		return $query;
	}
	public function do_delete_search_zj($sid){
		$query=$this->db->get_where('album',array('sid'=>$sid));
		return $query->result();
	}
	public function do_delete_singer_mic($aid){
		$this->db->where('aid',$aid);
		$query=$this->db->delete('mic');
		return $query;
	}
	/*上传歌手*/
	public function upload_search($sname){
		$query = $this->db->get_where('singer',array('sname'=>$sname));
		return $query->row();
	}
	public function upload($sname,$name){
		$arr=array(
				'sname'=>$sname,
				'spic'=>$name
			);
			$query = $this->db->insert('singer',$arr);
			return $query;
	}
	//删除专辑
	public function do_delete_album($aid){
		$this->db->where('aid',$aid);
		$query=$this->db->delete('album');
		return $query;
	}
	public function do_delete_album_gq($aid){
		$this->db->where('aid',$aid);
		$query=$this->db->delete('mic');
		return $query;
	}
	//更改专辑
	public function do_updata_album($aid,$aname,$asinger,$atime,$acon){
		$arr=array(
				'aname'=>$aname,
				'acon'=>$acon,
				'atime'=>$atime,
				'asinger'=>$asinger,
			);
			$this->db->where('aid',$aid);
			$query = $this->db->update('album',$arr);
			return $query;
	}
	//上传专辑
	public function search_album($sname){
		$query = $this->db->get_where('album',array('aname'=>$sname));
		return $query->row();
	}
	public function upload_album($sid,$aname,$asinger,$acon,$atime,$name){
		$arr=array(
				'sid'=>$sid,
				'aname'=>$aname,
				'acon'=>$acon,
				'atime'=>$atime,
				'asinger'=>$asinger,
				'apic'=>$name
			);
			$query = $this->db->insert('album',$arr);
			return $query;
	}
	//歌曲删除
	public function do_delete_sing($mid){
		$this->db->where('mid',$mid);
		$query=$this->db->delete('mic');
		return $query;
	}
	//删除歌曲评论
	public function do_delete_sing_pl($mid){
		$this->db->where('mid',$mid);
		$query=$this->db->delete('pl');
		return $query;
	}
	/*上传歌曲*/
	public function search_sing($sname){
		$query = $this->db->get_where('mic',array('mname'=>$sname));
		return $query->row();
	}
	public function upload_sing($mid,$mname,$msinger,$name){
		$arr=array(
				'aid'=>$mid,
				'mname'=>$mname,
				'msinger'=>$msinger,
				'mfile'=>$name
			);
			$query = $this->db->insert('mic',$arr);
			return $query;
	}
	public function do_listen_aa($aid){
		$query=$this->db->get_where('album',array('aid'=>$aid));
		return $query->row();
		
	}
	//评论
	public function do_admin_pl($mid){
		$query=$this->db->get_where('pl',array('mid'=>$mid));
		return $query->result();
	}
	public function admin_pl_user($uid){
		$query=$this->db->get_where('user',array('uid'=>$uid));
		return $query->row();
	}
	//删除评论
	public function do_delete_pl($plid){
		$this->db->where('plid',$plid);
		$query=$this->db->delete('pl');
		return $query;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
		
	}
	
	
	
	
	
?>