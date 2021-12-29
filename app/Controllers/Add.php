<?php

namespace App\Controllers;

use App\Models\Music;

class Add extends BaseController {

	

	public function index() {

		$data = [
			'title' => 'Add'
		];

		echo view('templates/header.php', $data);
        echo view('add', $data);
        echo view('templates/footer.php');
	}

	public function addPiece() {
		 $model = new Music();

		//Array to hold form data
		$temp = [];

		//Cleanse all of the form data and put in temp[]
		foreach($_POST['form'] as $key => $value) {
			$temp[$key] = esc($value);
		}

		//Calls the function in the model with the already cleansed input
		$model -> add($temp);

		//Defines the data to be passed to the view
        $data = [
            'title' => 'Add'
        ];

        //Sends the user back to the add page to add another piece
        echo view('templates/header.php', $data);
        echo view('add', $data);
        echo view('templates/footer.php');
	}


}

?>