<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <title>Cursos</title>

</head>

<body>
  <div class="contenedor_imagen_subhome">
    <a href="./index.php">
      <img src="logo.png" class="imagen_subhome">
    </a>
  </div>
  <a href="./index.php">Home</a>
  <a href="./cursos.php">Cursos</a>
  <a href="./idiomas.php">Idiomas</a>
  <div class="subtitulo"><img id="subFoto" src="fraseIns.png">
  </div>

  <?php

  $xml = simplexml_load_file("cursos.xml");
  $listaConvocatorias = $xml->xpath("/web/convocatorias/convocatoria[@nom!='INGLES']");

  foreach ($listaConvocatorias as $convocatoria) {

    $nombreConvocatoria = $convocatoria->nombre;
    $nom = $convocatoria['nom'];
    $fondoConvocatoria = $convocatoria->fondo;
    $convocatoriaConvocatoria = $convocatoria->informacion;
    $logoConvocatoria = $convocatoria->logo;
    $preinscripcionConvocatoria = $convocatoria->preinscripcion;

    $listaCursos = $xml->xpath("/web/cursos/curso[@id='" . $nom . "']");
  ?>
  <div class="titulo_subhome">

    <h1 class="titulo_principal"><?= $nombreConvocatoria ?></u></h1>
  </div>
  <?php
    foreach ($listaCursos as $cursos) {
      $tituloCursos = $cursos->titulo;
      $inicioCursos = $cursos->inicio;
      $finCursos = $cursos->fin;
      $horarioCursos = $cursos->horario;
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
  <div id='contenedor_cursos1' style="background-color:<?= $fondoConvocatoria ?>;">
    <div class='item1'>
      <h1><?= $tituloCursos ?></h1>
    </div>
    <div class='item2'><button id="botonPre"><a class="enlace_preinscripcion"
          href="https://www.paucasals.com/gestion/formularioAltaPreinscripcion.php?tipo=trabajadores"
          target="formularioPreinscripcion"
          onclick="document.getElementById('contenedorPreinscripcion').style.visibility='visible';document.getElementById('contenedorPreinscripcion').style.zIndex='20';">Pre-inscripción</a></button>
    </div>
    <div class='item3'><?= $etiquetaFinal ?></div>
    <div class='item4'><b>Inicio: </b><?= $inicioCursos ?></div>
    <div class='item5'><b>Fin: </b><?= $finCursos ?></div>
    <div class='item6'><b>Horarios:</b><?= $horarioCursos ?></div>
    <div class='item7'><?= $convocatoriaConvocatoria ?></div>
    <div class='item8'><img id="logoUE" src=<?= $logoConvocatoria ?>></div>

    <?php

        $modulo = "";
        ($mod1Cursos == "" and $mod2Cursos == "" and $mod3Cursos == "") ? $modulo = "" : $modulo = "<b>Módulos:
      </b><br> $mod1Cursos <br> $mod2Cursos <br> $mod3Cursos";
        ?>
    <div class='item9'><?= $modulo ?></div>
    <div class='item10'><button id="temarioBoton"><a class="enlace_sepe"
          href="https://www.paucasals.com/documentos/<?= $temarioCursos ?>" target="_blank">Temario</a></button>
    </div>
  </div>
  <br><br>
  <?php
    }
  }
  ?>

</body>

</html>