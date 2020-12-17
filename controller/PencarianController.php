<?php 

class PencarianController {
    public $kon;

    public function __construct()
    {
        $koneksi = new database;
        $this->kon = $koneksi->koneksi();
    }

    // function cari()
    // {
    //     if(isset($_POST['q']))
    //         $param = $_POST['q'];

    //     $data = [];

    //     // mengecek data parameter yang dicari ada tidak
    //     if(!empty($param)){
    //         // melakukan perulangan karena data yang dicari lebih dari satu
    //         foreach($param as $q){
    //             // mendapatkan data range kriteria berdasarkan data yang dimasukkan
    //             $range = $this->kon->query("SELECT * FROM range_kriteria WHERE id='$q'");
    //             $data_range = $range->fetch_assoc();

    //             // mencocokan data range dengan nilai alternatif
    //             $nilai = $this->kon->query("SELECT * FROM nilai_alternatif WHERE id_kriteria='$data_range[id_kriteria]' AND nilai='$data_range[nilai]'");
                
    //             // melakukan perulangan dari data nilai alternatif sehingga data alternatif dapat diperoleh
    //             while($d = mysqli_fetch_array($nilai)){
    //                 // mendapatkan data alternatif sesuai nilai yang diperoleh
    //                 $alternatif = $this->kon->query("SELECT * FROM alternatif a, hasil_topsis h 
    //                     WHERE a.id='$d[id_alternatif]' AND a.id=h.id_alternatif
    //                 ");

    //                 $data_alt = $alternatif->fetch_assoc();
                    
    //                 // melakukan pengecekan apakah data sudah berada pada variabel data atau belum
    //                 $cek = 0;
    //                 foreach($data as $dt){
    //                     if($dt['kode'] == $data_alt['kode']){
    //                         $cek++;
    //                     }
    //                 }

    //                 // jika data yang dicek belum ada di variabel data maka data alternatif akan dimasukkan ke variabel data
    //                 if($cek == 0){
    //                     $data[] = [
    //                         'rank' => $data_alt['rank'],
    //                         'kode' => $data_alt['kode'],
    //                         'alternatif' => $data_alt['alternatif'],
    //                         'image' => $data_alt['photo'],
    //                         'harga' => $data_alt['harga'],
    //                         'prosessor' => $data_alt['prosessor'],
    //                         'hardisk' => $data_alt['hardisk'],
    //                         'ram' => $data_alt['ram'],
    //                         'vga' => $data_alt['vga'],
    //                         'layar' => $data_alt['layar'],
    //                     ];
    //                 }
    //             }
                
    //         }
    //     }
        
    //     asort($data);
    //     return $data;
    // }

    function search()
    {
        // array_merge digunakan untuk menggabungkan array
        $param = [];
        if(isset($_POST['harga']) && !empty($_POST['harga']))
            $param = array_merge($param, $_POST['harga']);

        if(isset($_POST['ram']) && !empty($_POST['ram']))
            $param = array_merge($param, $_POST['ram']);
            
        if(isset($_POST['prosessor']) && !empty($_POST['prosessor']))
            $param = array_merge($param, $_POST['prosessor']);

        if(isset($_POST['hardisk']) && !empty($_POST['hardisk']))
            $param = array_merge($param, $_POST['hardisk']);

        if(isset($_POST['vga']) && !empty($_POST['vga']))
            $param = array_merge($param, $_POST['vga']);

        if(isset($_POST['q']) && !empty($_POST['q']))
            $param = array_merge($param, $_POST['q']);

        $data = [];

        // mengecek data parameter yang dicari ada tidak
        if(!empty($param)){
            // melakukan perulangan karena data yang dicari lebih dari satu
            foreach($param as $q){
                // mendapatkan data range kriteria berdasarkan data yang dimasukkan
                $range = $this->kon->query("SELECT * FROM range_kriteria WHERE id='$q'");
                $data_range = $range->fetch_assoc();

                // mencocokan data range dengan nilai alternatif
                // jika merek laptop tidak dimasukkan maka mencari data sesuai kriteria yang dimasukkan
                $sqlN = "SELECT * FROM nilai_alternatif WHERE id_kriteria='$data_range[id_kriteria]' AND nilai='$data_range[nilai]'";

                // jika merek laptop dimasukkan
                if(isset($_POST['q'])){
                    // sql untuk mendapatkan data dari kriteria dan merek yang dimasukkan
                    $sqlN = "SELECT * FROM nilai_alternatif n, alternatif a WHERE n.id_alternatif=a.id AND id_kriteria='$data_range[id_kriteria]' AND nilai='$data_range[nilai]' AND a.kategori IN (".implode(',',$_POST['q']).")";
                    if(empty($_POST['harga']) && empty($_POST['ram']) && empty($_POST['prosessor']) && empty($_POST['hardisk']) && empty($_POST['vga'])){
                        // jika inputan selain merek kosong akam mendapatkan data sesuai merek yang dimasukkan
                        $sqlN = "SELECT * FROM nilai_alternatif n, alternatif a WHERE n.id_alternatif=a.id AND a.kategori IN (".implode(',',$_POST['q']).")";
                    }
                }

                $nilai = $this->kon->query($sqlN);
                
                // melakukan perulangan dari data nilai alternatif sehingga data alternatif dapat diperoleh
                while($d = mysqli_fetch_array($nilai)){
                    // mendapatkan data alternatif sesuai nilai yang diperoleh
                    $alternatif = $this->kon->query("SELECT * FROM alternatif a, hasil_topsis h 
                        WHERE a.id='$d[id_alternatif]' AND a.id=h.id_alternatif
                    ");

                    $data_alt = $alternatif->fetch_assoc();
                    
                    // melakukan pengecekan apakah data sudah berada pada variabel data atau belum
                    $cek = 0;
                    foreach($data as $dt){
                        if($dt['kode'] == $data_alt['kode']){
                            $cek++;
                        }
                    }

                    // jika data yang dicek belum ada di variabel data maka data alternatif akan dimasukkan ke variabel data
                    if($cek == 0){
                        $data[] = [
                            'rank' => $data_alt['rank'],
                            'kode' => $data_alt['kode'],
                            'alternatif' => $data_alt['alternatif'],
                            'image' => $data_alt['photo'],
                            'harga' => $data_alt['harga'],
                            'prosessor' => $data_alt['prosessor'],
                            'hardisk' => $data_alt['hardisk'],
                            'ram' => $data_alt['ram'],
                            'vga' => $data_alt['vga'],
                            'layar' => $data_alt['layar'],
                        ];
                    }
                }
                
            }
        }
        
        asort($data); //mengurutkan dari yang terkecil (rank)
        return $data;
    }
}