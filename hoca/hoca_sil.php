<link rel="stylesheet" href="../for-og-ho.css">
<title>Hoca Silme</title>

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
    <label for="ad">Hoca Adı:</label>
    <input type="text" id="ad" name="ad" maxlength="25" required autocomplete="off">
    
    <br>
    <label for="brans">Hoca branşı:</label>
    <input type="text" id="brans" name="brans" maxlength="25" required>
    <br>
    <input class="submit" type="submit" name="sil" value="Sil" >
</form>
<a href="index.html"><button>Geri</button></a>
<?php
    require_once "../dbconnect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sil'])){
        $ad = $_POST['ad'];
        $brans = $_POST['brans'];
        
        $kontrolsorgu = mysqli_query($conn, "SELECT ID FROM hocalar WHERE isim_soyisim = '$ad' and Branş = '$brans';");
        
        $sil = mysqli_query($conn, "DELETE FROM hocalar WHERE isim_soyisim = '$ad' and Branş = '$brans';");
        
        if (mysqli_num_rows($kontrolsorgu) <> 0)
            header("Location: index.html");
        
        else 
            echo "verilen nitelikte hoca bulunmamaktadir!";
    } 
    mysqli_close($conn);
