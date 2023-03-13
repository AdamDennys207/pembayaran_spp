<?php
class Kelas_model
{
    private $db;
    private $table = 'kelas';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function selectAllKelas()
    {
        $query = "CALL selectAllKelas()";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getKelasById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_kelas=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    
    public function insertDataKelas()
    {
        $query = "CALL insertDataKelas(:nama, :kompetensi_keahlian)";
        $this->db->query($query);
        $this->db->bind('nama', $_POST['nama']);
        $this->db->bind('kompetensi_keahlian', $_POST['kompetensi_keahlian']);
        return $this->db->rowCount();
    }

    public function updateDataKelas()
    {
        $query = "UPDATE {$this->table} SET nama= :nama, kompetensi_keahlian= :komp WHERE id_kelas= :id";
        $this->db->query($query);
        $this->db->bind('nama', $_POST['nama']); 
        $this->db->bind('komp', $_POST['komp']);
        $this->db->bind('id', $_POST['id']);
        return $this->db->rowCount();
    }

    public function deleteDataKelas()
    {
        $query ="DELETE FROM {$this->table} WHERE id_kelas=:id";
        $this->db->query($query);
        $this->db->bind('id', $_POST['id']);
        return $this->db->rowCount();
    }
}
