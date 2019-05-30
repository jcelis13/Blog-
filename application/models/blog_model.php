<?php
class Blog_model extends CI_Model{

	const BLOGTABLE = 'blogpost';

		function __construct() 
		{
				parent::__construct();
				$this->load->database(); 

		}
		public function insertblog($data)
		{
			$this->db->insert(self::BLOGTABLE, $data);
			
		}
		public function get_blogpost()
		{
			$query = $this->db->query("select * from blogpost");
			return $query->result();
		}
		public function approvedblogs()
		{
			$query = $this->db->get_where(self::BLOGTABLE, array('poststatus' => '1'));
			return $query->result();
		}
		public function pendingblogs()
		{
		
			$query = $this->db->get_where(self::BLOGTABLE, array('poststatus' => '0'));
			return $query->result();
		}	
		public function updateblogstatus($id)
		{
			$field = array(
			'poststatus' =>1
			);

			$this->db->where('id',$id);
			$this->db->update(self::BLOGTABLE, $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
		public function getblogid($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get(self::BLOGTABLE);
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return false;
			}
		}
		public function updateblog()
		{
			$id = $this->input->post('text_hidden');
			$field = array( 
			'title' => $this->input->post('blogtitle'),
			'caption' =>$this->input->post('caption')
		
			);

			$this->db->where('id',$id);
			$this->db->update(self::BLOGTABLE, $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
		public function deleteblog($id)
		{
			$this->db->where('id',$id);
			$this->db->delete(self::BLOGTABLE);
			if($this->db->affected_rows() > 0){
				return true;
				
			}else{
				return false;
			}
		}

}
