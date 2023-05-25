<?php

class Genre extends DB
{
    function getGenre()
    {
        $query = "SELECT * FROM genre";
        return $this->execute($query);
    }

    function getGenreById($id)
    {
        $query = "SELECT * FROM genre WHERE genre_id=$id";
        return $this->execute($query);
    }

    function searchGenre($keyword)
    {
        $query = "SELECT * FROM genre WHERE genre_name LIKE '%".$keyword."%'";
        return $this->execute($query);
    }

    function addGenre($data)
    {
        $name = $data['name'];
        $query = "INSERT INTO genre VALUES('', '$name')";
        return $this->executeAffected($query);
    }

    function updateGenre($id, $data)
    {
        $name = $data['name'];
        $query = "UPDATE genre SET genre_name='$name' WHERE genre_id=$id";
        return $this->executeAffected($query);
    }

    function deleteGenre($id)
    {
        $query = "DELETE FROM album WHERE genre = $id";
        $this->executeAffected($query);

        $query = "DELETE FROM genre WHERE genre_id = $id";
        return $this->executeAffected($query);
    }
}
