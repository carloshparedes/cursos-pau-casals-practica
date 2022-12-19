<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <title>Index</title>
</head>

<body>
  <div class="cabecera_subhome">

    <div class="contenedor_imagen_subhome">
      <a href="./index.php">
        <img src="logo.png" class="imagen_subhome">
      </a>
    </div>
    <a href="./index.php">Home</a>
    <a href="./cursos.php">Cursos</a>
    <a href="./idiomas.php">Idiomas</a>
  </div>
  <div class="subtitulo"><img id="subFoto" src="fraseIns.png">
  </div>

  <?php

  $xml = simplexml_load_file("cursos.xml");
  $listaConvocatorias = $xml->xpath("/web/convocatorias/convocatoria");

  foreach ($listaConvocatorias as $convocatoria) {

    $nombreConvocatoria = $convocatoria->nombre;
    $nom = $convocatoria['nom'];
    $convocatoriaConvocatoria = $convocatoria->informacion;

  ?>

  <div id="contenedorIndex">
    <div class="item20">
      <h1><?= $nombreConvocatoria ?></h1>
    </div>


    <?php

      $listaCursos = $xml->xpath("/web/cursos/curso[@id='" . $nom . "']");
      $i = 0;
      foreach ($listaCursos as $cursos) {
        $tituloCursos = $cursos->titulo;
        $fotoCursos = $cursos->foto;
        $i++;
        if ($i < 7) {
          $item = "item2" . $i;
      ?>
    <div class="<?= $item ?>">
      <div class="item211"><img class="imagenCurso" src="<?= $fotoCursos ?>"></div>
      <div class="item212"><?= $tituloCursos ?><br>
        <hr id="tit">
      </div>
      <div class="item213"><?= $nombreConvocatoria ?></div>
    </div>
    <?php
        }
      }
      ?>
  </div>
  <br><br>
  <?php

  }
  ?>

</body>

</html>