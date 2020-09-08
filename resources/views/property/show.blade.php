@extends('property.master')

@section('content')

<h1> Dados do imóvel</h1>

<p><a href="<?= url('/imoveis')?> ">Voltar !</a></p>
<?php
    if (isset($property)){
        echo json_encode($property, JSON_PRETTY_PRINT);
    }
?>

@endsection
