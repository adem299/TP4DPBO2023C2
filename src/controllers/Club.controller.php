<?php
include_once("conf.php");
include_once("models/Club.class.php");
include_once("views/Club.view.php");

class ClubController {
  private $club;

  function __construct(){
    $this->club = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->club->open();
    $this->club->getClub();
    $data = array();
    while($row = $this->club->getResult()){
      array_push($data, $row);
    }

    $this->club->close();

    $view = new ClubView();
    $view->render($data);
  }

  
  function add($data){
    $this->club->open();
    $this->club->add($data);
    $this->club->close();
    
    header("location:club.php");
  }

  function update($data){
    $this->club->open();
    $this->club->update($data);
    $this->club->close();
    
    header("location:club.php");
  }

  function delete($id){
    $this->club->open();
    $this->club->delete($id);
    $this->club->close();
    
    header("location:club.php");
  }

  function formAdd() 
  {
    $view = new ClubView();
    $view->renderForm();
  }

  function formUpdate($id){
    $this->club->open();
    $this->club->getClubById($id);
    $data = array();
    while($row = $this->club->getResult()){
      array_push($data, $row);
    }

    $this->club->close();
    $view = new ClubView();
    $view->renderFormUpdate($data);
  }



}