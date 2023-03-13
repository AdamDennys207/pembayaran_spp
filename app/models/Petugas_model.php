<?php

class Petugas_model{
    private $db;
    private $table = 'petugas';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPetugas($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE pengguna_id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function selectAllPetugas()
    {
            $query = "CALL selectAllPetugas()";
            $this->db->query($query);
            return $this->db->setResults();
    }
}