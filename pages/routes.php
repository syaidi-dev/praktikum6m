<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch($page){
        case '':
        case 'dashboard':
            file_exists("dashboard.php") ? include "dashboard.php" : include "404.php";
            break;
        case 'dosen':
            file_exists("dosen/dosen.php") ? include "dosen/dosen.php" : include "404.php";
            break;
        case 'dosencreate':
            file_exists("dosen/dosencreate.php") ? include "dosen/dosencreate.php" : include "404.php";
            break;
        case 'dosenupdate':
            file_exists("dosen/dosenupdate.php") ? include "dosen/dosenupdate.php" : include "404.php";
            break;
        case 'matakuliah':
            file_exists("matakuliah/matakuliah.php") ? include "matakuliah/matakuliah.php" : include "404.php";
            break;
        case 'matakuliah_create':
            file_exists("matakuliah/matakuliah_create.php") ? include "matakuliah/matakuliah_create.php" : include "404.php";
            break;
        case 'matakuliah_update':
            file_exists("matakuliah/matakuliah_update.php") ? include "matakuliah/matakuliah_update.php" : include "404.php";
            break;
        case 'matakuliah_delete':
            file_exists("matakuliah/matakuliah_delete.php") ? include "matakuliah/matakuliah_delete.php" : include "404.php";
            break;
        case 'tugas':
            file_exists("tugas/tugas.php") ? include "tugas/tugas.php" : include "404.php";
            break;
        case 'tugas_create':
            file_exists("tugas/tugas_create.php") ? include "tugas/tugas_create.php" : include "404.php";
            break;
        case 'tugas_update':
            file_exists("tugas/tugas_update.php") ? include "tugas/tugas_update.php" : include "404.php";
            break;
        case 'tugas_delete':
            file_exists("tugas/tugas_delete.php") ? include "tugas/tugas_delete.php" : include "404.php";
            break;
        default:
            include "404.php";
            break;
    }
} else {
    include "dashboard.php";
}
