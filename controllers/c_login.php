<?php
session_start();
include_once "c_koneksi.php";
class c_login {
    public function register($id=null, $username=null, $email=null, $password=null, $role=null, $photo=null) {

        $conn = new c_koneksi();
        
            $query = "INSERT INTO user VALUES ('$id', '$username', '$email', '$password', '$role', '$photo')";
            $data = mysqli_query($conn->conn(), $query);
        
    }

    public function login($email=null, $pass=null) {

        $conn = new C_koneksi();

        // jika tombol login di tekan maka jalankan perintah di bawahnya
        if (isset($_POST['login'])) {

            // perintah untuk mengambil semua data berdasarkan dari email yang di inputkan oleh user
            $sql ="SELECT * FROM  users WHERE email = = '$email";

            // perintah untuk exsekusi
            $query = mysqli_query($conn->conn(), $sql);

            // merubah data menjadi array asossiatif
            // array asossiatif adalah array yang index nya mememiliki nama
            $data = mysqli_fetch_assoc($query);

            // untuk mengecek apakah query select data berhasil atau tidak
            if (data) {
                // mengecek password apakah sama atau tidak antara yang di inputkan oleh user dengan yang ada di database
                if (password_verivy($pass, $data['password'])) {
                    // untuk mengecek role user
                    if ($data['role'] == 'admin') {
                        // membuat variabel session yang nantinya akan di gunkan pada halaman homr admin
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data['role'];

                        // jika login berhasil makan akan berpindah kehalaman home
                        header("Location: ../views/home.php");
                        exit;
                }else if($data['role'] == 'user'){
                         $SESSION["data"] = $data;
                         $_SESSION["role"] = $data['role'];

                         // jika login berhasil makan akan berpindah kehalaman homr user
                         header("Location: ../views/home_user.php");
                         exit;
                }
            }else {
                echo "<script>alert('Login gagal !!! Silahkan cek email dan 
                password'); windows. location='../index.php'</script>";
            }
        }else {
            echo "<script>alert('Login gagal !!! Silahkan cek email dan 
                password'); windows. location='../index.php'</script>";
        }
    }


}
public function logout(){

    // menghapus. menghancurkan sessioin
    session_destroy();

    header("Location: ../index.php");
    exit;
}
}
?>
