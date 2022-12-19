<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <title>Idiomas</title>

</head>

<body>
  <div class="cabecera_subhome">
    <div class="contenedor_imagen_subhome">
      <img src="logo.png" class="imagen_subhome">
    </div>
  </div>
  <div class="subtitulo"><img id="subFoto" src="fotoIdiomas.png">
  </div>

  <?php

    $xml = simplexml_load_file("cursos.xml");
    $listaConvocatorias = $xml->xpath("/web/convocatorias/convocatoria[@nom='INGLES']");

    foreach ($listaConvocatorias as $convocatoria) {

        $nombreConvocatoria = $convocatoria->nombre;
        $nom = $convocatoria['nom'];
        $fondoConvocatoria = $convocatoria->fondo;
        $convocatoriaConvocatoria = $convocatoria->informacion;
        $logoConvocatoria = $convocatoria->logo;
        $preinscripcionConvocatoria = $convocatoria->preinscripcion;

        $listaCursos = $xml->xpath("/web/cursos/curso[@id='" . $nom . "']");
    ?>
  <div class="titulo_subhome1">
    <h1 class="titulo_principal"><?= $nombreConvocatoria ?></h1>
  </div>
  <!-- AQUÍ EMPIEZAN LOS CURSOS DE INGLES" -->
  <?php
        foreach ($listaCursos as $cursos) {
            $tituloCursos = $cursos->titulo;
            $etiqueta1Cursos = $cursos->etiquetas->etiqueta1;
            $etiqueta2Cursos = $cursos->etiquetas->etiqueta2;
            $etiqueta3Cursos = $cursos->etiquetas->etiqueta3;
            $etiqueta4Cursos = $cursos->etiquetas->etiqueta4;
            $inicioCursos = $cursos->inicio;
            $finCursos = $cursos->fin;
            $horarioCursos = $cursos->horario;
            $precioCursos = $cursos->precio;
            $infoCursos = $cursos->info;
            $mod1Cursos = $cursos->modulos->mod1;
            $mod2Cursos = $cursos->modulos->mod2;
            $mod3Cursos = $cursos->modulos->mod3;
            $temarioCursos = $cursos->temario;

            $etiquetaFinal = "";
            $listaEtiquetas = explode(",", $cursos->etiquetas);
            foreach ($listaEtiquetas as $etiqueta) {

                $etiquetaFinal = $etiquetaFinal . "<div class='etiq' >$etiqueta</div>";
            }

        ?>

  <div id='contenedor_ingles1' style="background-color:<?= $fondoConvocatoria ?>;">
    <div class='item11'><b><?= $tituloCursos ?></b><br>
      <hr id="tit">
    </div>
    <div class='item12'><img id="logoCambr" src="cambridge.png"></div>
    <div class='item13'><?= $etiquetaFinal ?></div>
    <div class='item14'><?= $infoCursos ?></div>
    <div class='item15'><b>Inicio: </b><?= $inicioCursos ?></div>
    <div class='item16'><b>Fin: </b><?= $finCursos ?></div>
    <div class='item17'><b>Horarios:</b> <?= $horarioCursos ?></div>
    <div class='item18'><b>Precios:</b> <?= $precioCursos ?></div>
    <div class="item19"><button id="botonPre"><a class="enlace_preinscripcion"
          href="https://www.paucasals.com/gestion/formularioAltaPreinscripcion.php?tipo=trabajadores"
          target="formularioPreinscripcion"
          onclick="document.getElementById('contenedorPreinscripcion').style.visibility='visible';document.getElementById('contenedorPreinscripcion').style.zIndex='20';">Pre-inscripción</a></button>
    </div>
  </div>
  <br><br>
  <?php
        }
    }
    ?>


</body>

</html>