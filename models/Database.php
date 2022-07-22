<?php

include_once CONF.'db_const.php';


class Database {

    private $db_name;
    private $db_host;
    private $db_user;
    private $db_passwrd;
    private $pdo;

   public function __construct($db_name = DB_NAME, $db_host= DB_HOST, $db_user = DB_USER, $db_passwrd = DB_PASSWRD){
    $this->db_name = $db_name;
    $this->db_host = $db_host;
    $this->db_user = $db_user;
    $this->db_passwrd = $db_passwrd;
   }

   private function getPDO() {
    if($this->pdo === null){
        $pdo = new PDO("mysql:dbname=".$this->db_name."; host=".$this->db_host, $this->db_user, $this->db_passwrd);
        $this->pdo = $pdo;
    }
    return $this->pdo;
    }
  

    public function query($statement){
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }


}