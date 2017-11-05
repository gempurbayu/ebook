<?php
 
    //memulai session
    session_start();
 
    //jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin
    if (isset($_SESSION['username'])) {
        header("Location: admin.php");
    }
 
    //include koneksi database
    require_once "connect.php";
 
    //jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $userpass = $_POST['password']; //password yang di inputkan oleh user lewat form login
 
        //query ke database
        $sql = mysqli_query($connect_db, "SELECT username, password, nama FROM login WHERE username = '$username'");
 
        list($username, $password, $nama) = mysqli_fetch_array($sql);
 
        //jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify
        if (mysqli_num_rows($sql) > 0) {
 
            /*
            validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
            */
            if (password_verify($userpass, $password)) {
 
                //buat session baru
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['nama']     = $nama;
 
                //jika login berhasil, user akan diarahkan ke halaman admin
                header("Location: admin.php");
                die();
            } else {
                echo '<script language="javascript">
                       window.alert("LOGIN GAGAL! Silakan coba lagi");
                       window.location.href="./";
                     </script>';
            }
        } else {
           echo '<script language="javascript">
                   window.alert("LOGIN GAGAL! Silakan coba lagi");
                   window.location.href="./";
                </script>';
        }
    }
 