<?php
  class ClubView{
    // render club page
    public function render($data){
      $no = 1;
      $dataClub = null;
      foreach($data as $val){
        list($id, $nameclub, $foundedyear, $location) = $val;
          $dataClub .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $nameclub . "</td>
                  <td>" . $foundedyear . "</td>
                  <td>" . $location . "</td>
                  <td style='font-size: 22px;'>
                  <a href='club.php?id_edit=" . $val["id_club"] . "'><button type='button' class='btn btn-warning text-white'>Edit</button></a>
                  <a href='club.php?hapus=" . $val["id_club"] . "'><button type='button' class='btn btn-danger'>Delete</button></a>
                  </td>";
          $dataClub .= "</tr>";

      }

      $tpl = new Template("templates/club.html");
      $tpl->replace("DATA_TABEL", $dataClub);
      $tpl->write();
    }

    // render form add page club
    public function renderForm() {
      $dataForm = null;
      $dataForm = 
          '<label for="name_club">Name:</label>
          <input type="text" id="name_club" name="name_club" required>
          <label for="founded_year">Founded Year:</label>
          <input type="text" id="founded_year" name="founded_year" required>
          <label for="location">Location:</label>
          <input type="text" id="location" name="location" required>
          <br>
          ';


      $tpl = new Template("templates/form.html");
      $tpl->replace("BTN_LINK", "add");
      $tpl->replace("TITLE_TABLE", "Create New Clubs");
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->write();
    }

    // render form update page club
    public function renderFormUpdate($data) {
      $dataForm = null;
      foreach($data as $val){
        list($id, $nameclub, $foundedyear, $location) = $val;
      $dataForm = 
          "
          <input type='hidden' name='id_club' value='$id' class='form-control' required>
          <label for='name_club'>Name:</label>
          <input type='text' id='name_club' name='name_club' value='$nameclub' required>
          <label for='founded_year'>Founded Year:</label>
          <input type='text' id='founded_year' name='founded_year' value='$foundedyear' required>
          <label for='location'>Location:</label>
          <input type='text' id='location' name='location' value='$location' required >
          <br>
          ";
      }

      $tpl = new Template("templates/form.html");
      $tpl->replace("BTN_LINK", "update");
      $tpl->replace("TITLE_TABLE", "Update Clubs");
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->write();
    }
  }