<style>
    table {
        border : 1px solid black;
        border-collapse : collapse; 
        margin-top : 8px;
    }
    .Lwidth {
        display : inline-block;
        width : 290px;
        margin-bottom : 9px;
        color: black;
        font-size: 23px;
    }
</style>

<title>Hoca Guncelleme</title>
<link rel="stylesheet" href="../for-og-ho.css">


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display : inline;">

    <label style="color: black; font-size: 23px;"  for="idsor">Güncellemek istdeiğiniz hoca ID girin:</label>
    <input type="text" id="idsor" name="idsor" >
    <br> <br> <br>

    <label class="Lwidth" for="id">Hoca ID:</label>
    <input type="text" id="id" name="id" maxlength="25">
    <br>
    
    <label class="Lwidth" for="ad">Hoca Adı:</label>
    <input type="text" id="ad" name="ad" maxlength="25">
    
    <br>
    <label class="Lwidth" for="tel">TEL:</label>
    <input type="text" id="tel" name="tel" maxlength="10" minlength="10" placeholder="10 Karakter">
    <br>
    <label class="Lwidth" for="yas">Yaş:</label>
    <input type="text" id="yas" name="yas" >
    
    <br>
    <label class="Lwidth" for="brans">Hoca branşı:</label>
    <input type="text" id="brans" name="brans" maxlength="25" style="margin: 5px;">
    <br>
    
    <label class="Lwidth" for="mez">Hocanın mezuniyet yeri:</label>
    <input type="text" id="mez" name="mez" maxlength="255">
    <br>
    
    <label class="Lwidth" for="sinif">Hocanın sorumlu oldugu sinif:</label>
    <input type="text" id="sinif" name="sinif" maxlength="5">
    <br> <br>
    <input class="submit" type="submit" name="guncelle" value="Güncelle" >
</form>
<a href="index.html"><button>Geri</button></a><br>

<?php
    require_once "../dbconnect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['guncelle'])){
        $idsorgu = $_POST['idsor'];

        $id = $_POST['id'];
        $ad = $_POST['ad'];
        $tel = $_POST['tel'];
        $yas = $_POST['yas'];
        $brans = $_POST['brans'];
        $mez = $_POST['mez'];
        $sinif = $_POST['sinif'];

        if (($_POST['id'])!="")
            $idgnc = mysqli_query($conn, "UPDATE hocalar SET ID = '$id' WHERE ID = '$idsorgu';");

        if ($_POST['ad'] != "")
            $idgnc = mysqli_query($conn, "UPDATE hocalar SET isim_soyisim = '$ad' WHERE ID = '$idsorgu';");

        if (($_POST['tel'])!="")
            $idgnc = mysqli_query($conn, "UPDATE hocalar SET TEL = '$tel' WHERE ID = '$idsorgu';");

        if (($_POST['yas'])!="")
            $idgnc = mysqli_query($conn, "UPDATE hocalar SET yaş = '$yas' WHERE ID = '$idsorgu';");

        if (($_POST['brans'])!="")
            $idgnc = mysqli_query($conn, "UPDATE hocalar SET branş = '$brans' WHERE ID = '$idsorgu';");

        if (($_POST['mez'])!="")
            $idgnc = mysqli_query($conn, "UPDATE hocalar SET mezuniyet_yeri = '$mez' WHERE ID = '$idsorgu';");

        if (($_POST['sinif'])!="")
            $idgnc = mysqli_query($conn, "UPDATE hocalar SET sorumlu_oldugu_sinif = '$sinif' WHERE ID = '$idsorgu';");
    } 
    

    $list = mysqli_query($conn, "SELECT * FROM hocalar ORDER BY id; ");

        echo "<br><table cellpadding = 10px >";
        echo "<tr bgcolor = #7fff00>";
        echo "<td>" . "ID" . "</td><td>" . "ISIM" . "</td><td>" . "TEL" . "</td><td>" . "YAŞ" . "</td><td>". "BRANŞ" ."</td><td>" . "MEZUNIYET YERI" . "</td><td>" . "SORUMLU OLDUĞU SINIF" . "</td>";
        echo "</tr>";
    
        
        $n = 1;
        while ($sat = mysqli_fetch_row($list))
        {
            if ($n == 1)
                echo "<tr bgcolor = #97A6E3>";
            else
                echo "<tr bgcolor = #EEE>";
                echo "<td>" . $sat[0] . "</td><td>" . $sat[1] . "</td><td>" . $sat[2] . "</td><td>" . $sat[3] . "</td><td>" . $sat[4] ."</td><td>" . $sat[5] . "</td><td style='text-align : center'>" . $sat[6] . "</td>";
                echo "</tr>";
            $n = 1 - $n;
        } 
        echo "</table>";
    
    mysqli_free_result($list);
    mysqli_close($conn);
