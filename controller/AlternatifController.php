<?php

    class AlternatifController{

        public $kon;

        public function __construct()
        {
            $koneksi = new database;
            $this->kon = $koneksi->koneksi();
        }

        public function getData()
        {
            $data = $this->kon->query("SELECT a.*, k.kategori kategori FROM alternatif a, kategori_alternatif k WHERE a.kategori=k.id ORDER BY kode ASC");

            $hasil = [];
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
        }

        public function store()
        {
            $kode = $_POST['kode'];
            $alternatif = $_POST['alternatif'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];
            $prosessor = $_POST['prosessor'];
            $hardisk = $_POST['hardisk'];
            $ram = $_POST['ram'];
            $vga = $_POST['vga'];
            $layar = $_POST['layar'];

            $nama = NULL;

            if($_FILES['photo']['name'] != ""){
                $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
                $nama = $_FILES['photo']['name'];
                $x = explode('.', $nama);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['photo']['size'];
                $file_tmp = $_FILES['photo']['tmp_name'];	
    
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 1044070){			
                        move_uploaded_file($file_tmp, '../assets/images/laptop/'.$nama);
                    }
                }
            }

            $save = $this->kon->query ("INSERT INTO alternatif (kode, alternatif, kategori, harga, prosessor, hardisk, ram, vga, layar, photo)
                    VALUES ('$kode', '$alternatif', '$kategori', '$harga', '$prosessor', '$hardisk', '$ram', '$vga', '$layar', '$nama')");

            if($save){
                $_SESSION['message'] = [
                    'status' => 'success',
                    'pesan' => 'Data berhasil disimpan'
                ];
            }

            echo "<script> location.replace('home.php?page=alternatif'); </script>";
        }

        public function edit($id)
        {
            $sql = $this->kon->query("SELECT * FROM alternatif WHERE id='$id'");
            $data = $sql->fetch_assoc();

            return $data;
        }

        public function update($id)
        {
            $kode = $_POST['kode'];
            $alternatif = $_POST['alternatif'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];
            $prosessor = $_POST['prosessor'];
            $hardisk = $_POST['hardisk'];
            $ram = $_POST['ram'];
            $vga = $_POST['vga'];
            $layar = $_POST['layar'];

            $sql = $this->kon->query("SELECT * FROM alternatif WHERE id='$id'");
            $row = $sql->fetch_assoc();
            $nama = $row['photo'];

            if($_FILES['photo']['name'] != ""){
                $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
                $nama = $_FILES['photo']['name'];
                $x = explode('.', $nama);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['photo']['size'];
                $file_tmp = $_FILES['photo']['tmp_name'];	
    
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    if($ukuran < 1044070){			
                        move_uploaded_file($file_tmp, '../assets/images/laptop/'.$nama);
                    }
                }
            }

            $save = $this->kon->query ("UPDATE alternatif SET 
                kode = '$kode',
                alternatif = '$alternatif',
                kategori = '$kategori',
                harga = '$harga',
                prosessor = '$prosessor',
                hardisk = '$hardisk',
                ram = '$ram',
                vga = '$vga',
                layar = '$layar',
                photo = '$nama'
                WHERE id='$id'
            ");

            if($save){
                $_SESSION['message'] = [
                    'status' => 'success',
                    'pesan' => 'Data berhasil diperbaharui'
                ];
            }

            echo "<script> location.replace('home.php?page=alternatif'); </script>";
        }

        public function delete($id)
        {

            $delete = $this->kon->query("DELETE FROM alternatif WHERE id = '$id'");

            if($delete){
                $_SESSION['message'] = [
                    'status' => 'success',
                    'pesan' => 'Data berhasil dihapus'
                ];
            }

            echo "<script> location.replace('home.php?page=alternatif'); </script>";

        }

    }