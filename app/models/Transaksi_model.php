<?php
class Transaksi_model {

    private $db;
    private $table = 'transaksi';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function selectAllTransaksi()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        return $this->db->setResults();
    }
}