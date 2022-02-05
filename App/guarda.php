<?php
require_once '../vendor/autoload.php';


function guarda($completo)
{
    ini_set('memory_limit', '-1');
    set_time_limit(0);

    
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    if (!$conn) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    echo "<br/>Conectado com successo";
             
            foreach ($completo  as $i => $num) {

                $sql = "INSERT INTO numbers (id, numbers) VALUES ( $i, $num)";
                if (mysqli_query($conn, $sql)) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
            }
    echo "<br/>Gravado";
        mysqli_close($conn);

}
