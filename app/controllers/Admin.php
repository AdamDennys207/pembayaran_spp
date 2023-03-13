<?php
class Admin extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Admin';
        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer', $data);
    }

    public function form_datasiswa()
    {
        $data['title'] = 'Halaman Data Siswa';
        $data['siswa'] = $this->model('Siswa_model')->selectAllSiswa();
        $data['kelas'] = $this->model('Kelas_model')->selectAllKelas();
        $data['getAllSiswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['pembayaran'] = $this->model('Spp_model')->selectAllPembayaran();
        $this->view('templates/header', $data);
        $this->view('admin/form_datasiswa', $data);
        $this->view('templates/footer', $data);
    }

    public function create_datasiswa()
    {
        $data['title'] = 'Halaman Menambahkan Data Siswa';
        $data['siswa'] = $this->model('Siswa_model')->selectAllSiswa();
        $data['pengguna'] =$this->model('Pengguna_model')->selectAllPengguna();
        $data['kelas'] = $this->model('Kelas_model')->selectAllKelas();
        $data['getAllSiswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['pembayaran'] = $this->model('Spp_model')->selectAllPembayaran();
        $this->view('templates/header', $data);
        $this->view('admin/create_datasiswa', $data);
        $this->view('templates/footer', $data);
    }
    
    public function form_datakelas()
    {
        $data['title'] = 'Halaman Data Kelas';
        $data['kelas'] = $this->model('Kelas_model')->selectAllKelas();
        $this->view('templates/header', $data);
        $this->view('admin/form_datakelas', $data);
        $this->view('templates/footer', $data);
    }

    public function form_datapengguna()
    {
        $data['title'] = 'Halaman Data Pengguna';
        $data['role'] = [
            'Admin', 'Petugas', 'Siswa',
        ];
        $data['pengguna'] = $this->model('Pengguna_model')->selectAllPengguna();
        $this->view('templates/header', $data);
        $this->view('admin/form_datapengguna', $data);
        $this->view('templates/footer', $data);
    }
    
    public function form_dataptgs()
    {
        $data['title'] = 'Halaman Data Petugas';
        $data['petugas'] = $this->model('Petugas_model')->selectAllPetugas();
        $this->view('templates/header', $data);
        $this->view('admin/form_dataptgs', $data);
        $this->view('templates/footer', $data);
    }

    public function form_spp()
    {
        $data['title'] = 'Halaman Data Pembayaran';
        $data['pembayaran'] = $this->model('Spp_model')->selectAllPembayaran();
        $this->view('templates/header', $data);
        $this->view('admin/form_spp', $data);
        $this->view('templates/footer', $data);
    }

    public function form_transaksi()
    {
        $data['title'] = 'Halaman Data Transaksi';
        $data['transaksi'] = $this->model('Transaksi_model')->selectAllTransaksi();
        $this->view('templates/header', $data);
        $this->view('admin/form_transaksi', $data);
        $this->view('templates/footer', $data);
    }

    public function edit_spp($id)
    {
        $data['title'] = 'Halaman Edit Kelas';
        $data['pembayaran'] = $this->model('Spp_model')->getPembayaranById($id);
        $this->view('templates/header', $data);
        $this->view('admin/edit_spp', $data);
        $this->view('templates/footer', $data);
    }

    public function edit_datakelas($id)
    {
        $data['title'] = 'Halaman Edit Kelas';
        $data['kelas'] = $this->model('Kelas_model')->getKelasById($id);
        $this->view('templates/header', $data);
        $this->view('admin/edit_datakelas', $data);
        $this->view('templates/footer', $data);
    }

    public function edit_pembayaran($id)
    {
        $data['title'] = 'Halaman Edit Pembayaran';
        $data['pembayaran'] = $this->model('Spp_model')->getPembayaranById($id);
        $this->view('templates/header', $data);
        $this->view('admin/edit_spp', $data);
        $this->view('templates/footer', $data);
    }

    public function edit_datasiswa($id)
    {
        $data['title'] = 'Halaman Edit Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);
        $data['pengguna'] =$this->model('Pengguna_model')->selectAllPengguna();
        $data['kelas'] = $this->model('Kelas_model')->selectAllKelas();
        $data['getAllSiswa'] = $this->model('Siswa_model')->getAllSiswa();
        $data['pembayaran'] = $this->model('Spp_model')->selectAllPembayaran();
        $this->view('templates/header', $data);
        $this->view('admin/edit_datasiswa', $data);
        $this->view('templates/footer', $data);
    }

    public function insertPembayaran()
    {
        if ($this->model('Spp_model')->insertDataPembayaran())
        {
            Flasher::setFlash('success', 'Data Pembayaran Berhasil Ditambahkan');
            Redirect::to('admin/form_spp');
        } else { 
            Flasher::setFlash('danger', 'Data Pembayaran Gagal Ditambahkan');
            Redirect::to('admin/form_spp');
        }
    }

    public function insertSiswa()
    {
        $data=[
            'username'=> $_POST['nis'],
            'password' => $_POST['pass'],
            'role'=> 'siswa'
        ];
        if ($this->model('Pengguna_model')->insertDataPengguna($data))
        {
            $pengguna = $this->model('Pengguna_model')->getPenggunaIdByUsername($data['username']);
            $data=[
                'nis'=> $_POST['nis'],
                'nisn' => $_POST['nisn'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'telepon' => $_POST['telepon'],
                'id_kelas' => $_POST['id_kelas'],
                'id_pembayaran' => $_POST['id_pembayaran'],
                'id_pengguna' => $pengguna ['id_pengguna'],
            ];
            if ($this->model('Siswa_model')->insertDataSiswa($data))
            {
                Flasher::setFlash('success', 'Data Siswa Berhasil Ditambahkan');
                Redirect::to('admin/form_datasiswa');
        }
        } else { 
            Flasher::setFlash('danger', 'Data Siswa Gagal Ditambahkan');
            Redirect::to('admin/form_datasiswa');
        }
    }
    
    public function insertKelas()
    {
        if ($this->model('Kelas_model')->insertDataKelas())
        {
            Flasher::setFlash('success', 'Data Kelas Berhasil Ditambahkan');
            Redirect::to('admin/form_datakelas');
        } else { 
            Flasher::setFlash('danger', 'Data Kelas Gagal Ditambahkan');
            Redirect::to('admin/form_datakelas');
        }
    }

    public function insertPengguna()
    {
        if ($this->model('Pengguna_model')->insertDataPengguna())
        {
            Flasher::setFlash('success', 'Data Pengguna Berhasil Ditambahkan');
            Redirect::to('admin/form_datapengguna');
        } else { 
            Flasher::setFlash('danger', 'Data Pengguna Gagal Ditambahkan');
            Redirect::to('admin/form_datapengguna');
        }
    }

    public function updateKelas()
    {
        if ($this->model('Kelas_model')->updateDataKelas())
        {
            Flasher::setFlash('success', 'Data Kelas Berhasil Diubah');
            Redirect::to('admin/form_datakelas');
        } else { 
            Flasher::setFlash('danger', 'Data Kelas Gagal Diubah');
            Redirect::to('admin/form_datakelas');
        }
    }

    public function updatePembayaran()
    {
        if ($this->model('Spp_model')->updateDataPembayaran())
        {
            Flasher::setFlash('success', 'Data Pembayaran Berhasil Diubah');
            Redirect::to('admin/form_spp');
        } else { 
            Flasher::setFlash('danger', 'Data Pembayaran Gagal Diubah');
            Redirect::to('admin/form_spp');
        }
    }

    public function updatePengguna()
    {
        if ($this->model('Pengguna_model')->updateDataPengguna())
        {
            Flasher::setFlash('success', 'Data Pengguna Berhasil Diubah');
            Redirect::to('admin/form_pengguna');
        } else { 
            Flasher::setFlash('danger', 'Data Pengguna Gagal Diubah');
            Redirect::to('admin/form_pengguna');
        }
    }

    public function updateSiswa()
    {
        $data=[
            'username' => $_POST['nis'],
            'id_pengguna' => $_POST['id_pengguna'],
        ];
        if ($this->model('Pengguna_model')->updateDataPenggunaModel($data))
        {
            $data = [
                'nisn' => $_POST['nisn'],
                'nis' => $_POST['nis'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'telepon' => $_POST['telepon'],
                'kelas_id' => $_POST['id_kelas'],
                'pembayaran_id' => $_POST['id_pembayaran'],
                'id_pengguna' => $_POST['id_pengguna'],  
                'id' => $_POST['id'],
            ];
            if ($this->model('Siswa_model')->updateSiswa($data))
            {
                Flasher::setFlash('success', 'Data Siswa Berhasil Diubah');
                Redirect::to('admin/form_datasiswa');
            }
            else
            { 
                Flasher::setFlash('danger', 'Data Siswa Gagal Diubah');
                Redirect::to('admin/form_datasiswa');
            }
        }
        else
        { 
            Flasher::setFlash('danger', 'Data Siswa Gagal Diubah');
            Redirect::to('admin/form_datasiswa');
        }
    }

    public function deleteSiswa()
    {
        if ($this->model('Siswa_model')->deleteDataSiswa())
        {
            Flasher::setFlash('success', 'Data Siswa Berhasil Dihapus');
            Redirect::to('admin/form_datasiswa');
        } else { 
            Flasher::setFlash('danger', 'Data Siswa Gagal Dihapus');
            Redirect::to('admin/form_datasiswa');
        }
    }

    public function deleteKelas()
    {
        if ($this->model('Kelas_model')->deleteDataKelas())
        {
            Flasher::setFlash('success', 'Data Kelas Berhasil Dihapus');
            Redirect::to('admin/form_datakelas');
        } else { 
            Flasher::setFlash('danger', 'Data Kelas Gagal Dihapus');
            Redirect::to('admin/form_datakelas');
        }
    }

    public function deletePembayaran()
    {
        if ($this->model('Spp_model')->deleteDataPembayaran())
        {
            Flasher::setFlash('success', 'Data Pembayaran Berhasil Dihapus');
            Redirect::to('admin/form_spp');
        } else { 
            Flasher::setFlash('danger', 'Data Pembayaran Gagal Dihapus');
            Redirect::to('admin/form_spp');
        }
    }

    public function deletePengguna()
    {
        if ($this->model('Pengguna_model')->deleteDataPengguna())
        {
            Flasher::setFlash('success', 'Data Pengguna Berhasil Dihapus');
            Redirect::to('admin/form_pengguna');
        } else { 
            Flasher::setFlash('danger', 'Data Pengguna Gagal Dihapus');
            Redirect::to('admin/form_pengguna');
        }
    }
}