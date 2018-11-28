<?php

require_once __DIR__.'/../config.php';

function findAllFoto() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM foto ORDER BY id_album');
    $sth->execute();

    return $sth->fetchAll();
}

function findFotoById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM foto WHERE id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}

function findFotoByAlbumId($id_album) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM foto WHERE id_album = :id_album');
    $sth->execute(array('id_album' => $id_album));

    return $sth->fetchAll();
}

function tambahFoto($title, $keterangan, $filename, $id_album) {
    global $pdo;

    $sth = $pdo->prepare('INSERT INTO foto(title, keterangan, filename, id_album) VALUES (:title, :keterangan, :filename, :id_album)');

    return $sth->execute(array(
		'title' => $title,
        'keterangan' => $keterangan,
        'filename' => $filename,
        'id_album' => $id_album
    ));
}

function editFoto($id, $title, $keterangan, $filename, $id_album) {
    global $pdo;
    $sth = $pdo->prepare('UPDATE foto SET title = :title,
								filename = :filename,
								keterangan = :keterangan,
                                id_album = :id_album
								WHERE id = :id');
    return $sth->execute(array(
        'id' => $id,
		'title' => $title,
        'keterangan' => $keterangan,
        'filename' => $filename,
        'id_album' => $id_album
    ));
}


function hapusFoto($id) {
    global $pdo;

    $sth = $pdo->prepare('DELETE FROM foto WHERE id = :id');

    return $sth->execute(array('id' => $id));
}

function findAllAlbum() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM album_foto ORDER BY id');
    $sth->execute();

    return $sth->fetchAll();
}

function findCoverAllAlbum() {
    global $pdo;

    $sth = $pdo->prepare('SELECT album_foto.id, foto.filename, album_foto.nama FROM foto 
                            inner join album_foto
                            WHERE foto.id_album = album_foto.id 
                            GROUP BY album_foto.id');
    $sth->execute();

    return $sth->fetchAll();
}

function findAlbumFotoById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM album_foto WHERE id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}

function tambahAlbumFoto($nama) {
    global $pdo;

    $sth = $pdo->prepare('INSERT INTO album_foto(nama) VALUES (:nama)');

    return $sth->execute(array(
		'nama' => $nama
    ));
}

function editAlbumFoto($id, $nama) {
    global $pdo;
    $sth = $pdo->prepare('UPDATE album_foto SET nama = :nama
								WHERE id = :id');
    return $sth->execute(array(
        'id' => $id,
		'nama' => $nama
    ));
}

function hapusAlbumFoto($id) {
    global $pdo;

    $sth = $pdo->prepare('DELETE FROM album_foto WHERE id = :id');

    return $sth->execute(array('id' => $id));
}