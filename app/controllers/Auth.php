<?php
class Auth extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('auth/index', $data);
        $this->view('templates/footer', $data);
    }

    public function userValidate()
    {
        $pengguna =$this->model('Pengguna_model')->getPengguna($_POST);
        $petugas = $this->model('Petugas_model')->getPetugas($pengguna['id_pengguna']);
        $siswa = $this->model('Siswa_model')->getSiswa($pengguna['id_pengguna']);

        
        if (!$petugas && !$siswa){
            Redirect::to('auth');
        }
        if ($petugas){
            Redirect::to('petugas');

        } else if ($pengguna['id_pengguna'] == 1) {
            Redirect::to('admin');
        }  
        if ($siswa){
            Redirect::to('siswa');
        }        
    }
}