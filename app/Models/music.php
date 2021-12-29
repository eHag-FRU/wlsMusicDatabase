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

    /*
        Function to find all pieces based on the type
        that is selected at the search page

        @arguments $arr - Array of the form input

        @return The search results
    */
    public function all($arr) {
        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');
        
        //Where type is of the type selected
        $builder -> where('Type', $arr['type']);

        //Gets the results and stores them in results var
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }



    /*
        A function to add a piece of music to the database

        @arguments arr - The array of POST form information

    */
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



    /*
        A fucntion to find a piece by the title

        @arguments $arr - the array of POST form data from the search page

        @return The results of the search

    */
    public function findPieceByTitle($arr) {

        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        // Defines the select part of the query: SELECT *
        $builder -> select('*');

        // Defines the where and like part of the query: WHERE {The First Argument} LIKE {The Second Argument}
        $builder -> like('Title', $arr['title']);


        //Runs and retrieves the query results
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }




    /*
        A function to find pieces made by a specified Arranger

        @arguments $arr - the POST form data from the search page

        @return The search results
    */
    public function findPieceByArranger($arr) {
        $arranger = $arr['Arranger'];

        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        // Defines the where part of the query: WHERE {The arguments}
        $builder -> where('Arranger', $arranger);


        //Runs and retrieves the query results
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }
}