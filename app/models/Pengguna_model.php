<?php

class Pengguna_model{
    private $db;
    private $table = 'pengguna';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPengguna($data)
    {
        $query = "CALL getPengguna(:username, :password)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        return $this->db->single();
    }   

    public function selectAllPengguna()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getPenggunaById($id)
    {
        $query ="SELECT * FROM {$this->table} WHERE id_pengguna=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getPenggunaIdByUsername($username)
    {
        $query ="SELECT * FROM {$this->table} WHERE username=:username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function insertDataPengguna($data)
    {
        $query ="CALL insertDataPengguna(:username, :password, :role)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', $data['role']);
        return $this->db->rowCount();
    }

    public function updateUsernameById($data)
    {
        $query = "UPDATE {$this->table} SET username= :username WHERE id_pengguna= :id";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('id', $data['id']);
        return $this->db->rowCount();
    }
    
    public function updateDataPenggunaModel($data)
    {
        $query = "UPDATE {$this->table} SET username= :username WHERE id_pengguna= :id";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('id', $data['id_pengguna']);
        return $this->db->rowCount();
    }

    public function deleteDataPengguna()
    {
        $query = "DELETE FROM {$this->table} WHERE id_pengguna=:id";
        $this->db->query($query);
        $this->db->bind('id', $_POST['id']);
        return $this->db->rowCount();
    }
}