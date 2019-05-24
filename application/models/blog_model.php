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
}	


