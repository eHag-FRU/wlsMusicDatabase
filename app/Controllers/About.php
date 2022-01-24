<?php

namespace App\Controllers;


class About extends BaseController {

	public function index() {

		$data = [

			'title' => 'About',
		];


		/*
			Renders the templates in this order

				Header
				About
				Footer
		*/
		echo view('templates/Header.php', $data);
		echo view('about.php');
		echo view('templates/Footer.php');


	}

}





?>