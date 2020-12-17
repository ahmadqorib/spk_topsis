<?php 
    include_once ("config/database.php");
    include ("controller/HitungTopsisController.php");
    include ("controller/KategoriAlternatifController.php");
    include ("controller/RangeKriteriaController.php");
    include ("controller/PencarianController.php");
    include ("constants/kriteria.php");
    include ("constants/AtributeKriteria.php");
    $hitung = new HitungTopsisController();
    $range = new RangeKriteriaController();
    $cari = new PencarianController();
    $alter = new KategoriAlternatifController();

    if(isset($_POST['cari'])){
        $get = $cari->search();
    }
?>

<div class="row"> 
    <div class="col-md-3">
        <form action="" method="post">
            <div class="form-group">
                <h3>Pencarian Laptop</h3>
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <select class="select2 form-control" name="harga[]" multiple="multiple" data-placeholder="Pilih Harga laptop">
                    <?php 
                        foreach($range->getData() as $r){ 
                            if($r['kriteria'] == Kriteria::PRICE){
                    ?>
                        <option value="<?php echo $r['id'] ?>" <?php if(isset($_POST['harga']) && in_array($r['id'], $_POST['harga'])){ echo 'selected'; } ?>><?php echo $r['range_kriteria'] ?></option>
                    <?php 
                            } 
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Kapasitas RAM</label>
                <select class="select2 form-control" name="ram[]" multiple="multiple" data-placeholder="Pilih Kapasitas RAM laptop">
                    <?php 
                        foreach($range->getData() as $r){ 
                            if($r['kriteria'] == Kriteria::RAM){
                    ?>
                        <option value="<?php echo $r['id'] ?>" <?php if(isset($_POST['ram']) && in_array($r['id'], $_POST['ram'])){ echo 'selected'; } ?>><?php echo $r['range_kriteria'] ?></option>
                    <?php 
                            }
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Prosessor</label>
                <select class="select2 form-control" name="prosessor[]" multiple="multiple" data-placeholder="Pilih Prosessor laptop">
                    <?php 
                        foreach($range->getData() as $r){ 
                            if($r['kriteria'] == Kriteria::PROCESSOR){
                    ?>
                        <option value="<?php echo $r['id'] ?>" <?php if(isset($_POST['prosessor']) && in_array($r['id'], $_POST['prosessor'])){ echo 'selected'; } ?>><?php echo $r['range_kriteria'] ?></option>
                    <?php 
                            }
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Kapasitas Hardisk</label>
                <select class="select2 form-control" name="hardisk[]" multiple="multiple" data-placeholder="Pilih Kapasitas Hardisk laptop">
                    <?php 
                        foreach($range->getData() as $r){ 
                            if($r['kriteria'] == Kriteria::HARDISK){
                    ?>
                        <option value="<?php echo $r['id'] ?>" <?php if(isset($_POST['hardisk']) && in_array($r['id'], $_POST['hardisk'])){ echo 'selected'; } ?>><?php echo $r['range_kriteria'] ?></option>
                    <?php 
                            }
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">VGA</label>
                <select class="select2 form-control" name="vga[]" multiple="multiple" data-placeholder="Pilih VGA laptop">
                    <?php 
                        foreach($range->getData() as $r){ 
                            if($r['kriteria'] == Kriteria::VGA){
                    ?>
                        <option value="<?php echo $r['id'] ?>" <?php if(isset($_POST['vga']) && in_array($r['id'], $_POST['vga'])){ echo 'selected'; } ?>><?php echo $r['range_kriteria'] ?></option>
                    <?php 
                            }
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Merek Laptop</label>
                <select class="select2 form-control" name="q[]" multiple="multiple" data-placeholder="Pilih Merek laptop">
                    <?php foreach($alter->getData() as $r){ ?>
                        <option value="<?php echo $r['id'] ?>" <?php if(isset($_POST['q']) && in_array($r['id'], $_POST['q'])){ echo 'selected'; } ?>><?php echo $r['kategori'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value="Cari" name="cari">
        </form>
    </div>
    <div class="col-md-9">
        <div class="row mb-2 justify-content-md-center">
            <?php 
                if(isset($_POST['cari'])){
                    if(count($get) > 0){
                        $r = 0;
                        foreach($get as $d){
                            $r++;
            ?>
                
                <div class="col-md-4 my-2">
                    <div class="card">
                        <img class="card-img-top" src="assets/images/laptop/<?php echo $d['image']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><span class="badge badge-danger"><?php echo $r; ?></span> <?php echo $d['alternatif'] ?></h5>
                            <p class="card-text">
                            <ul>
                                <li>Rp <?php echo $d['harga'] ?></li>
                                <li><?php echo $d['prosessor'] ?></li>
                                <li>Hardisk :<?php echo $d['hardisk'] ?></li>
                                <li>RAM :<?php echo $d['ram'] ?></li>
                                <li>Graphic :<?php echo $d['vga'] ?></li>
                                <li>Ukuran Layar :<?php echo $d['layar'] ?></li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>

            <?php
                        }
                    }  
                }
            ?>
        </div>
    </div>
</div>

