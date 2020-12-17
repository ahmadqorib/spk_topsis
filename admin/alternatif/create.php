<?php 
    include_once ("../config/database.php");
    include ("../controller/AlternatifController.php");
    include ("../controller/KategoriAlternatifController.php");
    $alternatif = new AlternatifController();
    $kategori = new KategoriAlternatifController();

    if(isset($_POST['save'])){
        $alternatif->store();
    }
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Alternatif</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-outline card-warning">
                    <div class="card-body">
                    <form action="" role="form" method="post" enctype="multipart/form-data"
                        <div class="card-header">
                        Tambah
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode<b class="text-danger">*</b></label>
                                <input type="text" name="kode" required class="form-control" placeholder="Input kode Alternatif" value="">
                            </div>
                            <div class="form-group">
                                <label>Alternatif<b class="text-danger">*</b></label>
                                <input type="text" name="alternatif" required class="form-control" placeholder="Input Alternatif" value="">
                            </div>
                            <div class="form-group">
                                <label>Kategori Alternatif/Merek<b class="text-danger">*</b></label>
                                <select class="form-control select2bs4" name="kategori" required style="width: 100%;">
                                    <?php foreach($kategori->getData() as $kri){ ?>
                                        <option value="<?php echo $kri['id'] ?> "><?php echo $kri['kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" required class="form-control" placeholder="Input harga" value="">
                            </div>
                            <div class="form-group">
                                <label>Prosessor</label>
                                <input type="text" name="prosessor" required class="form-control" placeholder="Input prosessor" value="">
                            </div>
                            <div class="form-group">
                                <label>Kapasitas Hardisk</label>
                                <input type="text" name="hardisk" required class="form-control" placeholder="Input hardisk" value="">
                            </div>
                            <div class="form-group">
                                <label>Kapasitas RAM</label>
                                <input type="text" name="ram" required class="form-control" placeholder="Input ram" value="">
                            </div>
                            <div class="form-group">
                                <label>VGA</label>
                                <input type="text" name="vga" required class="form-control" placeholder="Input vga" value="">
                            </div>
                            <div class="form-group">
                                <label>Ukuran Layar</label>
                                <input type="text" name="layar" required class="form-control" placeholder="Input layar" value="">
                            </div>
                            <div class="form-group">
                                <label>Photo<b class="text-danger small"> boleh kosong</b></label>
                                <input type="file" name="photo" class="form-control" placeholder="Input photo" value="">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="?page=alternatif" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success" name="save">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>