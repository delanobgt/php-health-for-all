<?php

require_once __DIR__.'/../config.php';

function findAllTA() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM tahun_ajaran');
    $sth->execute();

    return $sth->fetchAll();
}

function findTA() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM tahun_ajaran');
    $sth->execute();
    return $sth->fetchAll();
}


function findAllSekolah() {
    global $pdo;

    $sth = $pdo->prepare('SELECT s.id, s.nama, s.gambar_depan, s.gambar_belakang, ta.nama AS tahun_ajaran 
                            FROM sekolah s, tahun_ajaran ta 
                            WHERE s.id_tahun_ajaran = ta.id');
    $sth->execute();

    return $sth->fetchAll();
}

function findAllSekolahGuru() {
    global $pdo;

    $sth = $pdo->prepare('SELECT s.id, s.nama, s.gambar_depan, s.gambar_belakang, ta.nama AS tahun_ajaran 
                            FROM sekolah_guru s, tahun_ajaran ta 
                            WHERE s.id_tahun_ajaran = ta.id');
    $sth->execute();

    return $sth->fetchAll();
}


function findSekolahById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM sekolah WHERE id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}

function findSekolahGuruById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM sekolah_guru WHERE id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}
function findKelasById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM kelas WHERE id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}

function findKelasBySekolahId($id) {
    global $pdo;
    $ta = findTA();
    $id_ta = $ta->id;

    $sth = $pdo->prepare('SELECT * FROM kelas WHERE id_sekolah = :id AND id_tahun_ajaran = :id_ta');
    $sth->execute(array('id' => $id,'id_ta'=> $id_ta));

    return $sth->fetchAll();
}



function findKelasBySekolahTahunAjaran($id_sekolah, $id_ta) {
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM kelas WHERE id_sekolah = :id AND id_tahun_ajaran = :id_ta');
    $sth->execute(array('id' => $id_sekolah,'id_ta'=> $id_ta));

    return $sth->fetchAll();
}

function findSiswaBySekolahId($id) {
    global $pdo;
    $ta = findTA();
    // var_dump($ta);
    // die();
    $id_ta = $ta->id;

    $sth = $pdo->prepare('SELECT * from siswa 
                            INNER JOIN kelas 
                            ON siswa.id_kelas = kelas.id
                            WHERE kelas.id_sekolah = :id
                            AND kelas.id_tahun_ajaran = :id_ta');
    $sth->execute(array('id' => $id,'id_ta'=> $id_ta));

    return $sth->fetchAll();
}

function findSiswaKelasBySekolahId($id,$ta) {
    global $pdo;

    $id_ta = $ta;

    $sth = $pdo->prepare('SELECT * from siswa 
                            INNER JOIN kelas 
                            ON siswa.id_kelas = kelas.id
                            WHERE kelas.id_sekolah = :id
                            AND kelas.id_tahun_ajaran = :id_ta');
    $sth->execute(array('id' => $id,'id_ta'=> $id_ta));
    
    return $sth->fetchAll();
}


function findSiswaByIdKelas($id_kelas) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * 
                            FROM siswa s, kelas_detail kd
                            WHERE s.id = kd.id_siswa 
                            AND kd.id_kelas = :id_kelas');
    $sth->execute(array('id_kelas' => $id_kelas));

    return $sth->fetchAll();
}

/*function findSiswaByIdKelasStatement() {
    global $pdo;

    return $pdo->prepare('SELECT s.id, s.nama, s.nis, s.nisn, s.jenis_kelamin, s.tempat_lahir, s.tanggal_lahir, s.agama, s.alamat, s.foto, k.nama as kelas
                            FROM siswa s, kelas_detail kd,kelas k, sekolah sk
                            WHERE s.id = kd.id_siswa AND kd.id_kelas=k.id AND k.id_sekolah = sk.id
                            AND sk.id = 3');
}*/

function findSiswaByIdKelasStatement() {
    global $pdo;

    return $pdo->prepare('SELECT s.id, s.nama, s.nis, s.nisn, s.jenis_kelamin, s.tempat_lahir, s.tanggal_lahir, s.agama, s.alamat, s.foto, kd.id_kelas 
                            FROM siswa s, kelas_detail kd
                            WHERE s.id = kd.id_siswa AND kd.id_kelas = :id_kelas 
                           ');
}
                            // AND kd.id_kelas = :id_kelas AND s.foto != "IMG_9000.JPG"
//AND s.foto = "IMG_1000.JPG"
// AND s.foto != "IMG_9000.JPG"

function findStafByIdSekolahStatement() {
    global $pdo;

    return $pdo->prepare('SELECT * FROM staf WHERE id_sekolah = :id_sekolah AND staf.foto != "IMG_1000.JPG"');
    //return $pdo->prepare('SELECT * FROM staf WHERE id_sekolah = :id_sekolah');
}

function findSiswaById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM siswa, kelas_detail 
                            WHERE siswa.id = kelas_detail.id_siswa 
                            AND siswa.id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}
/*
SELECT s.id, s.nama, s.nis, s.nisn, s.jenis_kelamin, s.tempat_lahir, s.tanggal_lahir, s.agama, s.alamat, s.foto, kd.id_kelas 
                            FROM siswa s, kelas_detail kd,kelas k, sekolah sk
                            WHERE s.id = kd.id_siswa AND kd.id_kelas=k.id AND k.id_sekolah = sk.id
                            AND sk.id = 1

                            SELECT s.id, s.nama, s.nis, s.nisn, s.jenis_kelamin, s.tempat_lahir, s.tanggal_lahir, s.agama, s.alamat, s.foto, k.nama as kelas
                            FROM siswa s, kelas_detail kd,kelas k, sekolah sk
                            WHERE s.id = kd.id_siswa AND kd.id_kelas=k.id AND k.id_sekolah = sk.id
                            AND sk.id = 2
SELECT s.nama, s.foto, IF( substring( s.foto, 5, 4 ) = '1000', 'Belum Foto', '' ) AS Ket, k.nama AS kelas
FROM siswa s, kelas_detail kd, kelas k, sekolah sk
WHERE s.id = kd.id_siswa
AND kd.id_kelas = k.id
AND k.id_sekolah = sk.id
AND sk.id =3

SELECT index, s.nama, k.nama AS kelas
FROM siswa s, kelas_detail kd, kelas k, sekolah sk
WHERE s.id = kd.id_siswa
AND kd.id_kelas = k.id
AND k.id_sekolah = sk.id
AND sk.id =3
AND s.foto != "IMG_1000.JPG"

update  siswa s inner join nisn_serbajadi n on s.id = n.id SET s.nisn = n.nisn


INSERT INTO rename.perbaungan
SELECT s.id, s.nama, k.nama as kelas, s.foto
                            FROM idcard.siswa s, idcard.kelas_detail kd,idcard.kelas k, idcard.sekolah sk
                            WHERE s.id = kd.id_siswa AND kd.id_kelas=k.id AND k.id_sekolah = sk.id
                            AND sk.id = 5
*/

?>
