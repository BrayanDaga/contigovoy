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
			$blog = new Blog($this->f3->DB);
			$blog->title = $_POST['title'];
			$blog->slug = $_POST['slug'];
			$blog->body = $_POST['body'];
			$blog->excerpt =  substr($_POST['body'], 0, 200);
			$blog->created_at = Carbon::now()->toDateTimeString();
			$blog->save();
			$this->f3->reroute('/blog', false);
		} else {
			$this->f3->reroute('/login', false);
		}
	}
	// public function index(): void {
	// 	$iblog = new Blog($this->f3->DB);
	// 	$blogs = $iblog->find();
	//     $userTimezone = 'America/Lima';
	//     $userLanguage = 'es';
	//     Carbon::setLocale('es');


	// 	echo '<pre>';
	//     echo Carbon::parse('2021-01-27 16:34:42 ','America/Lima')->toFormattedDateString(). "\n";
	// 	foreach($blogs as $blog) {
	// 		echo "ID: {$blog->id}\n";
	// 		echo "Title: {$blog->title}\n";
	// 		echo "Slug: {$blog->slug}\n";
	// 		echo "Body: {$blog->body}\n";
	// 		echo "Created At: ". Carbon::parse( $blog->created_at,'America/Lima')->diffForHumans()   ."\n";
	// 		echo "--------------------------\n";
	// 	}
	// 	echo '</pre>';
	// }
}
