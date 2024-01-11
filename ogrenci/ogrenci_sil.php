<link rel="stylesheet" href="../for-og-ho.css">
<style>
    label {
        display : inline-block;
        width : 150px;
        margin-bottom : 9px;
        color: black;
        font-size: 23px;
    }
</style>
<title>Ogrenci Silme</title>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display : inline;">
    <label for="ad">Öğrenci Adı :</label>
    <input type="text" id="ad" name="ad" maxlength="25" required autocomplete="off">
    
    <br>
    <label for="sinif">Öğrenci Sınıfı:</label>
    <input type="text" id="sinif" name="sinif" maxlength="5" required>
    <br>
    <input class="submit" type="submit" name="sil" value="Sil" >
</form>
<a href="index.html"><button>Geri</button></a>

<?php
    require_once "../dbconnect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sil'])){
        $ad = $_POST['ad'];
        $sinif = $_POST['sinif'];
        
        $kontrolsorgu = mysqli_query($conn, "SELECT ID FROM ogrenciler WHERE Isim_soyisim = '$ad' and sınıf = '$sinif';");
        
        $sil = mysqli_query($conn, "DELETE FROM ogrenciler WHERE Isim_soyisim = '$ad' and sınıf = '$sinif';");
        
        if (mysqli_num_rows($kontrolsorgu) <> 0)
            header("Location: index.html");
        
        else 
            echo "verilen nitelikte ogrenci bulunmamaktadir!";
    } 
    mysqli_close($conn);
