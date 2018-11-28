<?php

require_once __DIR__.'/../config.php';

function findAllSlide() {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM slide ORDER BY urutan');
    $sth->execute();

    return $sth->fetchAll();
}

function findSlideById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT * FROM slide WHERE id = :id');
    $sth->execute(array('id' => $id));

    return $sth->fetch();
}

function tambahSlide($title, $urutan, $filename) {
    global $pdo;

    $sth = $pdo->prepare('INSERT INTO slide(title, urutan, filename) VALUES(:title, :urutan, :filename)');

    return $sth->execute(array(
		'title' => $title,
        'urutan' => $urutan,
        'filename' => $filename
    ));
}

function hapusSlide($id) {
    global $pdo;

    $sth = $pdo->prepare('DELETE FROM slide WHERE id = :id');

    return $sth->execute(array('id' => $id));
}

function editSlide($id, $title, $urutan, $filename) {
    global $pdo;
    $sth = $pdo->prepare('UPDATE slide SET title = :title,
								filename = :filename,
								urutan = :urutan
								WHERE id = :id');
    return $sth->execute(array(
        'id' => $id,
        'title' => $title,
        'filename' => $filename,
        'urutan' => $urutan
    ));
}
