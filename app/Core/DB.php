<?php 


require_once (LIBS.'DB/MysqliDb.php');

class DB 
{
    protected $db;

    public function connect()
    {
        $database = new MysqliDb (DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$database->connect())
        {
            $this->db = $database;
            return $this->db;
        }
        else{
            echo "error";
        }
    }


}