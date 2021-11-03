<?php

function koneksi() {
    return mysqli_connect('localhost', 'root', '', 'pwebtabelgrafik');
}

function query($query) {
    $conn = koneksi();
    $result = mysqli_query($conn, $query);
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

    mysqli_query($conn, $query);

    //kalo gagal nampilkan error
    echo mysqli_error($conn);

    //memberitahu apakah ada baris yang terkena perbuatan sesuatu, 
    //1 ada yang affected
    //0 no rows affected
    //-1 ada error
    return mysqli_affected_rows($conn);
}