<?php

class Club extends DB
{

    function getClubById($id)
    {
        $query = "SELECT * FROM clubs WHERE id_club=$id";
        return $this->execute($query);
    }

    function getClub()
    {
        $query = "SELECT * FROM clubs";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name_club'];
        $founded = $data['founded_year'];
        $location = $data['location'];
        
        $query = "insert into clubs values ('', '$name', '$founded', '$location')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM clubs WHERE id_club = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {   
        $id = $data['id_club'];
        $name = $data['name_club'];
        $founded = $data['founded_year'];
        $location = $data['location'];
        $query = "UPDATE clubs SET name_club='$name', founded_year='$founded', location='$location' where id_club='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
}
