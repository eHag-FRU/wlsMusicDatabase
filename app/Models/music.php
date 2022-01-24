<?php

namespace App\Models;

use CodeIgniter\Model;

class music extends Model {
    
    protected $table = 'piece';
    protected $primarykey = 'ID';

    protected $returntype = 'array';

    /**
    *    Function to find all pieces based on the type
    *    that is selected at the search page
    *
    *    @param  $arr -  Array of the form input
    *
    *    @return The search results
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
    *    A function to add a piece of music to the database
    *
    *    @param  $arr -  The array of POST form information
    *
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

    /**
    *   Gets the piece from the database and returns it
    *
    *   @param    $id -  The id of the piece
    *   @return   the result of the databse search in an array
    */
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



    public function pieceUpdate($arr) {

         //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        
        
    }


    /**
    *    A function to find a piece by title, arranger, composer,
	*	library number, year last played, and piece type.
    *
    *    @arguments array $arr  the array of POST form data from the search page
    *
    *    @return array The results of the search
    *
    */
    public function findPieceSearch($arr) {

        //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        // Defines the select part of the query: SELECT *
        $builder -> select('*');

		//Loops through each of the values in the array that hold the search criteria
		foreach($arr as $key => $value) {
			
			//Make the where statement match the key and 
			//value to the database collumn header, using a switch statement to ensure the proper where statement is used
			switch($key) {
			    case 'title':
                    $builder -> like('Title', $value);
                    break;
                case 'type':
                    $builder -> like('Type', $value);
                    break;
                case 'Arranger':
                    $builder -> like('Arranger', $value);
                    break;
                case 'composer':
                    $builder -> like('Composer', $value);
                    break;
                case 'LibNumber':
                    $builder -> like('LibNumber', $value);
                    break;
                case 'YearLastPlayed':
                    $builder -> like('Last_Played', $value);
                    break;
			};
			
		};

        //Runs and retrieves the query results
        $result = $builder -> get();

        //Return the results
        return $result -> getResultArray();
    }
}