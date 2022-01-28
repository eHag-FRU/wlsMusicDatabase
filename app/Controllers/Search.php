<?php

namespace App\Controllers;

use App\Models\music;

class Search extends BaseController {

	//Function to check inputs to find out what search to preform
	public function index() {
		
		//Double checks if the form has been posted, if not then redirection happens
		//This prevents the user from seeing any error screens
		if (!array_key_exists('form', $_POST)){
			$temp = ['title' => 'Search'];

			echo view('templates/header.php', $temp );
			echo view('index.php', $temp);
			echo view('templates/footer.php');

			exit();
		}
		


		//Array to hold form data
		$temp = [];



		//Cleanse all of the form data and put in temp[]
		foreach($_POST['form'] as $key => $value) {
			//Only grabs the non NULL values (the criteria the user searched for)
			if ($value != NULL) {
				$temp[$key] = esc($value);
			}
			
		}


		//Creates a model instance
		$model = new music();


		//Create the results variable, which will hold the results of the search
		$searchResults = $model -> findPieceSearch($temp);



		//Defining the data to be passed onto the view
		$data = [
			'results' => $searchResults,
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