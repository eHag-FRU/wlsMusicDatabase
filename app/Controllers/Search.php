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
			$temp[$key] = esc($value);
		}

		$model = new music();


		//Create the results variable, which will hold the results of the search
		$searchResults = NULL;



		//Checks the input to determine what search to do, ALL use the piece type

		//IF the arranger is empty and the title is empty, look for everything
		if ($temp['title'] == NULL && $temp['Arranger'] == NULL) {
			$searchResults = $model -> all($temp);

		//Else if the title is empty, look for pieces by arranger
		} else if($temp['title'] == NULL) {
			$searchResults = $model -> findPieceByArranger($temp);

		//Else if the arranger is empty look for piece by title
		} else if ($temp['Arranger'] == NULL){
			$searchResults = $model -> findPieceByTitle($temp);

		//Else look for the piece by both arranger and title
		} else {
			$searchResults = $model -> findPieceByArrangerAndTitle($temp);
		}


		switch() {
			case ($temp['title'] == NULL && $temp['Arranger'] == NULL && $temp['Last_Played'] == NULL && $temp['LibNumber'] == NULL):
				$searchResults = $model -> all($temp);
				break;
			case ($temp['title'] == NULL && $temp['Last_Played'] == NULL && $temp['LibNumber'] == NULL):
				
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