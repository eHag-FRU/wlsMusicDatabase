<?php

namespace App\Controllers;

use App\Models\music;

class Search extends BaseController {
	
	//Function to check inputs to find out what search to preform
	public function index() {
		
		//Array to hold form data
		$temp = [];

		//Cleanse all of the form data and put in temp[]
		foreach($_POST['form'] as $key => $value) {
			$temp[$key] = esc($value);
		}

		$model = new music();

		//Defining the data to be passed onto the view
		$data = [
			'results' => $model->all($temp),
			'title' => 'Results',
		];


		/*
			Stacks the view as follows

			header
			content
			footer
		*/
		
		echo view('templates/header.php', $data);
		echo view('results', $data);
		echo view('templates/footer.php');
	}	
}

?>