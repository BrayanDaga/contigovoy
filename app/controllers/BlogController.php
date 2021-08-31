<?php

namespace controllers;

use models\Blog;
use Carbon\Carbon;
use controllers\BaseController;


class BlogController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index(): void
	{
		$this->f3->set('title', '| Blog');
		$iblog = new Blog($this->f3->DB);
		$blogs = $iblog->find();
		$this->f3->set('blogs', $blogs);
		$this->f3->set('content', 'blog/index.php');
		$this->renderTemplate();
	}
	public function show(): void
	{
		$this->f3->set('title', '| Blog');
		$blog = new Blog($this->f3->DB);
		$blog->load(['slug=?', $this->f3->get('PARAMS.slug')]);
		$this->f3->set('blog', $blog);
		$this->f3->set('content', 'blog/show.php');
		$this->renderTemplate();
	}
	public function create(): void
	{
		if ($this->f3->get('SESSION.user')) {
			$this->f3->set('title', '| Blog');
			$this->f3->set('content', 'blog/create.php');
			$this->f3->set('scripts', 'blogcreate.php');
			$this->renderTemplate();
		} else {
			$this->f3->reroute('/login');
		}
	}

	public function store(): void
	{
		if ($this->f3->get('SESSION.user')) {
			if ($_POST['title'] == "") {
				$this->f3->set('message', 'El titulo no debe estar en blanco');
			} elseif ($_POST['body'] == "") {
				$this->f3->set('message', 'El blog no debe estar en blanco');
			} else {
				$title = $_POST['title'];
				$body = $_POST['body'];
				$slug = strtr(strtolower($title), " ", "-");
				$excerpt = substr($body, 0, 200);

				$blog = new Blog($this->f3->DB);
				$blog->title = $title;
				$blog->body = $body;
				$blog->slug = $slug;
				$blog->excerpt =  $excerpt;

				date_default_timezone_set('America/Lima');

				$blog->created_at = Carbon::now()->toDateTimeString();
				$blog->save();
				$this->f3->reroute('/blog', false);
			}
		} else {
			$this->f3->reroute('/login', false);
		}
		$this->create();
	}

	public function edit(): void
	{
		if ($this->f3->get('SESSION.user')) {
			$blog = new Blog($this->f3->DB);
			$blog->load(['slug=?', $this->f3->get('PARAMS.slug')]);
			$this->f3->set('blog', $blog);
			$this->f3->set('title', '| Blog');
			$this->f3->set('content', 'blog/edit.php');
			$this->f3->set('scripts', 'blogcreate.php');
			$this->renderTemplate();
		} else {
			$this->f3->reroute('/login');
		}
	}


	public function update(): void
	{

		if ($this->f3->get('SESSION.user')) {
			if ($_POST['title'] == "") {
				$this->f3->set('message', 'El titulo no debe estar en blanco');
			} elseif ($_POST['body'] == "") {
				$this->f3->set('message', 'El blog no debe estar en blanco');
			} else {
				$blog = new Blog($this->f3->DB);
				$blog->load(['slug=?', $this->f3->get('PARAMS.slug')]);

				$title = $_POST['title'];
				$body = $_POST['body'];
				$slug = strtr(strtolower($title), " ", "-");
				$excerpt = substr($body, 0, 200);

				$blog->title = $title;
				$blog->body = $body;
				$blog->slug = $slug;
				$blog->excerpt =  $excerpt;
				date_default_timezone_set('America/Lima');

				$blog->created_at = Carbon::now()->toDateTimeString();
				$blog->save();
				$this->f3->reroute('/blog', false);
			}
		} else {
			$this->f3->reroute('/login', false);
		}
		$this->edit();
	}
}
