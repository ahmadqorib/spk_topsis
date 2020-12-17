<?php 
    include ("../controller/NilaiAlternatifController.php");
    include ("../controller/KriteriaController.php");
    include ("../controller/RangeKriteriaController.php");
    include ("../controller/AlternatifController.php");
    include ("../constants/kriteria.php");
    $nilai = new NilaiAlternatifController();
    $kriteria = new KriteriaController();
    $range = new RangeKriteriaController();
    $alternatif = new AlternatifController();
    $kons = new Kriteria();

    if(isset($_POST['saveNilai'])){
        $nilai->saveNilai();
    }

?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Nilai Alternatif</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        Keterangan nilai range
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php 
                                foreach($kriteria->getData() as $kri){
                            ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        Range <?php echo Kriteria::label($kri['kriteria']); ?> laptop (<?php echo $kri['kode'] ?>)
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Range</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach($range->getDataByKriteria($kri['id']) as $r){
                                                ?>
                                                <tr>
                                                    <td><?php echo $r['range_kriteria'] ?></td>
                                                    <td><span class="badge bg-primary"><?php echo $r['nilai']; ?></span></td>
                                                </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        Nilai alternatif pada kriteria
                    </div>
                    <form action="" method="post">
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="20%">Alternatif/Laptop</th>
                                    <?php 
                                        foreach($kriteria->getData() as $kr){
                                    ?>
                                    <th><?php echo $kr['kode'] ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($alternatif->getData() as $alt){
                                ?>
                                <tr>
                                    <td><?php echo $alt['kode'] ?></td>
                                    <td><?php echo $alt['alternatif'] ?></td>
                                    <?php 
                                        foreach($kriteria->getData() as $kr){
                                        $idAlt = $alt['id'];
                                        $idKr = $kr['id'];
                                        $nAlt = $nilai->getNilai($idAlt, $idKr);
                                    ?>
                                    <td>
                                        <input type="number" class="form-control form-control-sm nilai" value="<?php echo $nAlt ?>" name="nilai[<?php echo $idAlt ?>][<?php echo $idKr ?>][]">
                                    </td>
                                    <?php } ?>
                                </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <input type="submit" class="btn btn-sm btn-success" value="update nilai" name="saveNilai">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>