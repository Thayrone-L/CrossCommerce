<?php

set_error_handler("carrega", E_WARNING);
restore_error_handler();
function carrega($pagina)
{


    $conteudo = array();

    $url = "http://challenge.dienekes.com.br/api/numbers?page=" . $pagina;

    $resultado = json_decode(file_get_contents($url));


    if (count($resultado->numbers)) {
        try {
            foreach ($resultado->numbers as $num) {

                $conteudo[] = $num;
            }
        } catch (Exception $e) {
            echo "Ocorreu um erro de leitura na pagina $pagina, a mesma será armazenada para uma nova tentativa. cod:" . $e->getCode();
        }
        return $conteudo;
    } else {


        return null;
    }
}
