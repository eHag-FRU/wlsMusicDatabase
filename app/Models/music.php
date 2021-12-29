<?php

namespace App\Models;

use CodeIgniter\Model;

class music extends Model {
    
    protected $table = 'piece';
    protected $primarykey = 'ID';

    protected $returntype = 'array';


    /*public function search($arr) {
        $title = $arr['title'];

        if (strcasecmp($title, '') == 0) {
            
            //Connects to the default (and only), database
            $db = \Config\Database::connect();

            //Sets up a Query Builder around the DB in the table Piece
            $builder = $db -> table('piece');

            //Returns the results from the query: SELECT * FROM PIECE
            $result = $builder -> get();

            //Return the results
            return $result -> getResultArray();
        } else if (isSet($title)) {

        }

    }*/

    public function all() {
        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //Returns the results from the query: SELECT * FROM PIECE
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }

    public function add($arr) {
        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //Interception and change of the piece type if it is marked as Marching/Pep to Marching when put in the database
        if ($arr['type'] == 'Marching/Pep') {
            $arr['type'] = 'Marching';
        };

        //All of the column data being bound before the insertion is to take place
        $data = [
            'Title' => $arr['title'] ,
            'Arranger' => $arr['Arranger'] ,
            'Type' => $arr['type'],
            'Last_Played' =>  $arr['Last_Played'],
        ];

        //Goes ahead and adds the piece to the database
        $builder -> insert($data);

        //Overwrites the data variable to be used to generate the blank add page when the add is done.
        $data = [
            'title' => 'Add'
        ];

        //Sends the user back to the add page to add another piece
        echo view('templates/header.php', $data);
        echo view('add', $data);
        echo view('templates/footer.php');
    }

    public function findPieceByTitle($arr) {
        $title = $arr['title'];

        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        // Defines the select part of the query: SELECT {The arguments}
        $builder -> select('Title');

        // Defines the where part of the query: WHERE {The arguments}
        $builder -> where('Title', $title);


        //Runs and retrieves the query results
        $result -> get();

        //Return the results
        return $result -> getResultArray();
    }
}