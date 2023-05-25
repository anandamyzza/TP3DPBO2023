<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Album.php');
include('classes/Artist.php');
include('classes/Genre.php');
include('classes/Template.php');

/* Membuat Instance Album, Membuka Koneksi, dan Menampilkan Data Album */
$listAlbum = new Album($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$listAlbum->open();
$listAlbum->getAlbumJoin();

/* SEARCH & SORTING DATA ALBUM */
if (isset($_POST['btn-search']))
{
    $listAlbum->searchAlbum($_POST['search']);
}
else if(isset($_POST['btn-sort']))
{
    $listAlbum->sortingAlbum($_POST['sorting']);
}
else
{
    $listAlbum->getAlbumJoin();
}

$data = null;
while ($row = $listAlbum->getResult())
{
    $data .= 
    '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 album-thumbnail">
            <a href="detail.php?id=' . $row['album_id'] . '">
                <div class="row justify-content-center">
                    <img src="assets/images/' . $row['album_cover'] . '" class="card-img-top" style="width: 200px;" alt="' . $row['album_cover'] . '">
                </div>
                <div class="card-body">
                    <p class="card-text album-name my-0">' . $row['album_name'] . '</p>
                    <p class="card-text artist-name">' . $row['artist_name'] . '</p>
                    <p class="card-text genre-name my-0">' . $row['genre_name'] . '</p>
                </div>
            </a>
        </div>    
    </div>';
}


$listAlbum->close();

$home = new Template('templates/skin.html');
$home->replace('DATA_ALBUM', $data);
$home->write();
