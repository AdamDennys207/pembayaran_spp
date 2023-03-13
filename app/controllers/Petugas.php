<?php
class Petugas extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Petugas';
        $this->view('templates/header', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer', $data);
    }
}