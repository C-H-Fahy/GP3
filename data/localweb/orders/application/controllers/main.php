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

	public function createbooking()
	{	
		$this->load->view('header');
		$this->load->view('create_booking');
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
		
		$crud->callback_column('price', array($this, 'toprice'));	
		$crud->required_fields('cinema', 'screen_no.', 'seats');
		$crud->set_relation('cinema','Cinema','name');
		
		
		$output = $crud->render();
		$this->screen_output($output);
	}
	function toprice($value, $row)
	{
		return ('&pound;'.($value/100));
	}
	public function performance()
	{
		
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_model('custom_model');
		$crud->set_theme('datatables');
		$crud->set_table('performance');
		$crud->set_subject('Performances');
		$crud->basic_model->set_query(
			'SELECT Performance.*, Cinema.name as cinema_name, film.title as film_title, Screen.seats - IFNULL(sum(booking.seats), 0) as seats_left
			FROM Booking
			RIGHT JOIN Performance
			ON (Performance.id = booking.performance)
			JOIN Screen
			ON ((Performance.screen = Screen.screen) AND (Performance.cinema = Screen.Cinema))
			JOIN Film
			ON (Performance.film = film.id)
			JOIN Cinema
			ON (Performance.cinema = cinema.id)
			GROUP BY performance.id
			');
			
		
  

		
		
			
			
        $crud->columns(['id', 'cinema_name', 'screen', 'film_title', 'date', 'time', 'seats_left']);
        $output = $crud->render();
        $this->performance_output($output);
    }
	
	
	
	
	public function cancel_check()
	{
		
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_model('custom_model');
		$crud->set_theme('datatables');
		$crud->set_table('booking');
		$crud->set_subject('bookings');
		if(isset($_GET['PerfID'])){
        $hi = $_GET['PerfID'];
    }
	else{
	return; }
		
		
		$crud->basic_model->set_query(
			"SELECT booking.*, id as bookingID, performance, seats
			FROM Booking where performance = '$hi'"
			);
			
		
  

		
		
			
			
        $crud->columns(['bookingID', 'performance', 'seats']);
        $output = $crud->render();

        $query = $this->db->query(
			"DELETE FROM Booking where performance = ?;", [$hi]);
        $query = $this->db->query(
			"DELETE FROM performance where id = ?;", [$hi]);

        $this->delete_output($output);
    }
	
	
	function delete_output($output = null)
	{
		$this->load->view('affectedbookings_view.php', $output);

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
	
	public function userbooking()
	{
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_model('custom_model');
		$crud->set_theme('datatables');
		$crud->set_table('booking');
		$crud->set_subject('Booking');

		$uid = $_SESSION['id'];
if($_SESSION["role"] != 'member'){
      if(isset($_GET['uid']) && !empty(trim($_GET['uid']))){
        $uid = $_GET['uid'];
      }
    }
		$crud->basic_model->set_query(
		'SELECT Booking.*, Film.title AS Film_title
		FROM Booking
		JOIN Performance
		ON (Booking.performance = Performance.id)
		JOIN Film
		ON (Performance.film = Film.id)
                WHERE member='.$uid);

        	$crud->columns(['id', 'member', 'performance', 'Film_title','seats']);
        	$output = $crud->render();
        	$this->userbooking_output($output);
    	}
	function userbooking_output($output = null)
	{
		$this->load->view('user_booking_view.php', $output);
	}

	
	public function booking()
	{
		$this->load->view('header');
		$crud = new grocery_CRUD();
		$crud->set_model('custom_model');
		$crud->set_theme('datatables');
		$crud->set_table('booking');
		$crud->set_subject('Booking');
		$crud->basic_model->set_query(
		'SELECT Booking.*, Film.title AS Film_title
		FROM Booking
		JOIN Performance
		ON (Booking.performance = Performance.id)
		JOIN Film
		ON (Performance.film = Film.id)
		');

        	$crud->columns(['id', 'member', 'performance', 'Film_title','seats']);
        	$output = $crud->render();
        	$this->booking_output($output);
    	}
	function booking_output($output = null)
	{
		$this->load->view('booking_view.php', $output);
	}


	public function checkin()
	{
		$this->load->view('header');
		//$crud = new grocery_CRUD();

        	$this->checkin_output();
    	}

	function checkin_output($output = null)
	{
		$this->load->view('checkin.php', $output);
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
		
		
		
		$crud->required_fields('title', 'name', 'active');
		$crud->columns(['ID', 'title', 'name', 'joined', 'active', 'role_type']);
        	
		
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
		$this->load->view('query3_view');
	}
	public function query4()
	{
		$this->load->view('header');
		$this->load->view('query4_view');
	}

	public function blank()
	{	
		$this->load->view('header');
		$this->load->view('blank_view');
	}
}