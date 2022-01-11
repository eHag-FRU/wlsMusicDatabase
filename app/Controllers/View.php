<?php

namespace App\Controllers;

use App\Models\music;

class View extends BaseController {

	public function view($id) {
		$model = new music();

		$temp = $model -> getPieceByID($id);

		

		$data = [
			'title' => 'View',
		];

		echo view('templates/header.php', $data);
        echo view('view', $data);
        echo view('templates/footer.php');

	}
}





?>