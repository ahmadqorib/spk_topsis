<?php 
    include ("../controller/KriteriaController.php");
    include ("../constants/kriteria.php");
    include ("../constants/AtributeKriteria.php");
    $kriteria = new KriteriaController();
    $kons = new Kriteria();
    $atributK = new AtributeKriteria();

    if(isset($_POST['save'])){
        $kriteria->store();
    }

    if(isset($_POST['update'])){
        $kriteria->update($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="delete" && $_GET['page'] == "kriteria"){
        $kriteria->delete($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['page'] == "kriteria"){
        $edit = $kriteria->edit($_GET['id']);
    }
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kriteria</h1>
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
                                    <th style="width: 10px">#</th>
                                    <th>Kode</th>
                                    <th>Kriteria</th>
                                    <th>Nilai/Bobot</th>
                                    <th>Atribut</th>
                                    <th>Keterangan</th>
                                    <th style="width: 80px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    foreach($kriteria->getData() as $data){
                                        $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no.'.' ?></td>
                                    <td><?php echo $data['kode'] ?></td>
                                    <td><?php echo Kriteria::label($data['kriteria']) ?></td>
                                    <td><span class="badge bg-danger"><?php echo $data['nilai'] ?></span></td>
                                    <td><?php echo $atributK::label($data['atribut']) ?></td>
                                    <td><span class="small"><?php echo $data['keterangan'] ?></span></td>
                                    <td>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=kriteria&action=edit&id='.$data['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> edit</a>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=kriteria&action=delete&id='.$data['id']; ?>" onclick="return confirm('anda yakin akan menghapus data ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> hapus</a>
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
                            if(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['page'] == "kriteria"){
                                include_once ("kriteria/edit.php");
                            }else{
                                include_once ("kriteria/create.php");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
