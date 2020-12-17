<?php

    class KategoriAlternatifController{

        public $kon;

        function __construct()
        {
            $koneksi = new database;
            $this->kon = $koneksi->koneksi();
        }

        function getData()
        {
            $data = $this->kon->query("SELECT * FROM kategori_alternatif ORDER BY kategori ASC");

            $hasil = [];
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
        }

        public function store()
        {
            $kategori = $_POST['kategori'];

            $save = $this->kon->query ("INSERT INTO kategori_alternatif (kategori)
                    VALUES ('$kategori')");

            if($save){
                $_SESSION['message'] = [
                    'status' => 'success',
                    'pesan' => 'Data berhasil disimpan'
                ];
            }

            echo "<script> location.replace('home.php?page=kategori_alternatif'); </script>";
        }

        function edit($id)
        {
            $sql = $this->kon->query("SELECT * FROM kategori_alternatif WHERE id='$id'");
            $data = $sql->fetch_assoc();

            return $data;
        }

        public function update($id)
        {
            $kategori = $_POST['kategori'];

            $save = $this->kon->query ("UPDATE kategori_alternatif SET 
                kategori = '$kategori'
                WHERE id='$id'
            ");

            if($save){
                $_SESSION['message'] = [
                    'status' => 'success',
                    'pesan' => 'Data berhasil diperbaharui'
                ];
            }

            echo "<script> location.replace('home.php?page=kategori_alternatif'); </script>";
        }

        public function delete($id)
        {

            $delete = $this->kon->query("DELETE FROM kategori_alternatif WHERE id = '$id'");

            if($delete){
                $_SESSION['message'] = [
                    'status' => 'success',
                    'pesan' => 'Data berhasil dihapus'
                ];
            }

            echo "<script> location.replace('home.php?page=kategori_alternatif'); </script>";

        }

    }