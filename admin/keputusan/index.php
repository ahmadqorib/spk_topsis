<?php 
    include_once ("../config/database.php");
    include ("../controller/NilaiAlternatifController.php");
    include ("../controller/KriteriaController.php");
    include ("../controller/AlternatifController.php");
    include ("../controller/HitungTopsisController.php");
    include ("../constants/kriteria.php");
    include ("../constants/AtributeKriteria.php");
    $nilai = new NilaiAlternatifController();
    $kriteria = new KriteriaController();
    $alternatif = new AlternatifController();
    $hitung = new HitungTopsisController();
    $kons = new Kriteria();

    if(isset($_POST['sync'])){
        $hitung->syncData();
    }
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Perhitungan Metode Topsis</h1>
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
                        Kriteria Perhitungan
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                           
                                <tr>
                                    <th>Kriteria</th>
                                    <?php 
                                        foreach($kriteria->getData() as $kri){
                                    ?>
                                        <td><?php echo $kons::label($kri['kriteria'] )." (".$kri['kode'].")" ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th>Bobot</th>
                                    <?php 
                                        foreach($kriteria->getData() as $kri){
                                    ?>
                                        <td><?php echo $kri['nilai'] ?></td>
                                    <?php } ?>
                                </tr>
                           
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        Nilai Alternatif Dari Setiap Kriteria
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Alternatif</th>
                                    <th>Alternatif</th>
                                    <?php 
                                        foreach($kriteria->getData() as $kr){
                                    ?>
                                    <th><?php echo $kr['kode'] ?></th>
                                        <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 0;
                                foreach($alternatif->getData() as $alt){
                                    $no ++;
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $alt['kode'] ?></td>
                                    <td><?php echo $alt['alternatif'] ?></td>
                                    <?php 
                                        foreach($kriteria->getData() as $kr){
                                    ?>
                                        <td><?php echo $nilai->getNilaiByKrAlt($alt['id'], $kr['id']); ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <form action="" method="post">
                        <div class="float-right">
                            <!-- <input type="submit" class="btn btn-sm btn-success" value="hitung topsis" name="hitung"> -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        Hasil Perhitungan Topsis
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        Matriks Keputusan Ternormalisasi (r)
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Alternatif</th>
                                                    <?php 
                                                        foreach($kriteria->getData() as $kr){
                                                    ?>
                                                    <th><?php echo $kr['kode'] ?></th>
                                                        <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 0;
                                                foreach($alternatif->getData() as $alt){
                                                    $no ++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $alt['kode'] ?></td>
                                                    <?php 
                                                        foreach($kriteria->getData() as $kr){
                                                    ?>
                                                        <td><?php echo $hitung->getMatriksR($kr['id'], $alt['id']) ?></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        Matriks Y (Perkalian Antara Bobot Dengan Nilai Setiap Atribut (Matriks R))
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Alternatif</th>
                                                    <?php 
                                                        foreach($kriteria->getData() as $kr){
                                                    ?>
                                                    <th><?php echo $kr['kode'] ?></th>
                                                        <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 0;
                                                foreach($alternatif->getData() as $alt){
                                                    $no ++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $alt['kode'] ?></td>
                                                    <?php 
                                                        foreach($kriteria->getData() as $kr){
                                                    ?>
                                                        <td><?php echo $hitung->getMatriksY($kr['id'], $alt['id']) ?></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                     Matriks Solusi Ideal
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <?php 
                                                        foreach($kriteria->getData() as $kr){
                                                    ?>
                                                    <th><?php echo $kr['kode']." (".AtributeKriteria::label($kr['atribut']).")" ?></th>
                                                        <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Positif</td>
                                                    <?php 
                                                        foreach($hitung->getSolusi() as $h){ 
                                                    ?>
                                                    <td><?php echo $h['positif']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>Negatif</td>
                                                    <?php 
                                                        foreach($hitung->getSolusi() as $h){ 
                                                    ?>
                                                    <td><?php echo $h['negatif']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                <div class="card">
                                    <div class="card-header">
                                     Total Perhitungan Topsis
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Rank</th>
                                                    <th>Kode</th>
                                                    <th>Alternatif</th>
                                                    <th>Positif</th>
                                                    <th>Negatif</th>
                                                    <th>Preferensi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $r = 0;
                                                    foreach($hitung->getTotalIdeal() as $h){ 
                                                        $r++;
                                                ?>
                                                <tr>
                                                    <input type="hidden" name="rank[]" value="<?php echo $r; ?>">
                                                    <input type="hidden" name="id[]" value="<?php echo $h['id_alternatif']; ?>">
                                                    <th><?php echo $r; ?></th>
                                                    <td><?php echo $h['kode']; ?></td>
                                                    <td><?php echo $h['alternatif']; ?></td>
                                                    <td><?php echo $h['positif']; ?></td>
                                                    <td><?php echo $h['negatif']; ?></td>
                                                    <td><?php echo $h['preferensi']; ?></td>
                                                </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success btn-sm" name="sync">update data</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>