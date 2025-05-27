<?php

namespace core;
use PDO;
use PDOException;


// class Database{
//     private $conection;
//     private $statement;

//     public function __construct($config,$dbName='root',$dbPass='33334444qq')
//     {
        
//         $dsn = 'mysql:'.http_build_query($config, '', ';');
//         $this->conection= new Pdo($dsn,$dbName ,$dbPass,[
//             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//         ]); 
//     }
  
//     public function query ($query,$params=[])
//     {

//         $this->statement =$this->conection->prepare($query);
//         $this->statement->execute($params);
//         return  $this;
    
//     }
    
//     public function fetch()
//     {
//         return $this->statement->fetch();
//     }

//     public function findOrFail()
//     {
//         $result = $this->fetch();
 
//         if(! $result){
//          abort(404);
//         } 


//         return $result;
//     }


//     public function fetchAll()
//     {
//         return $this->statement->fetchAll();
//     }

// }

class Database
{
    private $conection;
    private $statement;

    public function __construct($config, $dbName = 'root', $dbPass = 'AliAbd739252434')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->conection = new Pdo($dsn, $dbName, $dbPass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        try {
            $this->statement = $this->conection->prepare($query);
            $this->statement->execute($params);
            return $this;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    
    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->fetch();

        if (! $result) {
            abort(404);
        }


        return $result;
    }

    public function lastId(){
        return $this->conection->lastInsertId();
    }


    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }
}