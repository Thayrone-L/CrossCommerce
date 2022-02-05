<?php

function organiza($res)
{
    ini_set('memory_limit', '-1');
    set_time_limit(0);
    $tam = count($res);
    if ($tam <= 1) {
        return $res;
    } else {
        $pivot = $res[$tam - 1];
        $esq = array();
        $dir = array();
        for ($i = 0; $i < $tam - 1; $i++) {
            if ($res[$i] < $pivot) {
                $esq[] = $res[$i];
            } else {
                $dir[] = $res[$i];
            }
        }
        $organizado = array_merge(organiza($esq), array($pivot), organiza($dir));
        return $organizado;
    }
}

    

