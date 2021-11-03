<?php

function koneksi() {
    return mysqli_connect('localhost', 'root', '', 'pwebtabelgrafik');
}

function query($query) {
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    
    return $rows;
}

function tambah($data) {
    $conn = koneksi(); 
    
    $kjdOn = htmlspecialchars($data['KJD_ON']);
    $kjdOf = htmlspecialchars($data['KJD_OF']);
    $kjdAct = htmlspecialchars($data['KJD_ACT']);
    $kjdDis = htmlspecialchars($data['KJD_DIS']);
    $rIdKjd = htmlspecialchars($data['R_ID_KJD']);
    $usrIdKjd = htmlspecialchars($data['USR_ID_KJD']);


    $query = "INSERT INTO kejadian(KJD_ON,KJD_OF,KJD_ACT,KJD_DIS,R_ID_KJD,USR_ID_KJD) VALUES ('$kjdOn', '$kjdOf', '$kjdAct', '$kjdDis', '$rIdKjd', '$usrIdKjd');";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    //kalo gagal nampilkan error
    //echo mysqli_error($conn);

    //memberitahu apakah ada baris yang terkena perbuatan sesuatu, 
    //1 ada yang affected
    //0 no rows affected
    //-1 ada error
    return mysqli_affected_rows($conn);
}


function hapus($kjdId) {
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM kejadian WHERE KJD_ID = $kjdId") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn); 

}

function ubah($idKej) {

    $conn = koneksi(); 
    
    $kjdId = htmlspecialchars($idKej['KJD_ID']);
    $kjdOn = htmlspecialchars($idKej['KJD_ON']);
    $kjdOf = htmlspecialchars($idKej['KJD_OF']);
    $kjdAct = htmlspecialchars($idKej['KJD_ACT']);
    $kjdDis = htmlspecialchars($idKej['KJD_DIS']);
    $rIdKjd = htmlspecialchars($idKej['R_ID_KJD']);
    $usrIdKjd = htmlspecialchars($idKej['USR_ID_KJD']);


    $query = "UPDATE kejadian SET 
                KJD_ACT = '$kjdAct',
                KJD_DIS = '$kjdDis',
                R_ID_KJD = '$rIdKjd',
                USR_ID_KJD = '$usrIdKjd'
              WHERE KJD_ID = '$kjdId'";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    //kalo gagal nampilkan error
    //echo mysqli_error($conn);

    //memberitahu apakah ada baris yang terkena perbuatan sesuatu, 
    //1 ada yang affected
    //0 no rows affected
    //-1 ada error
    return mysqli_affected_rows($conn);

}


function cari($keyword) {
    $conn = koneksi();

    $query = "SELECT * FROM kejadian
                WHERE  
                KJD_ACT LIKE '%$keyword%' OR
                KJD_DIS LIKE '%$keyword%'
            ";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}


function login($dataLogin) {
    $conn = koneksi();

    $username = htmlspecialchars($dataLogin['username']);
    $password = htmlspecialchars($dataLogin['password']);

    if(query("SELECT * FROM user WHERE USR_USERNAME = '$username' && USR_PASSSWORD = '$password' ")) {

        $_SESSION['login'] = true;

        header("Location: 2_halaman-tabel.php");
    } else {
        return [
            'error' => true,
            'pesan' => 'Username/Password Salah!'
        ];
    }


}
