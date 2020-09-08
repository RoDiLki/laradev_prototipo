@extends('property.master')

@section('content')
<h1> Cadastro de imóveis </h1>

<form action="<?= url('/imoveis/store')?>" method="post">

    <?= csrf_field(); ?>

    <label for="title">Título</label>
    <br>
    <input type="text" name="title" id="title">

    <br>

    <label for="description">Descrição</label>
    <br>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <br>

    <label for="rental_price">Valor locação</label>
    <br>
    <input type="number" step="2" name="rental_price" id="rental_price">

    <br>

    <label for="sale_price">Valor compra</label>
    <br>
    <input type="number" step="2" name="sale_price" id="sale_price">

    <br>

    <button type="submit"> Cadastrar Imóvel</button>
</form>
@endsection
