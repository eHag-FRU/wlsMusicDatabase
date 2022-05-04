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
    *    @param  array $arr  Array of the form input
    *
    *    @return array $result  Returns the results of the search
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
    *    @param  array $arr  The array of POST form information
    *
    *
    *    @return    NONE
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
    *   @param   int  $id  The id of the piece
    *   @return   array $result  the result of the database search in an array
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

    /**
    *   Sets the last year played to the current server clock's year
    *
    *   @param  int   $id  The ID of the piece to update the year last played
    */

    public function playedUpdate($id) {
          //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //Gets the current year in PHP to be used in setting the last played
        // FIXME: Fix so the actual year is returned and used
        $year = date("Y");

        //Sets the Last_Played to the servers current year on the clock
        $builder -> set('Last_Played', $year);

        //Sets the where, this specifies the piece to update
        $builder -> where('Piece_ID', $id);
    }




    public function pieceUpdate($id, $arr) {

         //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //Sets the where, this specifies the piece to update
        $builder -> where('Piece_ID', $id);
        
        //Blank data array to hold the form data passed in
        $data = [];

        //Loops through each of the values in the array that hold the edited data
		foreach($arr as $key => $value) {
			
			//Make the where statement match the key and 
			//value to the database collumn header, using a switch statement to ensure the proper where statement is used
			switch($key) {
			    case 'title':
                    $data['Title'] = $arr['title'];
                    break;
                case 'type':
                    $data['Type'] =  $arr['Type'];
                    break;
                case 'Arranger':
                    $data['Arranger'] = $arr['Arranger'];
                    break;
                case 'composer':
                    $data['Composer'] = $arr['composer'];
                    break;
                case 'LibNumber':
                    $data['LibNumber'] = $arr['LibNumber'];
                    break;
                case 'YearLastPlayed':
                    $data['Last_Played'] = $arr['Last_Played'];
                    break;
                case 'Piece_ID':
                    $data['Piece_ID'] = $arr['Piece_ID'];
                    break;
			};
        }

        //Sets each of the fields to the corrisponding value
        foreach ($data as $key => $value) {
            $builder -> set($key, $value);
        }

        //Specifies what information to update
        $builder -> update();
    }


    /**
    *    Function that deletes a piece from the database based on the supplied piece ID
    *
    *   @param  int  $id   The id of the piece to be deleted 
    */

    public function deletePiece($id) {

         //Connects to the default (and only), database
        $db = \Config\Database::connect();

        //Sets up a Query Builder around the DB in the table Piece
        $builder = $db -> table('piece');

        //Sets the where, this specifies the piece to update
        $builder -> where('Piece_ID', $id);
        
        //Deletes the piece from the table
        $builder -> delete();


    }


    /**
    *    A function to find a piece by title, arranger, composer,
	*	library number, year last played, and piece type.
    *
    *    @arguments array $arr  the array of POST form data from the search page
    *
    *    @return array  array The results of the search
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