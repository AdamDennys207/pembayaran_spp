<?php

class Siswa_model{
    private $db;
    private $table = 'siswa';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $query ="SELECT * FROM getAllSiswa";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getSiswa($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE pengguna_id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function selectAllSiswa()
    {
        $query = "CALL selectAllSiswa()";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function insertDataSiswa($data)
    {
        $query = "CALL insertDataSiswa(:nisn, :nis, :nama, :alamat, :telepon, :kelas_id, :pengguna_id, :pembayaran_id)";
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('kelas_id', $data['id_kelas']);
        $this->db->bind('pengguna_id', $data['id_pengguna']);
        $this->db->bind('pembayaran_id', $data['id_pembayaran']);
        return $this->db->rowCount();
    }

    public function updateSiswa($data)
    {
        $query = "UPDATE {$this->table} SET nis=:nis, nisn=:nisn, nama=:nama, alamat=:alamat, telepon=:telepon, kelas_id=:kelas_id, pembayaran_id=:pembayaran_id WHERE id_siswa=:id";
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('kelas_id', $data['kelas_id']);
        $this->db->bind('pembayaran_id', $data['pembayaran_id']);
        $this->db->bind('id', $data['id']);
        return $this->db->rowCount();
    }

    public function getSiswaById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_siswa=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function deleteDataSiswa()
    {
        $query = "DELETE FROM {$this->table} WHERE id_siswa= :id";
        $this->db->query($query);
        $this->db->bind('id', $_POST['id']);
        return $this->db->rowCount();
    }
}