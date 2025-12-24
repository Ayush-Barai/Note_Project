<?php
class Database{
    public $connection; // this is the connection for database
    public $statement;
    public function __construct($config , $username = 'root' , $password = 'Ayush@0411'){
        // $host = 'localhost';        
        // $dbname = 'myapp';
        // $username = 'root'; 
        // $password = 'Ayush@0411'; 

       
        $query = http_build_query($config,'',';');
        $dsn = ("mysql:". $query);
        // dd($dsn);
        $this->connection = new PDO($dsn , $username ,  $password);


        // $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        // $this->connection = new PDO($dsn, $username, $password , [
        //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        // ]);

        
    }

    
    public function  query($query , $params = []){
        
        $this->statement = $this->connection->prepare($query);
        
        $this->statement->execute($params);
        
        return $this; 
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function find()
    {
        return $this->statement->fetch();
    }
    
    public function findOrFail()
    {
        $result = $this->find();
        if (! $result) {
            abort(404);
        }
        return $result;
    }

}
