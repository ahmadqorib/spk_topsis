<?php 
    include_once ("../config/database.php");
    include ("../controller/KategoriAlternatifController.php");
    $kategori = new KategoriAlternatifController();

    if(isset($_POST['save'])){
        $kategori->store();
    }

    if(isset($_POST['update'])){
        $kategori->update($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="delete" && $_GET['page'] == "kategori_alternatif"){
        $kategori->delete($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['page'] == "kategori_alternatif"){
        $edit = $kategori->edit($_GET['id']);
    }
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kategori Alternatif / Merek Laptop</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-outline card-warning">
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>Kategori</th>
                                    <th style="width: 80px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    foreach($kategori->getData() as $data){
                                        $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no.'.' ?></td>
                                    <td><?php echo $data['kategori'] ?></td>
                                    <td>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=kategori_alternatif&action=edit&id='.$data['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> edit</a>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=kategori_alternatif&action=delete&id='.$data['id']; ?>" onclick="return confirm('anda yakin akan menghapus data ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> hapus</a>
                                    </td>
                                </tr>
                                    <?php } ?>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card card-outline card-info">
                        <?php 
                            if(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['page'] == "kategori_alternatif"){
                                include_once ("kategori_alternatif/edit.php");
                            }else{
                                include_once ("kategori_alternatif/create.php");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
