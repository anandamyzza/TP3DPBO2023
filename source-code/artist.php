<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Artist.php');
include('classes/Template.php');

/* Membuat Instance Artist, Membuka Koneksi, dan Menampilkan Data Album */
$artist = new Artist($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$artist->open();
$artist->getArtist();

/* SEARCH DATA ARTIST */
if (isset($_POST['btn-search']))
{
    $artist->searchArtist($_POST['search']);
}
else
{
    $artist->getArtist();
}

/* DISPLAY DATA ARTIST */
$view = new Template('templates/skintabel.html');
$mainTitle = 'Artist';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Artist Name</th>
<th scope="row">Action</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'Artist';

while ($div = $artist->getResult())
{
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['artist_name'] . '</td>
    <td style="font-size: 22px;">
        <a href="artist.php?id=' . $div['artist_id'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>
        &nbsp;
        <a href="artist.php?delete=' . $div['artist_id'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

/* ADD DATA ARTIST */
if (!isset($_GET['id']))
{
    if (isset($_POST['submit']))
    {
        if ($artist->addArtist($_POST) > 0)
        {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'artist.php';
            </script>";
        }
        else
        {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'artist.php';
            </script>";
        }
    }

    $title = 'Add';
    $type = '<button type="submit" class="btn btn-success" name="submit">Add Data</button>';
}

/* UPDATE DATA ARTIST */
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    if ($id > 0)
    {
        if (isset($_POST['submit']))
        {
            if ($artist->updateArtist($id, $_POST) > 0)
            {
                echo "<script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'artist.php';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('Data gagal diubah!');
                    document.location.href = 'artist.php';
                </script>";
            }
        }

        $artist->getArtistById($id);
        $row = $artist->getResult();

        $dataUpdate = $row['artist_name'];
        $title = 'Edit';
        $type = '<button type="submit" class="btn btn-primary" name="submit">Edit Data</button>';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

/* DELETE DATA ARTIST */
if (isset($_GET['delete']))
{
    $id = $_GET['delete'];
    if ($id > 0)
    {
        if ($artist->deleteArtist($id) > 0)
        {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'artist.php';
            </script>";
        }
        else
        {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'artist.php';
            </script>";
        }
    }
}

$artist->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('BUTTON_TYPE', $type);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
