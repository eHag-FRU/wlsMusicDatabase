<?php

namespace App\Models;

use CodeIgniter\Model;

class music extends Model {
    
    protected $table = 'piece';
    protected $primarykey = 'ID';

    protected $returntype = 'array';

    /*
        Function to find all pieces based on the type
        that is selected at the search page

        @arguments array $arr  Array of the form input

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

        @arguments array $arr  The array of POST form information

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
            'Composer' => $arr['composer'],
            'LibNumber' => $arr['LibNumber'],
            'Type' => $arr['type'],
            'Last_Played' =>  $arr['Last_Played'],
        ];

        //Goes ahead and adds the piece to the database
        $builder -> insert($data);

        
    }



    /*
        A function to find a piece by the title

        @arguments array $arr  the array of POST form data from the search page

        @return array The results of the search

    */
    public function findPieceByTitle($arr) {

        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        // Defines the select part of the query: SELECT *
        $builder -> select('*');

        //Defines the where part of the query: WHERE {type}
        $builder -> where('Type', $arr['type']);

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

        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //select
        $builder -> select('*');

        //Defines the where part of the query: WHERE {type}
        $builder -> where('Type', $arr['type']);
        
        // Defines the where part of the query: WHERE {The arguments}
        $builder -> where('Arranger', $arr['Arranger']);




        //Runs and retrieves the query results
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }



    public function getPieceByID($id) {
        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //select
        $builder -> select('*');

        //Defines the where part of the query: WHERE {type}
        $builder -> where('Piece_ID', $id);



        //Runs and retrieves the query results
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }



    public function findPieceByArrangerAndTitle($arr) {
        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //select
        $builder -> select('*');

        //Defines the where part of the query: WHERE {like}
        $builder -> where('Title', $arr['title']);

        //Defines the SECOND where clause of the statement: {like}
        $builder -> like('Arranger', $arr['Arranger']);

        //Runs and retrieves the query results
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }
}