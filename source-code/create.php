<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Album.php');
include('classes/Artist.php');
include('classes/Genre.php');
include('classes/Template.php');

$view = new Template('templates/skinform.html');

$album = new Album($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$album->open();

$genre_dropdown = null;
$artist_dropdown = null;
$album_name_edit = null;
$release_year_edit = null;

/* Syarat If */
if (!isset($_GET['id_edit'])) // Jika bukan id_edit.
{
    if (isset($_POST['submit'])) // Maka lakukan proses add data album.
    {
        if ($album->addAlbum($_POST, $_FILES) > 0)
        {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'index.php';
            </script>";
        }
        else
        {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'index.php';
            </script>";
        }
    }

    /* GET ARTIST DROPDOWN OPTION */
    $artist = new Artist($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $artist->open();
    $artist->getArtist();
    while ($row = $artist->getResult())
    {
        $artist_dropdown .= "<option value=". $row['artist_id']. ">" . $row['artist_name'] . "</option>";
    }
    $artist->close();

    /* GET GENRE DROPDOWN OPTION */
    $genre = new Genre($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $genre->open();
    $genre->getGenre();
    while ($row = $genre->getResult())
    {
        $genre_dropdown .= "<option value=". $row['genre_id']. ">" . $row['genre_name'] . "</option>";
    }
    $genre->close();

    $title = 'Add';
    $type = '<button type="submit" class="btn btn-success" name="submit" form="data">Add Data</button>';
}
else if (isset($_GET['id_edit'])) // Jika id_edit.
{
    $id = $_GET['id_edit']; // Maka lakukan proses edit data album.
    if ($id > 0)
    {
        if (isset($_POST['submit']))
        {
            if ($album->updateAlbum($id, $_POST, $_FILES) > 0)
            {
                echo "<script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('Data gagal diubah!');
                    document.location.href = 'index.php';
                </script>";
            }
        }

        /* GET ATTRIBUTES */
        $album->getAlbumById($id);
        $album_id = $album->getResult();
        $album_name_edit = $album_id['album_name'];
        $release_year_edit = $album_id['album_release'];

        /* GET ARTIST DROPDOWN OPTION */
        $artist = new Artist($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
        $artist->open();
        $artist->getArtist();

        while ($row = $artist->getResult())
        {
            if($album_id['artist'] == $row['artist_id']) // GET SPECIFIC OPTION
            {
                $artist_dropdown .= "<option value=". $row['artist_id']. " selected>" . $row['artist_name'] . "</option>";
            }
            else
            {
                $artist_dropdown .= "<option value=". $row['artist_id']. ">" . $row['artist_name'] . "</option>";
            }
        }
        $artist->close();

        /* GET GENRE DROPDOWN OPTION */
        $genre = new Genre($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
        $genre->open();
        $genre->getGenre();

        while ($row = $genre->getResult())
        {
            if($album_id['genre'] == $row['genre_id']) // GET SPECIFIC OPTION
            {
                $genre_dropdown .= "<option value=". $row['genre_id']. " selected>" . $row['genre_name'] . "</option>";
            }
            else
            {
                $genre_dropdown .= "<option value=". $row['genre_id']. ">" . $row['genre_name'] . "</option>";
            }
        }
        $genre->close();

        $title = 'Edit';
        $type = '<button type="submit" class="btn btn-primary" name="submit" form="data">Edit Data</button>';
    }
}

$album->close();
$view->replace('DATA_MAIN_TITLE', $title);
$view->replace('BUTTON_TYPE', $type);
$view->replace('ALBUM_NAME', $album_name_edit);
$view->replace('RELEASE_YEAR', $release_year_edit);
$view->replace('ARTIST_DROPDOWN', $artist_dropdown);
$view->replace('GENRE_DROPDOWN', $genre_dropdown);
$view->write();