<?php
class Common_model extends CI_Model {



    function __construct() {
        parent::__construct();
        $this->load->helper('string');
    }
    
    public function insert_iec_user_entry($data){
        $this->db->insert('lucrative_users',$data);
		return	$result = $this->db->insert_id();
    }
    
     public function insert_iec_report_settings($data){
        $this->db->insert('report_setting_export',$data);
		return	$result = $this->db->insert_id();
    }
    
    public function get_iec_all_users_list(){
        $this->db->select("*");
        $this->db->from("lucrative_users");
        return $this->db->get()->result();
    }
    
    	function get_entity_data($table,$where)
	{ 
		if($where == NULL )
		{ 
			return $this->db->select('*')->get($table)->result_array();
		} 
		else 
		{  
	
			return $this->db->select('*')->where($where)->get($table)->result_array();
		}
	}



}