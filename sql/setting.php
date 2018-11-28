<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/../lib/session.php';

function getSetting() {
    global $pdo;
    $sth = $pdo->prepare('SELECT s.id_tahun_ajaran, ta.nama
							FROM setting s,tahun_ajaran ta 
							WHERE s.id_tahun_ajaran = ta.id');
    $sth->execute();

    return $sth->fetch();
}
function editSettingById($id,$nama_sekolah, $alamat_sekolah, $telp, $email, $id_tahun_ajaran,$twitter,$facebook,$google) {
    global $pdo;

    $sth = $pdo->prepare('UPDATE setting SET nama_sekolah = :nama_sekolah,
										alamat_sekolah = :alamat_sekolah,
										telp = :telp,
										email = :email,
										id_tahun_ajaran = :id_tahun_ajaran,
                                        twitter = :twitter,
                                        facebook = :facebook,
                                        google = :google
										WHERE id = :id');

    return $sth->execute(array(
        'id' => $id,
        'nama_sekolah' => $nama_sekolah,
        'alamat_sekolah' => $alamat_sekolah,
        'telp' => $telp,
        'email' => $email,
        'id_tahun_ajaran' => $id_tahun_ajaran,
        'twitter' => $twitter,
        'facebook' => $facebook,
        'google' => $google
    ));
}

?>
