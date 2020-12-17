<?php 
    include_once ("../config/database.php");
    include ("../controller/KriteriaController.php");
    include ("../controller/RangeKriteriaController.php");
    include ("../constants/kriteria.php");
    include ("../constants/AtributeKriteria.php");
    $kriteria = new KriteriaController();
    $range = new RangeKriteriaController();
    $kons = new Kriteria();
    $atributK = new AtributeKriteria();

    if(isset($_POST['save'])){
        $range->store();
    }

    if(isset($_POST['update'])){
        $range->update($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="delete" && $_GET['page'] == "range_kriteria"){
        $range->delete($_GET['id']);
    }

    if(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['page'] == "range_kriteria"){
        $edit = $range->edit($_GET['id']);
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
                                    <th>Kriteria</th>
                                    <th>Keterangan Range</th>
                                    <th>Nilai Range</th>
                                    <th style="width: 80px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    foreach($range->getData() as $data){
                                        $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no.'.' ?></td>
                                    <td><?php echo Kriteria::label($data['kriteria']) ?></td>
                                    <td><?php echo $data['range_kriteria'] ?></td>
                                    <td><?php echo $data['nilai'] ?></td>
                                    <td>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=range_kriteria&action=edit&id='.$data['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> edit</a>
                                        <a href="<?php echo $_SERVER['PHP_SELF'].'?page=range_kriteria&action=delete&id='.$data['id']; ?>" onclick="return confirm('anda yakin akan menghapus data ?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> hapus</a>
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
                            if(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['page'] == "range_kriteria"){
                                include_once ("range/edit.php");
                            }else{
                                include_once ("range/create.php");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
