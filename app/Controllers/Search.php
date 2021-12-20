<?php

namespace App\Controllers;

class Search extends BaseController {
	

	public function Search() {
		$temp = [];

		foreach($_POST['form'] as $key => $value) {
			$temp[$key] = esc($value);
		}

		$data = [
			'title' => 'Results',
			'form_data' => $temp,
		];

		echo view('templates/header.php', $data);
		echo view('results', $data);
		echo view('templates/footer.php');
	}
}

?>