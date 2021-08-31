<?php 
namespace controllers;

use models\User;
use controllers\BaseController;


class AuthController extends BaseController {
    public function __construct()
    {
        parent::__construct();   
    }

    	// Validate user ID
	function checkID() {
        $this->f3->get('POST.username',
			function($value) {
				if (!\F3::exists('message')) {
					if (empty($value))
						\F3::set('message','El nombre de usuario no debe estar en blanco');
					elseif (strlen($value)>24)
						\F3::set('message','El nombre de usuario es muy largo');
					elseif (strlen($value)<3)
						\F3::set('message','El nombre de usuario es muy corto');
				}
				// Convert form field to lowercase
				$_POST['username']=strtolower($value);
			}
		);
	}

    // Validate password
	function password() {
		$this->f3->get('POST.password',
			function($value) {
				if (!\F3::exists('message')) {
					if (empty($value))
						\F3::set('message','Se debe especificar la contraseña');
					elseif (strlen($value)>24)
						\F3::set('message','Contraseña invalida');
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
		$user = new User($this->f3->DB);
        $user->load(['username=?', $_POST['username']]);
		if (!$this->f3->exists('message')) {
			// No input error; check values
			if (password_verify($_POST['password'], $user->password)) {
				// User ID is admin, password is admin - set session variable
				// Fat-Free auto-starts a session when you use F3::set() or
				// F3::get(). F3::clear() automatically destroys a session
				// variable or even an entire session
				$this->f3->set('SESSION.user',$_POST['username']);
				// Return to home page; but now user is logged in
				$this->f3->reroute('/');
			}
			else
				$this->f3->set('message','usuario o contraseña invalido');
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