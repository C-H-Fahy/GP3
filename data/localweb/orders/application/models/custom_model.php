<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use GroceryCrud\Core\Model;
    class custom_model extends grocery_CRUD_model {
    	private  $query = '';
    	function __construct() {
    		parent::__construct();
    	}
    	function get_list() {
    		$query=$this->db->query($this->query_str);
    		$results=$query->result();
    		return $results;
    	}
    	public function set_query($query) {
    		$this->query_str = $query;
    	}
    }
