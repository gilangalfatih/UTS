<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
<?php

require_once "app/Mhsw.php";
$prodi = new prodi();
$rows = $prodi->tampil();

if(isset($_GET["cari"])){
    $rows = $prodi->cari($_GET["prodi"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['nim'])) $vprodi =$_GET['nim'];
else $vprodi ='';

if($vsimpan=='simpan' && ($prodi <>'')){
    $prodi->simpan();
    $rows = $prodi->tampil();
    $vid ='';
    $vprodi ='';
}

if($vaksi=="hapus")  {
    $prodi->hapus();
    $rows = $prodi->tampil();
}
if($vaksi=="cari")  {
    $rows = $prodi->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $prodi->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['prodi_id'];
        $vprodi = $row['prodi_nim'];
    }
 }

if ($vupdate=="update"){
    $prodi->update($vid,$vnim,$vnama,$valamat);
    $rows = $prodi->tampil();
    $vid ='';
    $vprodi ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vprodi ='';
}


?>

<form action="?" method="get">
<table cellspacing="20">
    <tr><td>PRODI</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" />
        <input type="text" name="prodi" value="<?php echo $vprodi; ?>" /></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>

    <table border="1" cellpadding="10" cellspacing="0" style="text-align:center">
    <tr>
        <th>NO</th>
        <th>PRODI</th>
        <th>AKSI</th>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['prodi']; ?></td>
            <td><a href="?id=<?php echo $row['id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id=<?php echo $row['id']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>