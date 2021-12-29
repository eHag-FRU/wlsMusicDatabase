<?php

namespace App\Controllers;

use App\Models\music;

class View extends BaseController {

	public function getView($id) {

		$model = new music();

		return $model -> getPieceByID($id);

	}

	public function index($id) {


		$data = [
			'title' => 'View',
			'form' => this -> getView($id)
		];

		echo view('templates/header.php', $data);
		echo view('add.php', $data);
		echo view('templates/footer.php', $data);

	}
}





?>