@extends('property.master')

@section('content')
<h1> Listagem imóveis </h1>



<?php

    if (isset($properties)){

        echo "<table border='1'>";
        echo "<tr>
                <td>Título</td>
                <td>Valor de Locação</td>
                <td>Valor de compra</td>
                <td>Ações</td>
            </tr>";

        foreach ($properties as $property){
            $show = url("/imoveis/".$property->name);
            $remove = url("/imoveis/remover/".$property->name);
            $edt = url("/imoveis/editar/".$property->name);

            echo "<tr>
                    <td>{$property->title}</td>
                    <td>{$property->rental_price}</td>
                    <td>{$property->sale_price}</td>
                    <td>
                        <a href='{$edt}'>Editar</a> !
                        <a href='{$show}'>Ver</a> !
                        <a href='{$remove}'>Remover</a>
                    </td>
                </tr>";

        }
        echo "</table>";
    }
?>

@endsection
