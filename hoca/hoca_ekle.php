<link rel="stylesheet" href="../for-og-ho.css">
<style>
    label {
        display : inline-block;
        width : 300px;
        margin-bottom : 9px;
        color: black;
        font-size: 23px;
    }
</style>
<title>Hoca Ekleme</title>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display : inline;">
    <label for="ad">Hoca Adı:</label>
    <input type="text" id="ad" name="ad" autocomplete="off">
    <br>
    <label for="tel">TEL:</label>
    <input type="text" id="tel" name="tel" autocomplete="off" maxlength="10" minlength="10" placeholder="10 Karakter">
    <br>
    <label for="yas">Yaş:</label>
    <input type="text" id="yas" name="yas" autocomplete="off">
    <br>
    <label for="brans">Hoca branşı:</label>
    <input type="text" id="brans" name="brans" maxlength="25" >
    <br>
    <label for="mez">Hocanın mezuniyet yeri:</label>
    <input type="text" id="mez" name="mez" maxlength="25" autocomplete="off">
    <br>
    <label for="sinif">Hocanın sorumlu oldugu sinif:</label>
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
        $yas = $_POST['yas'];
        $brans = $_POST['brans'];
        $mez = $_POST['mez'];
        $sinif = $_POST['sinif'];

        $ekle = mysqli_query($conn, "INSERT INTO hocalar VALUES('', '$ad','$tel','$yas','$brans', '$mez', '$sinif')");
        
        if ($ekle) 
            header("Location: index.html");
    }      
    mysqli_close($conn);
    