<?php

namespace App\Controllers;

use App\Models\Music;

class Edit extends BaseController {

	/**
	*	Takes the id, grabs the piece, and renders
	*	the view for the user to edit the details as needed.
	*
	*	@param   $id -  The ID of the piece
	*
	*/
	public function Edit($id) {

		//Initlizes a new model instance
		$model = new music();

		//Gets the piece by the id passed into the method
		$temp = $model -> getPieceByID($id);

		//Sets temp to be the first (position 0) piece, since there will only be one piece that is returned in the array
		$temp = $temp[0];

		//Sets up the title and the data that will be sent to the views
		$data = [
			'title' => 'View',
			'form' => $temp 
		];


		/*
			Displays the views in the following order

				header
				Edit
				footer
		*/
		echo view('templates/header.php', $data);
        echo view('edit', $data);
        echo view('templates/footer.php');
	}



	/**
	*	Function to post the update made by the user,
	*	then send them back to the search screen 
	*
	*/
	public function updatePiece() {
		
		//A temporary array to hold the filtered output
		$temp = [];

		//Variable to hold the ID of the piece to be updated
		$id = 0;

		//Makes a new model object to update the information
		$model = new music();

		//Cleanse all of the form data and put in temp[]
		foreach($_POST['form'] as $key => $value) {
			//Only grabs the non NULL values (the criteria the user submitted)
			//Does not add in the Piece_ID, this will be passed into the model method as a
			//separate argument to make the handling of the data less complex
			if (isset($value) && strcmp('Piece_ID', esc($key)) != 0) {
				$temp[$key] = esc($value);
			} else if (strcmp('Piece_ID', esc($key)) == 0) {  //This separates the ID 
				$id = esc($value);
			}
		}

		//Sends the information to the model to be updated in the database 
		$model -> pieceUpdate($id, $temp);

	}


}

?>