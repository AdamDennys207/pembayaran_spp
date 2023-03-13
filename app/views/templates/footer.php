<!-- Modal Logout-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Ya" Ketika Anda Ingin Benar Keluar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary"  href="<?= BASEURL ?>/logout/index">Ya</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Logout -->

<!-- Modal Insert Data Siswa -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/insertSiswa" method="post">
                    <div class="form-group">
                        <label for="examplenis">NISN</label>
                        <input class="form-control" name="nisn" id="inputnisn">
                    </div>
                    <div class="form-group">
                        <label for="examplenis">NIS</label>
                        <input class="form-control" name="nis" id="inputnis">
                    </div>
                    <div class="form-group">
                        <label for="examplenis">Nama</label>
                        <input class="form-control" name="nama" id="inputnama">
                    </div>
                    <div class="form-group">
                        <label for="examplenis">Passowrd</label>
                        <input type="password "class="form-control" name="pass" id="inputnama">
                    </div>
                    <div class="form-group">
                        <label for="examplenis">Alamat</label>
                        <input class="form-control" name="alamat" type="text" id="inputalamat">
                    </div>
                    <div class="form-group">
                        <label for="examplenis">Telepon</label>
                        <input class="form-control" name="telepon" id="inputtelepon">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="examplenis">Kelas</label>
                            <select class="form-control" name="kelas_id" id="inputidkelas">
                                <?php foreach($data['kelas'] as $siswa):?>
                                    <option value="<?=$siswa['id_kelas']?>"><?=$siswa['id_kelas']?></option>
                                <?php endforeach;?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="examplenis"></label>
                            <select class="form-control" name="" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="examplenis">Memilih Pembayaran</label>
                            <select class="form-control" name="id_pembayaran" id="inputidkelas">
                                <?php foreach($data['pembayaran'] as $pembayaran):?>
                                    <option value="<?=$pembayaran['id_pembayaran']?>"><?=$pembayaran['tahun_ajaran']?></option>
                                <?php endforeach;?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="examplenis"></label>
                            <select class="form-control" name="" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Insert Data Siswa -->

<!-- Modal Insert Data Pembayaran -->
<div class="modal fade" id="datapembayaran" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/insertPembayaran" method="post">
                    <div class="form-group">
                        <label for="examplenis">Tahun Ajaran</label>
                        <input class="form-control" name="tahun_ajaran" id="inputtahunajaran">
                    </div>
                    <div class="form-group">
                        <label for="examplenis">Nominal</label>
                        <input class="form-control" name="nominal" id="inputnominal">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Insert Data Pembayaran -->

<!-- Modal Insert Data Pembayaran -->
<div class="modal fade" id="datapengguna" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/insertPengguna" method="post">
                    <div class="form-group">
                        <label for="examplenis">Username</label>
                        <input class="form-control" name="username" id="inputtahunajaran">
                    </div>
                    <div class="form-group">
                        <label for="examplenis">Password</label>
                        <input type="password"class="form-control" name="password" id="inputnominal">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="examplenis">Role</label>
                            <select name="role" id="" class="form-control">
                                <?php foreach($data['role'] as $key => $role): ?>
                                    <option value="<?=$role?>"><?=$role?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Insert Data Pembayaran -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= BASEURL ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASEURL ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= BASEURL ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= BASEURL ?>/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= BASEURL ?>/js/demo/chart-area-demo.js"></script>
<script src="<?= BASEURL ?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>