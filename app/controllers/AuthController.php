<?php

namespace controllers;

use Exception;
use models\User;
use PDOException;
use controllers\BaseController;

class AuthController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	// Validate user ID
	function checkID()
	{
		$this->f3->get(
			'POST.username',
			function ($value) {
				if (!\F3::exists('message')) {
					if (empty($value))
						\F3::set('message', 'El nombre de usuario no debe estar en blanco');
					elseif (strlen($value) > 24)
						\F3::set('message', 'El nombre de usuario es muy largo');
					elseif (strlen($value) < 3)
						\F3::set('message', 'El nombre de usuario es muy corto');
				}
				// Convert form field to lowercase
				$_POST['username'] = strtolower($value);
			}
		);
	}

	// Validate password
	function password()
	{
		$this->f3->get(
			'POST.password',
			function ($value) {
				if (!\F3::exists('message')) {
					if (empty($value))
						\F3::set('message', 'Se debe especificar la contraseña');
					elseif (strlen($value) > 24)
						\F3::set('message', 'Contraseña invalida');
				}
			}
		);
	}

	function login()
	{
		// Reset session in case someone else is logged in
		// $this->f3->clear('SESSION');
		// Render template
		$this->f3->set('title', '| Login');
		$this->f3->set('content', 'login.htm');
		$this->renderTemplate();
	}

	function register()
	{
		// Reset session in case someone else is logged in
		// $this->f3->clear('SESSION');
		// Render template
		$this->f3->set('title', ' | Register');
		$this->f3->set('content', 'register.htm');
		$this->renderTemplate();
	}
	function createUser()
	{
		// Reset session in case someone else is logged in
		// $this->f3->clear('SESSION');
		// Render template
		if (
			$this->f3->get('POST.password') == '' && $this->f3->get('POST.password2') == ''
			&& $this->f3->get('POST.username') == '' && $this->f3->get('POST.email') == ''
			&& $this->f3->get('POST.names') == ''
		) {
			$this->f3->set('message', 'Debe rellenar todo el formulario');
		} elseif ($this->f3->get('POST.password') != $this->f3->get('POST.password2')) {
			$this->f3->set('message', 'Las contraseñas no coinciden');
		} else {
			try {
				$user = new User($this->f3->DB);
				$password = password_hash($this->f3->get('POST.password'), PASSWORD_DEFAULT); //input 
				$user->username = $this->f3->get('POST.username');
				$user->name = $this->f3->get('POST.names');
				$user->email = $this->f3->get('POST.email');
				$user->password = $password;
				$user->save();
				$this->f3->set('SESSION.user', $user->cast());
				$this->f3->reroute('/');
			} catch(PDOException $e) {
				$err=$e->errorInfo;
				// $this->f3->set('message', $err[2]);
				 $this->f3->set('message', 'El email o usuario ya esta en uso ');
			}
		
		}
		$this->register();
	}

	function changePassword()
	{

		if ($this->f3->get('SESSION.user') ){
			$this->f3->set('title', ' | Change Password');
			$this->f3->set('content', 'changePassword.htm');
			$this->renderTemplate();
		}else{
			$this->f3->reroute('/');
		}
			
	}

	function changePasswordAction()
	{

		if ($this->f3->get('SESSION.user') ){
			if (
				$this->f3->get('POST.password') == '' && $this->f3->get('POST.password2') == ''
			) {
				$this->f3->set('message', 'Debe rellenar todo el formulario');
			} elseif ($this->f3->get('POST.password') != $this->f3->get('POST.password2')) {
				$this->f3->set('message', 'Las contraseñas no coinciden');
			} else {
				try {
					$user = new User($this->f3->DB);
					$user->load(array('username=?', $this->f3->get('SESSION.user.username')));
					
					$user->password = password_hash($this->f3->get('POST.password'), PASSWORD_DEFAULT); //input
					$user->update();
					$this->f3->set('SESSION.user', $user->cast());
					$this->f3->reroute('/');
				} catch(PDOException $e) {
					$err=$e->errorInfo;
					$this->f3->set('message', $err[2]);
				}
			}
		}else{
			$this->f3->reroute('/');
		}		
		$this->changePassword();
	}


	// User authentication
	function auth()
	{
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
				$this->f3->set('SESSION.user', $user->cast());
				// Return to home page; but now user is logged in
				$this->f3->reroute('/');
			} else
				$this->f3->set('message', 'usuario o contraseña invalido');
		}
		// Display the login page again
		$this->login();
	}

	// End the session
	function logout()
	{
		// Destroy the session
		$this->f3->clear('SESSION');
		// Redirect to Home page
		$this->f3->reroute('/');
	}
}
