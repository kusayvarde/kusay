<style>
    table {
        border : 1px solid black;
        border-collapse : collapse; 
        margin-top : 8px;
    }
    .Lwidth {
        display : inline-block;
        width : 140px;
        margin-bottom : 9px;
        color: black;
        font-size: 23px;
    }
</style>
<title>Ogrenci Guncelleme</title>

<link rel="stylesheet" href="../for-og-ho.css">


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display : inline;">

    <label style="color: black; font-size: 23px;" for="idsor">Güncellemek istdeiğiniz öğrenci numarasını girin:</label>
    <input type="text" id="idsor" name="idsor" >
    <br> <br> <br>

    <label class="Lwidth" for="id">Öğrenci no: </label>
    <input type="text" id="id" name="id" maxlength="5">
    
    <label class="Lwidth" for="ad">Öğrenci Adı: </label>
    <input type="text" id="ad" name="ad" maxlength="25">
    <br>
    <label class="Lwidth" for="tel">TEL: </label>
    <input type="text" id="tel" name="tel" maxlength="10" minlength="10">

    <label class="Lwidth" for="adres">Adres: </label>
    <input type="text" id="adres" name="adres" >
    <br>
    <label class="Lwidth" for="sinif">Öğrenci Sınıfı:</label>
    <input type="text" id="sinif" name="sinif" maxlength="4">
    <br>
    <br>
    <input class="submit" type="submit" name="guncelle" value="Güncelle" >
</form>
<a href="index.html"><button>Geri</button></a>
<?php
    require_once "../dbconnect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['guncelle'])){
        $idsorgu = $_POST['idsor'];

        $id = $_POST['id'];
        $ad = $_POST['ad'];
        $tel = $_POST['tel'];
        $adres = $_POST['adres'];
        $sinif = $_POST['sinif'];

        
        if (($_POST['id'])!="")
            $idgnc = mysqli_query($conn, "UPDATE ogrenciler SET ID = '$id' WHERE ID = '$idsorgu';");
    
        if ($_POST['ad'] !="")
            $adgnc = mysqli_query($conn, "UPDATE ogrenciler SET Isim_soyisim = '$ad' WHERE ID = '$idsorgu';");
    
        if (($_POST['tel'])!="")
            $telgnc = mysqli_query($conn, "UPDATE ogrenciler SET TEL = '$tel' WHERE ID = '$idsorgu';");
    
        if (($_POST['adres'])!="")
            $adresgnc = mysqli_query($conn, "UPDATE ogrenciler SET adres = '$adres' WHERE ID = '$idsorgu';");
    
        if (($_POST['sinif'])!="")
            $sinifgnc = mysqli_query($conn, "UPDATE ogrenciler SET sınıf = '$sinif' WHERE ID = '$idsorgu';");

    } 

    
    $list = mysqli_query($conn, "SELECT * FROM ogrenciler ORDER BY ID; ");

        echo "<table cellpadding = 10px >";
        echo "<tr bgcolor = 7fff00>";
        echo "<td>" . "ID" . "</td><td>" . "ISIM" . "</td><td>" . "TEL" . "</td><td>" . "ADRES" . "</td><td>" . "SINIF" . "</td>";
        echo "</tr>";
    
        $n = 1;
        while ($sat = mysqli_fetch_row($list))
        {
            if ($n == 1)
                echo "<tr bgcolor = #97A6E3>";
            else
                echo "<tr bgcolor = #EEE>";
            echo "<td>" . $sat[0] . "</td><td>" . $sat[1] . "</td><td>" . $sat[2] . "</td><td>" . $sat[3] . "</td><td>" . $sat[4] . "</td>";
            echo "</tr>";
            $n = 1 - $n;
        } 
        echo "</table>";

    mysqli_free_result($list);
    mysqli_close($conn);
