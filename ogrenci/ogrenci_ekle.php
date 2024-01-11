<link rel="stylesheet" href="../for-og-ho.css">
<title>Ogrenci Ekleme</title>
<style>
    label {
        display : inline-block;
        width : 150px;
        margin-bottom : 9px;
        color: black;
        font-size: 23px;
    }
</style>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display : inline;">
    <label for="ad">Öğrenci Adı</label>
    <input type="text" id="ad" name="ad" autocomplete="off">
    
    <label for="tel">TEL:</label>
    <input type="tel" id="tel" name="tel" maxlength="10" minlength="10" placeholder="10 Karakter" autocomplete="off">
<br>
    <label for="adres">Adres:</label>
    <input type="text" id="adres" name="adres" autocomplete="off">
    
    <label for="sinif">Öğrenci Sınıfı:</label>
    <input type="text" id="sinif" name="sinif" maxlength="25" >
    <br>
    <input class="submit" type="submit" name="ekle" value="Ekle" >
</form>
<a href="index.html"><button>Geri</button></a>
<?php
    require_once "../dbconnect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['ekle']))
    {
        $ad = $_POST['ad'];
        $tel = $_POST['tel'];
        $adres = $_POST['adres'];
        $sinif = $_POST['sinif'];

        $ekle = mysqli_query($conn, "INSERT INTO ogrenciler VALUES('', '$ad','$tel','$adres','$sinif')");
        
        if ($ekle) 
            header("Location: index.html");
    }      
    mysqli_close($conn);
    