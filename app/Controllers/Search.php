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

		//Create the results variable, which will hold the results of the search
		$searchResults = NULL;

		//Checks the input to determine what search to do, ALL use the piece type

		//IF the arranger is empty and the title is empty, look for everything
		if (false) {
			$searchResults = $model -> all($temp);

		//Else if the title is empty, look for pieces by arranger
		} else if(false) {
			$searchResults = $model -> findPieceByArranger($temp);

		//Else look for piece by title
		} else {
			$searchResults = $model -> findPieceByTitle($temp);
		}


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