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

    //TODO check chars and type

    public function getAll($table = '',$column = array())
    {

        if(empty($column)){
            return false;
        }
        foreach ($column as $key => $value){
            if(!isset($params)){
                $params = $key.'='.$value;
            }else{
                $params .= ' AND '.$key.'='.$value;
            }
        }
        try{
        $query = $this->db->prepare("SELECT * FROM ".$table ." WHERE ".$params);
        $query->execute();
        $row = $query->fetch(\PDO::FETCH_ASSOC);
        }catch(\PDOException  $e ) {
           return false;
        }
        return $row;
    }
}