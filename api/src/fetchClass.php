<?php
namespace api\src;
use api\mysql\DBClass;

class fetchClass
{
    protected $db;
    public function __construct()
    {
        $db = new DBClass();
        $this->db = $db->getConnection();
    }

    public function getAll($table)
    {
        try{
        $query = $this->db->prepare("SELECT * FROM ".$table);
        $query->execute();
        $row = $query->fetch(\PDO::FETCH_OBJ);
        }catch(\PDOException  $e ) {
            return "Error: " . $e;
        }
        return $row;
    }
    public function getByParams($table,$column)
    {

    }

}