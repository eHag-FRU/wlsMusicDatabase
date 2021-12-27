<?php

namespace App\Models;

use CodeIgniter\Model;

class music extends Model {
    
    protected $table = 'piece';
    protected $primarykey = 'ID';

    protected $returntype = 'array';


    public function search($arr) {
        $title = $arr['title'];

        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //Returns the results from the query: SELECT * FROM PIECE
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }
}