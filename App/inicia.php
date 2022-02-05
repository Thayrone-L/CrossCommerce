
<?php
include "carrega.php";
include "guarda.php";
include "organiza.php";


set_error_handler("inicia", E_WARNING);
restore_error_handler();
inicia();
function inicia() // percorre as paginas pegando os numeros
{

    $pagina = 1;

    $vazias = 0;
    $pgNull = array();
    $resultados = array();
    echo "<h1>Aguarde carregando<h1><br/>";

    do {


 
        set_time_limit(0);
        try {
            $resposta = carrega($pagina);
        } catch (Exception $e) {
            echo "<br/>Ocorreu um erro de leitura na pagina $pagina, a mesma será armazenada para uma nova tentativa. cod:" . $e->getCode()."<br/>";
        }

        if ($resposta == null) {

            $vazias++;
            $pgNull[] = $pagina;
        } else {
            foreach ($resposta as $pg) {
                $resultados[] = $pg;
            }

            if ($vazias > 1) {
                $vazias = 0;
            }
        }
        
        $pagina++;
    
    

    } while ($vazias < 3); //limita a 3 paginas vazias seguidas para evitar erros.



    // repete as paginas que deram erro
    foreach ($pgNull as $tentaPg) {

        set_time_limit(0);
        $resposta = carrega($tentaPg);
        foreach ($resposta as $pg) {
            $resultados[] = $pg;
        }
    }
    echo "<br/><h1>Organizando<h1><br/>";
    $organizado = organiza($resultados);
    echo "<br/><h1>Salvando<h1><br/>";
    guarda($organizado);
    echo"<script>history.go(-1)</script>";
}



?>