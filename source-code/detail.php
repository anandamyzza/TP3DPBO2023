<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Album.php');
include('classes/Artist.php');
include('classes/Genre.php');
include('classes/Template.php');

$album = new Album($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$album->open();

$data = nulL;

/* DELETE DATA ALBUM */
if (isset($_GET['id_delete']))
{
    $id = $_GET['id_delete'];
    if ($id > 0)
    {
        if ($album->deleteAlbum($id) > 0)
        {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
        else
        {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
    }
}

/* SHOW DATA ALBUM */
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    if ($id > 0)
    {
        $album->getAlbumById($id);
        $row = $album->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail of ' . $row['album_name'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['album_cover'] . '" class="img-thumbnail" alt="' . $row['album_cover'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Album Name</td>
                                    <td>:</td>
                                    <td>' . $row['album_name'] . '</td>
                                </tr>
                                <tr>
                                    <td>Release Year</td>
                                    <td>:</td>
                                    <td>' . $row['album_release'] . '</td>
                                </tr>
                                <tr>
                                    <td>Artist</td>
                                    <td>:</td>
                                    <td>' . $row['artist_name'] . '</td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td>:</td>
                                    <td>' . $row['genre_name'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="create.php?id_edit=' . $row['album_id'] . '"><button type="button" class="btn btn-success text-white">Edit</button></a>
                <a href="detail.php?id_delete=' . $row['album_id'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
            </div>';
    }
}

$album->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_ALBUM', $data);
$detail->write();
