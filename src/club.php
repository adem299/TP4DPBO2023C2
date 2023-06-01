<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Club.controller.php");

$club = new ClubController();

// Eksekusi add club
if (isset($_POST['add'])) {
    $club->add($_POST);
}

// ekseskusi update club
else if (isset($_POST['update'])) {
    $club->update($_POST);
}


// move to form create page club
else if (!empty($_GET['create'])) {
    
    $club->formAdd();
}

// eksekusi delete member
else if (!empty($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $club->delete($id);
}

// move to form update member
else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $club->formUpdate($id);
}

// show page club
else{
    $club->index();
}

