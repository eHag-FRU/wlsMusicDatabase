<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //The CSS file for the Search page, general configuration 
        $CSS = ("assets/CSS/index.css");

        //The data array to be passed into the view to be used
        $data = [
          'title' => 'Search',
          'CSS' => $CSS,
        ];

        echo view('templates/header.php', $data);
        echo view('index', $data);
        echo view('templates/footer.php');
    }

    public function Search() {
        return view('welcome_message');
    }
}
