<?php
    namespace App\Services;

    use App\Models\Numbers;

    class NumbersService
    {
        public function get($fim = null) 
        {
            if ($fim) {
                return Numbers::seleciona($fim);
            } else {
                return Numbers::selecionaTodos();
            }
        }

    }