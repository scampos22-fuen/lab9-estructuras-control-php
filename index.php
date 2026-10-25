<?php
/*
 * LABORATORIO #9 · Estructuras de control en PHP
 * Sigue el documento del estudiante. Escribe tu código SOLO en las zonas marcadas con TODO.
 * Recuerda: un commit por ejercicio (ej0, ej1, ... css, final).
 */

// ---------- PARTE 0 · TUS DATOS ----------
// TODO 0.1: define las constantes SEMILLA (últimos 3 dígitos de tu cédula, como número),
//           NOMBRE y APELLIDO.
define('SEMILLA', 876);
define('NOMBRE', 'Sergio');
define('APELLIDO', 'Ceballos');

// TODO 0.2: crea $nombreCompleto, $edad, $dia, $mes, $nota1, $nota2, $nota3, $monto,
//           $esMiembro, $hora, $huella, $descuento y $vacio (fórmulas en el documento).
$nombreCompleto = NOMBRE . " " . APELLIDO;
$edad           = 8 + (SEMILLA % 70);   
$dia            = (SEMILLA % 7) + 1;
$mes            = (SEMILLA % 12) +1;
$nota1          = 40 + (SEMILLA % 61);
$nota2          = 40 + ((SEMILLA * 3) % 61);
$nota3          = 40 + ((SEMILLA * 7) % 61);
$monto          = 20 + (SEMILLA % 181);
$esMiembro      = (SEMILLA % 2) == 0;
$hora           = SEMILLA % 24;
$huella         = (SEMILLA * 13 + 91) % 100;
$descuento      = SEMILLA * 0.001;
$vacio          = null;

// ---------- EJERCICIO 1 · Boleto de cine (if / elseif / else) ----------
// TODO 1
define('PRECIO_NINO', 3.00);
define('PRECIO_JOVEN', 4.50);
define('PRECIO_ADULTO', 7.00);
define('PRECIO_JUBILADO', 3.50);

if ($edad <12) {
    $categoria = "Niño";
    $precio = PRECIO_NINO;
}elseif ($edad <= 17 ) {
    $categoria = "Joven";
    $precio = PRECIO_JOVEN; 
}elseif ($edad <= 59) {
    $categoria = "Adulto";
    $precio = PRECIO_ADULTO;
}else {
    $categoria = "Jubilados";
    $precio = PRECIO_JUBILADO;
}

$descuentoMiercoles = ($dia ==3);
if ($descuentoMiercoles) {
    $precio = $precio * 0.5;
}
$ej1 = "Categoria: $categoria | Precio final: B/. " . number_format($precio, 2)
       ." | Miercoles 50%: " . ($descuentoMiercoles ? "SI" : "NO");

// ---------- EJERCICIO 2 · Notas (elseif, ternario, &&) ----------
// TODO 2
define('PRECIO_NINO', 3.00);
define('PRECIO_JOVEN', 4.50);
define('PRECIO_ADULTO', 7.00);
define('PRECIO_JUBILADO', 3.50);

if ($edad <12) {
    $categoria = "Niño";
    $precio = PRECIO_NINO;
}elseif ($edad <= 17 ) {
    $categoria = "Joven";
    $precio = PRECIO_JOVEN; 
}elseif ($edad <= 59) {
    $categoria = "Adulto";
    $precio = PRECIO_ADULTO;
}else {
    $categoria = "Jubilados";
    $precio = PRECIO_JUBILADO;
}

$descuentoMiercoles = ($dia ==3);
if ($descuentoMiercoles) {
    $precio = $precio * 0.5;
}
$ej1 = "Categoria: $categoria | Precio final: B/. " . number_format($precio, 2)
       ." | Miercoles 50%: " . ($descuentoMiercoles ? "SI" : "NO");

// ---------- EJERCICIO 2 · Notas (elseif, ternario, &&) ----------
// TODO 2
$promedio = ($nota1 + $nota2 + $nota3) / 3;

if ($promedio >=90) {
    $letra= "A";
}elseif ($promedio >= 80) {
    $letra= "B";
}elseif ($promedio >= 70) {
    $letra= "C";
}elseif ($promedio >= 60) {
    $letra= "D";
}else {
    $letra = "F";
}   

$estado = ($promedio >= 70) ? "Aprobado :'))" : "Reprobado :'(";
$honor = ($promedio >= 90 && $nota1 >= 80 && $nota2 >= 80 && $nota3 >= 80) ? "SI" : "NO";

$ej2 = "Promedio: " . number_format($promedio, 2)
     ." | Letra: $letra | Estado: $estado | Cuadro de honor: $honor";

// ---------- EJERCICIO 3 · Día de la semana (switch) ----------
// TODO 3
switch ($dia) {
    case 1 : $nombreDia = "Lunes"; break;
    case 2 : $nombreDia = "Martes"; break;
    case 3 : $nombreDia = "Miercoles"; break;
    case 4 : $nombreDia = "Jueves"; break;
    case 5 : $nombreDia = "Viernes"; break;
    case 6 : $nombreDia = "Sabado"; break;
    case 7 : $nombreDia = "Domingo"; break;
    default : $nombreDia = "Dia no valido"; 
}
switch ($dia) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        $tipoDia = "LAboral";
        break;
    case 6:
    case 7:
        $tipoDia = "Fin de semana";
        break;
    default : 
           $tipoDia = "Invalido";
}

$ej3 = "Dia: $nombreDia | Tipo: $tipoDia";

// ---------- EJERCICIO 4 · Mes y estación (match) ----------
// TODO 4
$nombreMes = match ($mes) {
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre",
};

$estacion = match ($mes) {
    12, 1, 2, 3, 4,    => "Verano",
    5, 6, 7, 8, 9, 10, 11, => "Invierno",
};

$ej4 = "Mes: $nombreMes | Estacion: $estacion";

// ---------- EJERCICIO 5 · Caja de la tienda (reto integrador) ----------
// TODO 5
define('ITBMS', 0.07);

if ($monto >= 150) {
    $pct = 15;
}elseif ($monto >= 100) {
    $pct = 10;
}elseif ($monto >= 50) {
    $pct = 5;
}else {
    $pct = 0;
}

if ($esMiembro) {
    $pct += 5;
}
$base = $monto - ($monto * $pct / 100);
$recargoNocturno = false;
if ($hora >= 22 || $hora < 0) {
    $recargoNocturno = true;
    $base = $base + ($base * 0.03);
}
$total = $base + ($base * ITBMS);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- TODO 0.3: <meta name="lab9-huella" content="..."> con el valor de $huella -->
  <meta name="lab9-huella" content="<?= $huella ?>">
  <title>Lab 9 · Estructuras de control</title>
  <!-- TODO CSS-1: enlaza css/estilos.css (CSS externo) -->
<link rel="stylesheet" herf="css/estilos.css">
  <!-- TODO CSS-2: agrega un <style> interno con al menos 2 reglas -->
<style>
    h2 { color: green; }
    #autor { font-style: italic; }
    </style>
</head>
<body>
  <header>
    <!-- TODO CSS-3: agrega un atributo style (CSS en línea) a este h1 -->
    <h1 style="color: #ffd966;>Laboratorio #9 · Estructuras de control</h1>
    <p id="autor"><!-- TODO 0.4: "Autor: Nombre Apellido" --></p>
  </header>

  <!-- TODO 0.5: el id de <main> es "lab9-" + tu apellido en minúsculas, sin tildes (ver documento) -->
  <main id="">

    <section id="ej0">
      <h2>Ejercicio 0 · Tipos de datos</h2>
      <table id="ej0-tipos">
        <thead>
          <tr><th>Variable</th><th>Tipo</th></tr>
        </thead>
        <tbody>
          <!-- TODO 0.6: 5 filas <tr> con el nombre de la variable y su gettype() -->
        </tbody>
      </table>
    </section>

    <section id="ej1">
      <h2>Ejercicio 1 · Boleto de cine</h2>
      <p id="ej1-res"><? $ej1 ?></p>
    </section>

    <section id="ej2">
      <h2>Ejercicio 2 · Notas</h2>
      <!-- TODO CSS-4: agrega la clase "ok" o "error" con PHP según el estado -->
      <p id="ej2-res" class="resultado"<?= $clase ?>"><?= $ej2 ?>/p>
    </section>

    <section id="ej3">
      <h2>Ejercicio 3 · Día de la semana</h2>
      <p id="ej3-res"><? $ej3 ?></p>
    </section>

    <section id="ej4">
      <h2>Ejercicio 4 · Mes y estación</h2>
      <p id="ej4-res"><? $ej4 ?></p>
    </section>

    <section id="ej5">
      <h2>Ejercicio 5 · Caja de la tienda</h2>
      <p id="ej5-monto">Montode compra: B/. <?= number_format($monto,2) ?></p>
      <p id="ej5-descuento">Descuento aplicado: <?= $pct ?>%</p>
      <p id="ej5-recargo">Recargo nocturno: <?= $recargoNocturno ? "SI" : "NO" ?></p>
      <p id="ej5-total">Total a pagar: B/. <?= number_format($total, 2) ?></p>
    </section>

  </main>

  <footer id="firma">Lab 9 · <?= $nombreCompleto ?> · Semilla <?= SEMILLA ?></footer>
</body>
</html>
