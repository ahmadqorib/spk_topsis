<?php
// include_once ("../config/database.php");
// include ("../constants/AtributeKriteria.php");

class HitungTopsisController{
    public $kon;

    public function __construct()
    {
        $koneksi = new database;
        $this->kon = $koneksi->koneksi();
    }

    public function syncData()
    {
        $rank = $_POST['rank'];
        $id = $_POST['id'];
        
        $toDelete = $this->kon->query("DELETE FROM hasil_topsis");

        foreach($rank as $i => $r){
            $toSave = $this->kon->query("INSERT INTO hasil_topsis (rank, id_alternatif) VALUES ('$r','$id[$i]')");
        }
        echo "<script> location.replace('home.php?page=keputusan'); </script>";
    }

    // menghitung matriks keputusan ternormalisasi

    // fungsi untuk menghitung pembagi matriks
    public function getPembagiMatriks($idKriteria)
    {
        $sql = $this->kon->query("SELECT * FROM nilai_alternatif WHERE id_kriteria='$idKriteria'");

        $val = 0;
        while($d = mysqli_fetch_array($sql)){
            $val = $val + pow($d['nilai'], 2);
        }
        $hasilAkar = sqrt($val);

        return $hasilAkar;
    }

    // menghitung nilai matriks dari setiap nilai pada kriteria alternatif
    public function getMatriksR($idKr, $idAlt)
    {
        $sql = $this->kon->query("SELECT * FROM nilai_alternatif WHERE id_alternatif='$idAlt' AND id_kriteria='$idKr'");
        $row = $sql->fetch_assoc();

        $pembagi = $this->getPembagiMatriks($row['id_kriteria']);
        return number_format($row['nilai']/$pembagi, 5);
    }

    // menghitung matriks Y (hasil matriks R dikali dengan bobot setiap kriteria)
    public function getMatriksY($idKr, $idAlt)
    {
        $kriteria = $this->kon->query("SELECT * FROM kriteria WHERE id='$idKr'");
        $kr = $kriteria->fetch_assoc();

        $matriksR = $this->getMatriksR($idKr, $idAlt);
        return number_format($matriksR*$kr['nilai'], 5);
    }

    // menghitung nilai matriks solusi ideal
    public function getSolusi()
    {
        $kriteria = $this->kon->query("SELECT * FROM kriteria ORDER BY kode ASC");
        $data = [];
        foreach($kriteria as $kr){
            $nilai = $this->kon->query("SELECT * FROM nilai_alternatif WHERE id_kriteria='$kr[id]'");
            $positif = 0;
            $negatif = 0;
            foreach($nilai as $i => $n){
                $nilaiMatriksY = $this->getMatriksY($n['id_kriteria'], $n['id_alternatif']); 
                
                if($i == 0){
                    $positif = $nilaiMatriksY;
                    $negatif = $nilaiMatriksY;
                }

                if($kr['atribut'] == AtributeKriteria::BENEFIT){
                    if($nilaiMatriksY >= $positif){
                        $positif = $nilaiMatriksY;
                    }

                    if($nilaiMatriksY <= $negatif){
                        $negatif = $nilaiMatriksY;
                    }
                }else{
                    if($nilaiMatriksY <= $positif){
                        $positif = $nilaiMatriksY;
                    }

                    if($nilaiMatriksY >= $negatif){
                        $negatif = $nilaiMatriksY;
                    }
                }
            }

            $data[] = [
                'id_kriteria' => $kr['id'],
                'kriteria' => $kr['kriteria'],
                'positif' => $positif,
                'negatif' => $negatif
            ];
        }

        return $data;
    } 

    // mendapatkan nilai total ideal positif & negatif dari setiap alternatif
    // serta menghitung rangking
    public function getTotalIdeal()
    {
        $alternatif = $this->kon->query("SELECT * FROM alternatif ORDER BY kode ASC");

        $data = [];
        foreach($alternatif as $alt){
            $nilai = $this->kon->query("SELECT * FROM nilai_alternatif WHERE id_alternatif='$alt[id]'");
            
            $pangkatPositif = 0;
            $pangkatNegatif = 0;
            foreach($nilai as $n){
                $nilaiMatriksY = $this->getMatriksY($n['id_kriteria'], $n['id_alternatif']); 
          
                foreach($this->getSolusi() as $s){
                    if($s['id_kriteria'] == $n['id_kriteria']){
                        $pangkatPositif = $pangkatPositif +  pow($nilaiMatriksY - $s['positif'], 2);
                        $pangkatNegatif = $pangkatNegatif +  pow($nilaiMatriksY - $s['negatif'], 2);
                    }
                }

            }
    
            $po = number_format(sqrt($pangkatPositif), 5);
            $ne = number_format(sqrt($pangkatNegatif), 5);
            $ref = number_format($ne/($ne+$po), 5);
            $data[] = [
                'preferensi' => $ref,
                'id_alternatif' => $alt['id'],
                'kode' => $alt['kode'],
                'image' => $alt['photo'],
                'harga' => $alt['harga'],
                'prosessor' => $alt['prosessor'],
                'hardisk' => $alt['hardisk'],
                'ram' => $alt['ram'],
                'vga' => $alt['vga'],
                'layar' => $alt['layar'],
                'alternatif' => $alt['alternatif'],
                'positif' => $po,
                'negatif' => $ne,
            ];
        }
        rsort($data);
        return $data;
    }
}