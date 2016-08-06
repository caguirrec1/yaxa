<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery/jquery-1.12.1.min.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/Yaxa.js', CClientScript::POS_END);
?>

<h1> Yaxa </i></h1>

<ul>estas son las acciones que se pueden ejecutar por request comun o ajax</ul>
<li>registrar actores es un post request a url/yaxa/index.php/actor/crear con : id,name,lastname como datos</li>
<li>registrar peliculas es un post request a  url/yaxa/index.php/movie/new con : id,name y array de actores</li>
<li>buscar actores get a url/yaxa/index.php/actor/findById con : id  actor</li>
<li>actores asignados a una pelicula url/yaxa/index.php/movie/getActors con id de pelicula</li>
<li>peliculas de un actor url/yaxa/index.php/actor/getActorMovies con id de actor</li>
<p></p>

