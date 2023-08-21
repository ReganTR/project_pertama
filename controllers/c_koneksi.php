<?php 

class c_koneksi {

    public function conn() {
        $conn = mysqli_connect("localhost", "root", "", "penginapan");
        return $conn;

        if (!$conn) {
            die("koneksi gagal: " . mysqli_connect_error());
        } else {
            echo "<script> alert('koneksi databse berhasil');
            </script>";
        }
    }
}
