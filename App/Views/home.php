<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiendaOnline</title>

    <link rel="stylesheet" href="Css/body.css">
    <link rel="stylesheet" href="Css/head.css">
    <link rel="stylesheet" href="Css/actions.css">
    <link rel="stylesheet" href="Css/footer.css"> 

</head>
<body>
    <div id="contenedor">
        <header id="cabecera">
            <section id="menu">
                <div id="navegacion">
                    <div id="ini" class="cargarVista" data-vista="inicio.php">INICIO</div>
                    <div id="hom" class="cargarVista" data-vista="caballeros.php">CABALLEROS</div>
                    <div id="muj" class="cargarVista" data-vista="damas.php">DAMAS</div>
                    <div id="nin" class="cargarVista" data-vista="nenes.php">NIÑOS</div>
                </div>
            </section>
        </header>
        
        <main id="cuerpo">
            <div id="contenido">
                <img src="../../Public/Images/hojas.jfif" alt="Hojas decorativas">
            </div>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.cargarVista').forEach(elemento => {
                elemento.addEventListener('click', function() {
                    let vista = this.getAttribute('data-vista');

                    fetch(`../App/Views/${vista}`)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('contenido').innerHTML = html;
                        })
                        .catch(error => console.error('Error al cargar la vista:', error));
                });
            });
        });
    </script>
</body>
</html>
