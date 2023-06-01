<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

// Eksekusi add member
if (isset($_POST['add'])) {
    $member->add($_POST);
}

// ekseskusi update member
else if (isset($_POST['update'])) {
    $member->update($_POST);
}

// move to form create page member
else if (!empty($_GET['create'])) {
    $member->formAdd();
}

// eksekusi delete member
else if (!empty($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $member->delete($id);
}

// move to form update member
else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $member->formUpdate($id);
}

// show page index
else{
    $member->index();
}
