@extends('property.master')

@section('content')
<h1> Edição de imóveis </h1>


<p><a href="<?= url('/imoveis')?> ">Voltar !</a></p>

<?php
    if (isset($prop)){
        $prop = $prop[0];
?>
<form action="<?= url('/imoveis/update', ['id' => $prop->id]) ?>" method="post">

    <?= csrf_field(); ?>
    <?= method_field("PUT"); ?>

    <input type="hidden" name="name" id="name"  value="<?= $prop->name ?>" >
    <label for="title">Título</label>
    <br>
    <input type="text" name="title" id="title" value="<?= $prop->title ?>" >

    <br>

    <label for="description">Descrição</label>
    <br>
    <textarea name="description" id="description" cols="30" rows="10"> <?= $prop->description ?> </textarea>

    <br>

    <label for="rental_price">Valor locação</label>
    <br>
    <input type="number" step="2" name="rental_price" id="rental_price"  value="<?= $prop->rental_price ?>" >

    <br>

    <label for="sale_price">Valor compra</label>
    <br>
    <input type="number" step="2" name="sale_price" id="sale_price"  value="<?= $prop->sale_price ?>" >

    <br>

    <button type="submit"> Atualizar Imóvel</button>
</form>
<?php
    }
?>
@endsection
