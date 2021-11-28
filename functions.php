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

    $kjdOn_esc_str = mysqli_real_escape_string($conn, $kjdOn);
    $kjdOf_esc_str = mysqli_real_escape_string($conn,$kjdOf);
    $kjdAct_esc_str = mysqli_real_escape_string($conn,$kjdAct);
    $kjdDis_esc_str = mysqli_real_escape_string($conn,$kjdDis);
    $rIdKjd_esc_str = mysqli_real_escape_string($conn,$rIdKjd);
    $usrIdKjd_esc_str = mysqli_real_escape_string($conn,$usrIdKjd);


    $query = "INSERT INTO kejadian(KJD_ON,KJD_OF,KJD_ACT,KJD_DIS,R_ID_KJD,USR_ID_KJD) VALUES ('$kjdOn_esc_str', '$kjdOf_esc_str', '$kjdAct_esc_str', '$kjdDis_esc_str', '$rIdKjd_esc_str', '$usrIdKjd_esc_str');";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    //kalo gagal nampilkan error
    //echo mysqli_error($conn);

    //memberitahu apakah ada baris yang terkena perbuatan sesuatu, 
    //1 ada yang affected
    //0 no rows affected
    //-1 ada error
    return mysqli_affected_rows($conn);
}


function hapus($data) {

    $conn = koneksi();

    $idKejadian = $data["KJD_ID_DELETE"];

    $query = "DELETE FROM kejadian WHERE KJD_ID = $idKejadian";

    mysqli_query($conn, $query);

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

    $kjdId_esc_str = mysqli_real_escape_string($conn, $kjdId);
    $kjdAct_esc_str = mysqli_real_escape_string($conn, $kjdAct);
    $kjdDis_esc_str = mysqli_real_escape_string($conn, $kjdDis);
    $rIdKjd_esc_str = mysqli_real_escape_string($conn, $rIdKjd);

    $query = "UPDATE kejadian SET 
                KJD_ACT = '$kjdAct_esc_str',
                KJD_DIS = '$kjdDis_esc_str',
                R_ID_KJD = '$rIdKjd_esc_str'
              WHERE KJD_ID = '$kjdId_esc_str'";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    //kalo gagal nampilkan error
    //echo mysqli_error($conn);

    //memberitahu apakah ada baris yang terkena perbuatan sesuatu, 
    //1 ada yang affected
    //0 no rows affected
    //-1 ada error
    return mysqli_affected_rows($conn);

}


function cari($keyword , $someoneLogged) {
    $conn = koneksi();

    $keyword_esc_str = mysqli_real_escape_string($conn, $keyword);
    $someoneLogged_esc_str = mysqli_real_escape_string($conn, $someoneLogged);

    $query = "SELECT KJD_ID, KJD_ON, KJD_OF, KJD_ACT, KJD_DIS, R_ID_KJD, USR_ID_KJD, R_DESC 
                FROM kejadian INNER JOIN reason ON kejadian.R_ID_KJD = reason.R_ID
                WHERE  
                (KJD_ACT LIKE '%$keyword_esc_str%' OR
                KJD_DIS LIKE '%$keyword_esc_str%') AND
                USR_ID_KJD = $someoneLogged_esc_str
                ORDER BY KJD_ID	
            ";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}


