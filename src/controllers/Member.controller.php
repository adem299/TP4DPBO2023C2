<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Club.class.php");
include_once("views/Member.view.php");

class MemberController {
  private $member;
  private $club;

  function __construct(){
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->club = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->member->open();
    $this->club->open();
    $this->member->getMemberJoin();
    $this->club->getClub();
    
    $data = array(
      'member' => array(),
      'club' => array()
    );
    while($row = $this->member->getResult()){
      array_push($data['member'], $row);
    }
    while($row = $this->club->getResult()){
      array_push($data['club'], $row);
    }
    $this->member->close();
    $this->club->close();

    $view = new MemberView();
    $view->render($data);
  }

  
  function add($data){
    $this->member->open();
    $this->member->add($data);
    $this->member->close();
    
    header("location:index.php");
  }

  function update($id) {
    $this->member->open();
    $this->member->update($id);
    $this->member->close();
        
    header("location:index.php");
  }


  function delete($id){
    $this->member->open();
    $this->member->delete($id);
    $this->member->close();

    header("location:index.php");
  }

  function formAdd() 
  {
    $this->club->open();
    $this->club->getClub();

    $dataClub = array();
    while($row = $this->club->getResult()){
      array_push($dataClub, $row);
    }

    $this->club->close();

    $view = new MemberView();
    $view->renderForm($dataClub);
  }

  function formUpdate($id){
    $this->member->open();
    $this->club->open();
    $this->member->getMemberById($id);
    $this->club->getClub();

    $data = array(
      'member' => array(),
      'club' => array()
    );
    while($row = $this->member->getResult()){
      array_push($data['member'], $row);
    }
    while($row = $this->club->getResult()){
      array_push($data['club'], $row);
    }

    $this->member->close();
    $this->club->close();
    $view = new MemberView();
    $view->renderFormUpdate($data);
  }



}