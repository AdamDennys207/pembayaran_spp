<?php
class Spp_model {

    private $db;
    private $table = 'pembayaran';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function selectAllPembayaran()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getPembayaranById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_pembayaran=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateDataPembayaran()
    {
        $query ="UPDATE {$this->table} SET tahun_ajaran= :ajaran, nominal= :nom WHERE id_pembayaran= :id";
        $this->db->query($query);
        $this->db->bind('ajaran', $_POST['ajaran']);
        $this->db->bind('nom', $_POST['nom']);
        $this->db->bind('id', $_POST['id']);
        return $this->db->rowCount();
    }

    public function insertDataPembayaran()
    {
        $query ="CALL insertDataPembayaran(:tahun_ajaran, :nominal)";
        $this->db->query($query);
        $this->db->bind('tahun_ajaran', $_POST['tahun_ajaran']);
        $this->db->bind('nominal', $_POST['nominal']);
        return $this->db->rowCount();
    }

    public function deleteDataPembayaran()
    {
        $query = "DELETE FROM {$this->table} WHERE id_pembayaran=:id";
        $this->db->query($query);
        $this->db->bind('id', $_POST['id']);
        return $this->db->rowCount();
    }
}