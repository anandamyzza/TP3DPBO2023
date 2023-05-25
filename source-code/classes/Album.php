<?php

class Album extends DB
{
    function getAlbumJoin()
    {
        $query = "SELECT * FROM album JOIN artist ON album.artist=artist.artist_id JOIN genre ON album.genre=genre.genre_id ORDER BY album.album_id";

        return $this->execute($query);
    }

    function getAlbum()
    {
        $query = "SELECT * FROM album";
        return $this->execute($query);
    }

    function getAlbumById($id)
    {
        $query = "SELECT * FROM album JOIN artist ON album.artist=artist.artist_id JOIN genre ON album.genre=genre.genre_id WHERE album_id=$id";
        return $this->execute($query);
    }

    function searchAlbum($keyword)
    {
        $query = "SELECT * FROM album JOIN artist ON album.artist=artist.artist_id JOIN genre ON album.genre=genre.genre_id WHERE album_name LIKE '%".$keyword."%'";
        return $this->execute($query);
    }
    
    function sortingAlbum($keyword)
    {
        if($keyword == "asc")
        {
            $query = "SELECT * FROM album JOIN artist ON album.artist=artist.artist_id JOIN genre ON album.genre=genre.genre_id ORDER BY album.album_name";
            return $this->execute($query);
        }
        else if($keyword == "desc")
        {
            $query = "SELECT * FROM album JOIN artist ON album.artist=artist.artist_id JOIN genre ON album.genre=genre.genre_id ORDER BY album.album_name DESC";
            return $this->execute($query);
        }
    }

    function addAlbum($data, $file)
    {
        $album_name = $data['album_name'];
        $release_year = $data['release_year'];
        $artist = $data['artist'];
        $genre = $data['genre'];

        $temp = $file['file_image']['tmp_name'];
        $cover = $file['file_image']['name'];
        move_uploaded_file($temp, 'assets/images/'.$cover);
        
        $query = "INSERT INTO album VALUES('', '$album_name', '$cover', '$release_year', '$artist', '$genre')";

        return $this->executeAffected($query);
    }

    function updateAlbum($id, $data, $file)
    {
        $album_name = $data['album_name'];
        $release_year = $data['release_year'];
        $artist = $data['artist'];
        $genre = $data['genre'];

        $temp = $file['file_image']['tmp_name'];
        $cover = $file['file_image']['name'];
        move_uploaded_file($temp, 'assets/images/'.$cover);
        
        $query = "UPDATE album SET album_name='$album_name', album_cover = '$cover', album_release = '$release_year', artist = '$artist', genre = '$genre' WHERE album_id = $id";

        return $this->executeAffected($query);
    }

    function deleteAlbum($id)
    {
        $query = "DELETE FROM album WHERE album_id = $id";
        return $this->executeAffected($query);
    }
}
