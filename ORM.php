<?php
require 'appconf.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ORM
 *
 * @author gehad
 */
class ORM {
    //put your code here
    
    static $conn;
    private $dbconn;
    protected $table;


    static function getInstance(){
        if(self::$conn == null){
            self::$conn = new ORM();
        }
        return self::$conn;
    }
    
    protected function __construct(){
        
        extract($GLOBALS['conf']);
        $this->dbconn = new mysqli($host, $username, $password,$db_name);
        if ($this->dbconn->connect_error) {
            die("Connection failed: " . $this->dbconn->connect_error);
        }
    }
    
    function getConnection(){
        return $this->dbconn;
    }
    
    function setTable($table){
        $this->table = $table;

    }
//===============================================================================//
    function insert($data){
        $query = "insert into $this->table set ";
        foreach ($data as $col => $value) {
            $query .= $col."= '".$value."', ";
            
        }
        $query[strlen($query)-2]=" ";
        $state = $this->dbconn->query($query);
        if(! $state){
            return $this->dbconn->error;
        }

        return $this->dbconn->affected_rows;

    }
//==============================================================================//
    function selectall()
    {
        
            $query = 'select * from '.$this->table.';';
            $result = $this->dbconn->query($query);
            return $result;
        

    }
//==============================================================================//
    function select($columns,$data){
        if ($columns=="*") {
            $query="select $columns from $this->table where ";
            foreach ($data as $col => $value) {
                $query .= $col."= '".$value."' and ";
            }
            $length=((strlen($query))-4);
            $query=substr($query,0,$length );
            $state = $this->dbconn->query($query);
            return $state;
        }

        elseif ($data=="") {
            //select column_name from table_name;
            $column=implode(",", $columns);
            $query = "select $column from $this->table ";
            $state = $this->dbconn->query($query);
            $return=array();
            while($result =$state->fetch_array()) {
                for ($i=0; $i <count($columns); $i++) { 
                    $return[]=$result[$columns[$i]];
                }
            }
            $return_value=implode(',',$return);
            if(!$state){
                return $this->dbconn->error;
            }
            return $return_value;

        }

        else{
            //select column_name from table_name where;
            $query = "select $columns from $this->table where ";
            foreach ($data as $col => $value) {
                $query .= $col."= '".$value."', ";    
            }
            $query[strlen($query)-2]=" ";
            $state = $this->dbconn->query($query);
            if(! $state){
                return $this->dbconn->error;
            }
        }

        return $state->fetch_assoc()[$columns];

    }
//==================================================================================================//
    function delete($data)
    {
        $query = "delete from $this->table where ";
        foreach ($data as $col => $value) {
            $query .= $col."= '".$value."', ";
            
        }
        $query[strlen($query)-2]=" ";
        $state = $this->dbconn->query($query);
        if(! $state){
            return $this->dbconn->error;
        }

        return $this->dbconn->affected_rows;            
    }
//==================================================================================================//
    function update($data,$condition)
    {
        $query="update $this->table set ";
        foreach ($data as $col => $value) {
            $query.=$col."= '".$value."', ";
        }
        $query[strlen($query)-2]=" ";
        $query.="where ";
        foreach ($condition as $col => $value) {
            $query .= $col."= '".$value."', ";     
        }
        $query[strlen($query)-2]=" ";       
        $state = $this->dbconn->query($query);
        if(! $state){
            return $this->dbconn->error;
        }

        return $this->dbconn->affected_rows;
    }

}
