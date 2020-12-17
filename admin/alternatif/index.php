<?php 
    include_once ("../config/database.php");
    include ("../controller/AlternatifController.php");
    $alternatif = new AlternatifController();

    if(isset($_POST['save'])){
        $alternatif->store();
    }

    if(isset($_POST['update'])){
        $alternatif->update($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="delete" && $_GET['page'] == "alternatif"){
        $alternatif->delete($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['page'] == "alternatif"){
        $edit = $alternatif->edit($_GET['id']);
    }
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Alternatif</h1>
            </div>
        </div>
        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=alternatif&action=create'; ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> tambah</a>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Kode</th>
                                    <th>Alternatif</th>
                                    <th>Kategori/Merek</th>
                                    <th>Harga</th>
                                    <th>Prosessor</th>
                                    <th>Hardisk</th>
                                    <th>RAM</th>
                                    <th>VGA</th>
                                    <th>Layar</th>
                                    <th style="width: 80px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    foreach($alternatif->getData() as $data){
                                        $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no.'.' ?></td>
                                    <td><?php echo $data['kode'] ?></td>
                                    <td><?php echo $data['alternatif'] ?></td>
                                    <td><span class="small"><?php echo $data['kategori'] ?></span></td>
                                    <td><span class="small"><?php echo $data['harga'] ?></span></td>
                                    <td><span class="small"><?php echo $data['prosessor'] ?></span></td>
                                    <td><span class="small"><?php echo $data['hardisk'] ?></span></td>
                                    <td><span class="small"><?php echo $data['ram'] ?></span></td>
                                    <td><span class="small"><?php echo $data['vga'] ?></span></td>
                                    <td><span class="small"><?php echo $data['layar'] ?></span></td>
                                    <td>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=alternatif&action=edit&id='.$data['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> edit</a>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=alternatif&action=delete&id='.$data['id']; ?>" onclick="return confirm('anda yakin akan menghapus data ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> hapus</a>
                                    </td>
                                </tr>
                                    <?php } ?>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
