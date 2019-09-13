<?php		
function init($multiple) 
{
        echo "<tr>";
            echo "<th></th>";		
        for( $i = 1; $i <= $multiple; $i++ ) 
        {			
            echo "<th>{$i}</th>";
        }		
        echo "</tr>";		
        for( $i = 1; $i <= $multiple; $i++ ) 
        {			
            echo "<tr>";			
                echo "<th>{$i}</th>";			
            for( $j = 1; $j <= $multiple; $j++ ) 
            {				
                echo "<td>";
                $proizvod=$i*$j; 
                ?>
                <form action="" method="get">
                <input type="datetime" style="display:none" value="<?php echo date('Y-m-d G:i:s'); ?>" name="datum">
                <input type="number" style="display:none" value="<?php echo htmlspecialchars($i); ?>" name="faktor1">
                <input type="number" style="display:none" value="<?php echo htmlspecialchars($j); ?>" name="faktor2">          
                <input type="number" style="display:none" value="<?php echo htmlspecialchars($proizvod); ?>" name="proizvod">
                <input type="submit" value="<?php echo htmlspecialchars($i.'x'.$j); ?>" name="dugme">
                    </form>
                    <?php
                echo "</td>";		
            }			
            echo "</tr>";		
        }	
}?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tablica mnozenja</title>

    <link href="styles.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php
require_once('includes/config.php');
$konekcija=mysqli_connect('localhost',
'root',
'',
'mnozenje');

if(isset($_GET['dugme']))
{
   ?><h1>Rezultat je: <?php echo $_GET['dugme'] ?> = <?php  echo $_GET['proizvod']?> </h1>;
   <?php
   $upit = mysqli_query(
    $konekcija,
    "INSERT INTO tablica (`id`, `faktor1`, `faktor2`, `operacija`, `rezultat`,`datum` ) 
    VALUES ('DEFAULT', '".$_GET['faktor1']."', '".$_GET['faktor2']."',  '*' , '".$_GET['proizvod']."', '".$_GET['datum']."'  )") ;
}
?>
<table>
    <?php
    $multiple = 10;			
    init($multiple);
    ?>
</table>
</body>
</html>