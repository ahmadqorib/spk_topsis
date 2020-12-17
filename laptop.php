<?php 
    include_once ("config/database.php");
    include ("controller/HitungTopsisController.php");
    include ("constants/kriteria.php");
    include ("constants/AtributeKriteria.php");
    $hitung = new HitungTopsisController();
?>
<div class="row mb-2 justify-content-md-center">
    <?php 
        foreach($hitung->getTotalIdeal() as $d){
    ?>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="assets/images/laptop/<?php echo $d['image']; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $d['alternatif'] ?></h5>
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
    <?php } ?>
</div>