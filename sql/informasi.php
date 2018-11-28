<?php

require_once __DIR__.'/../config.php';

function tambahInformasi($type, $title, $content) {
    global $pdo;

    $sth = $pdo->prepare('INSERT INTO informasi(type, title, content) VALUES (:type, :title, :content)');

    return $sth->execute(array(
        'type' => $type,
        'title' => $title,
        'content' => $content
    ));
}

function editInformasiById($id, $content) {
    global $pdo;

    $sth = $pdo->prepare('UPDATE informasi SET content = :content, date_updated = NULL WHERE id = :id');

    return $sth->execute(array(
        'id' => $id,
        'content' => $content
    ));
}

function hapusInformasiById($id) {
    global $pdo;

    $sth = $pdo->prepare('DELETE FROM informasi WHERE id = :id');

    return $sth->execute(array('id' => $id));
}

function findInformasiById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM informasi WHERE id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}

function findInformasiByTitle($title) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM informasi WHERE title = :title');
    $sth->execute(array('keterangan' => $title));

    return $sth->fetch();
}

function findInformasiByType($type) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM informasi WHERE type = :type ORDER BY id');
    $sth->execute(array('type' => $type));

    return $sth->fetchAll();
}

function findInformasiByQueryString($queryString) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM informasi WHERE title LIKE :queryString OR content LIKE :queryString');
    $sth->execute(array('queryString' => '%'.$queryString.'%'));

    return $sth->fetchAll();
}

function findAllInformasi() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM informasi');
    $sth->execute();

    return $sth->fetchAll();
}

function findBeritaTerbaru() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM informasi WHERE type = "berita" ORDER BY id DESC LIMIT 0,3');
    $sth->execute();

    return $sth->fetchAll();
}

function findAllBeritaStatement() {
global $pdo;
return $pdo->prepare('SELECT * FROM informasi WHERE type = "berita" ORDER BY id DESC');
}

function findArtikelTerbaru() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM informasi WHERE type = "artikel" ORDER BY id DESC LIMIT 0,3');
    $sth->execute();

    return $sth->fetchAll();
}
?>
