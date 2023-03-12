<?php

namespace App\Core;


abstract class BaseSQL
{
    private $pdo;
    private $table;


    public function __construct()
    {
        try{
            //Connexion à la base de données
            $this->pdo = new \PDO( DBDRIVER.":host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME ,DBUSER , DBPWD );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\Exception $e){
            die("Erreur SQL".$e->getMessage());
        }
        //Récupérer le nom de la table :
        // -> prefixe + nom de la classe
        $classExploded = explode("\\",get_called_class());
        $this->table = DBPREFIXE.strtolower(end($classExploded));
    }
    /**
     * @param mixed $id
     */
    public function setId($id): object
    {
        $sql = "SELECT * FROM ".$this->table. " WHERE id=:id ";
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute( ["id"=>$id] );
        return $queryPrepared->fetchObject(get_called_class());
    }
    public function getAll(): object
    {
        $sql = "SELECT * FROM ".$this->table;
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();
        return $queryPrepared->fetchObject(get_called_class());
    }
    public function deleteId($id): void
    {
        $sql = "DELETE  FROM ".$this->table. " WHERE id=:id ";
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute( ["id"=>$id] );
    }


    protected function save(): void
    {

        $columns  = get_object_vars($this);
        $varsToExclude = get_class_vars(get_class());
        var_dump(array_diff_key($columns, $varsToExclude));
        $columns = array_diff_key($columns, $varsToExclude);
        $columns = array_filter($columns);
//        var_dump($columns);


        if( !is_null($this->getId()) ){
            foreach ($columns as $key=>$value){
                $setUpdate[]=$key."=:".$key;
            }
            $sql = "UPDATE ".$this->table." SET ".implode(",",$setUpdate)." WHERE id=".$this->getId();
        }else{
            $sql = "INSERT INTO ".$this->table." (".implode(",", array_keys($columns)).")
            VALUES (:".implode(",:", array_keys($columns)).")";
        }

        $queryPrepared = $this->pdo->prepare($sql);
        var_dump($queryPrepared);

        $queryPrepared->execute( $columns );



    }

}