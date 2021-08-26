<?php 
namespace controllers;

use controllers\BaseController;


class AuthController extends BaseController {
    public function __construct()
    {
        parent::__construct();   
    }

    	// Validate user ID
	function checkID() {
        $this->f3->get('POST.userID',
			function($value) {
				if (!\F3::exists('message')) {
					if (empty($value))
						\F3::set('message','User ID should not be blank');
					elseif (strlen($value)>24)
						\F3::set('message','User ID is too long');
					elseif (strlen($value)<3)
						\F3::set('message','User ID is too short');
				}
				// Convert form field to lowercase
				$_POST['userID']=strtolower($value);
			}
		);
	}

    // Validate password
	function password() {
		$this->f3->get('POST.password',
			function($value) {
				if (!\F3::exists('message')) {
					if (empty($value))
						\F3::set('message','Password must be specified');
					elseif (strlen($value)>24)
						\F3::set('message','Invalid password');
				}
			}
		);
	}

    function login() {
		// Reset session in case someone else is logged in
		$this->f3->clear('SESSION');
		// Render template
        $this->f3->set('title', 'Login');
        $this->f3->set('content', 'login.php');
        $this->renderTemplate();
	}

	// User authentication
	function auth() {
		// Reset previous error message, if any
		$this->f3->clear('message');
		// Form field validation
		$this->checkID();
		$this->password();
		if (isset($_SESSION['captcha']))
			$this->f3->code();
		if (!$this->f3->exists('message')) {
			// No input error; check values
			if (preg_match('/^brayan$/i',$_POST['userID']) &&
				preg_match('/^brayan$/i',$_POST['password'])) {
				// User ID is admin, password is admin - set session variable
				// Fat-Free auto-starts a session when you use F3::set() or
				// F3::get(). F3::clear() automatically destroys a session
				// variable or even an entire session
				$this->f3->set('SESSION.user',$_POST['userID']);
				// Return to home page; but now user is logged in
				$this->f3->reroute('/');
			}
			else
				$this->f3->set('message','Invalid user ID or password');
		}
		// Display the login page again
		$this->login();
	}

	// End the session
	function logout() {
		// Destroy the session
		$this->f3->clear('SESSION');
		// Redirect to Home page
		$this->f3->reroute('/');
	}
}