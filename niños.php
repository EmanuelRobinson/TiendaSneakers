<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/niños/niños.css">
</head>
<body>
    <header id="cabecera">
        <section id="menu">
            <div id="logo">
                <img src="img/titulo.png" alt="titulo">
            </div>
            <div id="navegacion">
                <?php include('navbar.php')?>
            </div>
    </header>
    <main id="cuerpo">
        <section id="opciones">
            <div class="opcion" id="ocultarFiltro">
                <span>Ocultar por filtro</span>
            </div>
            <div class="opcion" id="resultadoCantidad">
                <span>Resultados: 120</span>
            </div>
            <div class="opcion" id="ordenarPor">
                <span>Ordenar por relevancia</span>
                <div id="ordenarOpciones" class="opcionesOcultas">
                    <div class="opcionLista">Más favoritos</div>
                    <div class="opcionLista">Más recientes</div>
                    <div class="opcionLista">Precio de mayor a menor</div>
                    <div class="opcionLista">Precio de menor a mayor</div>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php')?>
</body>
</html>
