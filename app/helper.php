<?php
use App\Models\clientes;
use function PHPUnit\Framework\returnCallback;

    function userID()
    {
        return auth()->user()->id;
    }

    function money($number){
        return '$'.number_format($number,0,'.',',');
    }

    function numerosLetras($number){
        return App\Models\NumerosEnLetras::convertir($number,'Pesos',false,'Centavos');
    }

    function tipo_persona_sat($cliente){
        $cliente = clientes::findOrFail($cliente);
        return $cliente->tipo_sat; // 1 persona fisica, 2 persona moral
    }

    function tipo_persona_sat_empresa(){
        return 1; // 1 persona fisica, 2 persona moral
    }

    function tipo_persona_fisica_sat($cliente){  //cliente
        $cliente = clientes::findOrFail($cliente);
       // echo($cliente." HOLA:".$cliente->tipo_sat);
        return $cliente->clasifica_sat; // 1 resico, 2 otros
    }

        function tipo_persona_fisica_sat_empresa($cliente){  //cliente
        $cliente = clientes::findOrFail($cliente);
       // echo($cliente." HOLA:".$cliente->tipo_sat);
        return $cliente->tipo_sat; // 1 resico, 2 otros
    }
    function porcentaje_iva_sat(){
        return 16; 
    }