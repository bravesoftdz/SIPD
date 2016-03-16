<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_user extends CI_Model {
		
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
				
		function getUsers($limit, $start, $st = NULL) {
			if ($st == "NIL") $st = "";
			$sql = "select * from sipd_users where username like '%$st%' limit " . $start . ", " . $limit;
			$query = $this->db->query($sql);			
			return $query->result();
		}
		
		function getCounts($st = null) {
			if ($st == "NIL") $st = "";
	        $sql = "select * from sipd_users where username like '%$st%'";
	        $query = $this->db->query($sql);
	        return $query->num_rows();
		}
		
		function total_rows($table ="") {
		    $result = "";
		    //if ($field != "" && $id != "") {
		        //$this->db->where($field, $id);
		        $this->db->from($table);
		        $result = $this->db->count_all_results();
		    //} 
		            
		    if ($result != "") {
		        return $result;
		    } else {
		        return array('error'=>'No result found');
		    }
		} 
		
		function getSortUsers($limit, $start, $st = NULL, $order = NULL) {
			if ($st == "NIL") $st = "";
			if ($order == "NIL") $order ="user_id";
			$sql = "select * from sipd_users where username like '%$st%' ORDER BY " . $order ." Desc Limit " . $start . ", " . $limit;
			
			$query = $this->db->query($sql);			
			return $query->result();
		}
	}
?>