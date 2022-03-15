<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	 
	 function __construct()
	{
		parent::__construct();	 
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
	}
	
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('home');
	}
	
	public function cinema()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		//table name exact from database
		$crud->set_table('cinema');
		
		//give focus on name used for operations e.g. Add Order, Delete Order
		$crud->set_subject('Cinema');
		
		//the columns function lists attributes you see on frontend view of the table
		$crud->columns('name', 'location', 'address', 'manager');
	
		//the fields function lists attributes to see on add/edit forms.
		//Note no inclusion of invoiceNo as this is auto-incrementing
		
		
	
		
		
		
		//form validation (could match database columns set to "not null")
		$crud->required_fields('name', 'location', 'address');
		
		
		
		$output = $crud->render();
		$this->cinemas_output($output);
	}
	
	function cinemas_output($output = null)
	{
		//this function links up to corresponding page in the views folder to display content for this table
		$this->load->view('cinemas_view.php', $output);
	}

	public function screen()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('screen');
		$crud->set_subject('screen');
		
		
		$crud->required_fields('cinema', 'screen_no.', 'seats');
		
		
		
		$output = $crud->render();
		$this->screen_output($output);
	}
	
	public function performance()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		$crud->set_table('performance');
		$crud->set_subject('performance');
		$crud->required_fields('cinema', 'screen_no.', 'seats left');
		
		
		
		
		$output = $crud->render();
		$this->performance_output($output);
	}
	
	function performance_output($output = null)
	{
		$this->load->view('performance_view.php', $output);
	}
	
	function screen_output($output = null)
	{
		$this->load->view('screen_view.php', $output);
	}
	public function film()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('film');
		$crud->set_subject('film');
		
		$crud->required_fields('title');
		
		
		
		
		

		
		$output = $crud->render();
		$this->film_output($output);
	}
	
		public function booking()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('booking');
		$crud->set_subject('booking');
		$crud->set_relation('id','performance','id');
		$crud->set_relation('member','member','id');
		
		$crud->required_fields('id');
		
		
		
		
		

		
		$output = $crud->render();
		$this->booking_output($output);
	}
	
	function booking_output($output = null)
	{
		$this->load->view('booking_view.php', $output);
	}
	
	function film_output($output = null)
	{
		$this->load->view('film_view.php', $output);
	}
	
	public function member()
	{	
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('member');
		$crud->set_subject('member');
		
		
		
		$crud->required_fields('title', 'name', 'status');
		
		
		$output = $crud->render();
		$this->member_output($output);
	}
	
	function member_output($output = null)
	{
		$this->load->view('member_view.php', $output);
	}
	
	public function querynav()
	{	
		$this->load->view('header');
		$this->load->view('querynav_view');
	}

public function register()
	{	
		$this->load->view('register');
	}
public function login()
	{	
		$this->load->view('login');
	}
		
	public function query1()
	{	
		$this->load->view('header');
		$this->load->view('query1_view');
	}
	
	public function query2()
	{	
		$this->load->view('header');
		$this->load->view('query2_view');
	}
	
	public function query3()
	{
		$this->load->view('header');
		$this->load->view('query2_view');
	}

	public function blank()
	{	
		$this->load->view('header');
		$this->load->view('blank_view');
	}
}