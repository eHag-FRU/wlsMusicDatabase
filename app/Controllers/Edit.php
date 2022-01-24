<?php

namespace App\Controllers;

use App\Models\Music;

class Edit extends BaseController {

	//Takes the id and makes edits to the record in the database
	public function Edit($id) {

		$model = new music();

		$temp = $model -> getPieceByID($id);

		$temp = $temp[0];


		$data = [
			'title' => 'View',
			'form' => $temp 
		];

		echo view('templates/header.php', $data);
        echo view('edit', $data);
        echo view('templates/footer.php');
	}

	public function updatePiece() {
		
		//A temporary array to hold the filtered output
		$temp = [];


		//Makes a new model object to update the information
		$model = new music();

		//Cleanse all of the form data and put in temp[]
		foreach($_POST['form'] as $key => $value) {
			//Only grabs the non NULL values (the criteria the user submitted)
			if (isset($value)) {
				$temp[$key] = esc($value);
			}
		}

		return $temp;

	}


}

?>