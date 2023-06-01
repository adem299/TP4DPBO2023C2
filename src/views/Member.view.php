<?php

  class MemberView {
        // render club member
    public function render($data){
      $no = 1;
      $dataMember = null;
      $dataClub = null;
      foreach($data['member'] as $val){
        list($id, $name, $email, $phone, $joindate, $id_club) = $val;
        $dataMember .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $joindate . "</td>
                <td>" . $id_club . "</td>
                <td style='font-size: 22px;'>
                <a href='index.php?id_edit=" . $val["id"] . "'><button type='button' class='btn btn-warning text-white'>Edit</button></a>
                <a href='index.php?hapus=" . $val["id"] . "'><button type='button' class='btn btn-danger'>Delete</button></a>
                </td>";
        $dataMember .= "</tr>";
      }


      $tpl = new Template("templates/index.html");

      $tpl->replace("DATA_TABEL", $dataMember);
      $tpl->write(); 
    }

    // render form add member
    public function renderForm($data) {
      $dataForm = null;

      $dataClub = null;
      foreach($data as $val) {
        list($id, $nameclub) = $val;
        $dataClub .="<option value='".$id."'>".$nameclub."</option>";
      }

      $dataForm .= "<label> NAME: </label>
      <input type='text' name='name' class='form-control'> <br>
      
      <label> EMAIL: </label>
      <input type='text' name='email' class='form-control'> <br>
     
      <label> PHONE: </label>
      <input type='text' name='phone' class='form-control'> <br>

      <label> JOIN DATE: </label>
      <input type='date' name='join_date' class='form-control'> <br>
      
      <div class='mb-5'>
      <label> Club: </label>
        <select class='custom-select form-control' name='id_club' required>
            ". $dataClub ."
        </select>
      </div>

      ";

      $tpl = new Template("templates/form.html");
      $tpl->replace("TITLE_TABLE", " Create New Members");
      $tpl->replace("BTN_LINK", "add");
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->replace("DATA_CLUB", $dataClub);
      $tpl->write();
    }

    // render form update member
    public function renderFormUpdate($data) {
      $dataMember = null;
      $dataClub = null;
      foreach ($data['member'] as $val) {
        list($id, $name, $email, $phone, $date, $id_club) = $val;
    
        $dataMember .= "
            <input type='hidden' name='id' value='$id' class='form-control' required> <br>
            <label> NAME: </label>
            <input type='text' name='name' value='$name' class='form-control' required> <br>
            <label> EMAIL: </label>
            <input type='text' name='email' value='$email' class='form-control' required> <br>
            <label> PHONE: </label>
            <input type='text' name='phone' value='$phone' class='form-control' required> <br>
            <label> JOIN DATE: </label>
            <input type='date' name='join_date' value='$date' class='form-control' required> <br>
            <div class='mb-5'>
                <label> Club: </label>
                <select class='custom-select form-control' name='id_club' required>";
    
                    foreach ($data['club'] as $clubVal) {
                        list($clubId, $clubName) = $clubVal;
                
                        if ($clubId == $id_club) {
                            $dataMember .= "<option selected value='$clubId'>$clubName</option>";
                        } else {
                            $dataMember .= "<option value='$clubId'>$clubName</option>";
                        }
                    }
    
        $dataMember .= "
                </select>
            </div>";
            
      }
      $tpl = new Template("templates/form.html");
      $tpl->replace("TITLE_TABLE", "Edit Members");
      $tpl->replace("BTN_LINK", "update");
      $tpl->replace("DATA_FORM", $dataMember);
      $tpl->replace("DATA_CLUB", $dataClub);
      $tpl->write();
    }
  }
?>