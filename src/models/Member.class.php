<?php

class Member extends DB
{
    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function getMemberJoin()
    {
        $query = "SELECT members.id, members.name, members.email, members.phone, members.join_date, clubs.name_club FROM members JOIN clubs on members.id_club = clubs.id_club";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $club = $data['id_club'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$join_date', '$club')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {   
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $club = $data['id_club'];
        
        $query = "UPDATE members SET name='$name', email='$email', phone='$phone',join_date='$join_date', id_club='$club' where id='$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
}


?>