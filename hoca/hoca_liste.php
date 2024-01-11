<style>
    table{
        border : 1px solid black;
        border-collapse : collapse;
    }
</style>
<title>Hoca Listesi</title>


<link rel="stylesheet" href="../for-og-ho.css">

<?php
    require_once "../dbconnect.php";
    
    $ad = $_GET['ara'];
    
    $list = mysqli_query($conn, "SELECT * FROM hocalar WHERE isim_soyisim LIKE '%$ad%' ORDER BY id; ");

if (mysqli_num_rows($list) == 0)
        echo "Hoca bulunamadı!";
    else 
    {
        echo "<table cellpadding = 10px >";
        echo "<tr bgcolor = #DCF204>";
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
    }
    echo "<br><a href='index.html'><button>Geri</button></a>";
    mysqli_free_result($list);
    mysqli_close($conn);
    
    
    
    
    
    
    
    