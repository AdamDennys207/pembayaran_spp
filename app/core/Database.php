<?php

class Database
{
    private $dbh, $stmt;
    private $host = HOST;
    private $dbname = DBNAME;
    private $username = USER;
    private $password = PASS;

    public function __construct()
    {
        $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        try {
            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $this->dbh = new PDO($dns, $this->username, $this->password, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                case is_int($type):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($type):
                    $type = PDO::PARAM_BOOL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function setResults()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }
}
