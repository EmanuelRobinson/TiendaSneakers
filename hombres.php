<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headniños.css">
    <link rel="stylesheet" href="niños.css">
</head>
<body>
    <header id="cabecera">
         <section id="menu">
         <?php include('navbar.php'); ?>
        </section>
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
        <section id="categoria">
            <div id="estilo">
                <h2>Estilo</h2>
                <section id="tipos_estilo">
                    <div id="caña_alta">
                        
                    </div id="caña_media">
                    <div>

                    </div>
                    <div id="caña_baja">

                    </div>
                    <div id="Slip On">

                    </div>
                </section>
            </div>
            <div id="marca">
                <h2>Marca</h2>
                <div id="marca-opciones">
                    <label class="marca-opcion">
                        <input type="checkbox" name="marca" value="Nike">
                        <span class="marca-nombre">Nike</span>
                    </label>
                    <label class="marca-opcion">
                        <input type="checkbox" name="marca" value="Adidas">
                        <span class="marca-nombre">Adidas</span>
                    </label>
                    <label class="marca-opcion">
                        <input type="checkbox" name="marca" value="Umbro">
                        <span class="marca-nombre">Umbro</span>
                    </label>
                    <label class="marca-opcion">
                        <input type="checkbox" name="marca" value="Bata">
                        <span class="marca-nombre">Bata</span>
                    </label>
                </div>
            </div>
            <div id="precio">
                <h2>Precio</h2>
                <div id="rango-precio">
                    <input type="range" id="precio-range" min="0" max="4" step="1" value="0">
                    <div id="rango-precio-etiquetas">
                        <span class="etiqueta" style="left: 0%;">S/120</span>
                        <span class="etiqueta" style="left: 25%;">S/150</span>
                        <span class="etiqueta" style="left: 50%;">S/160</span>
                        <span class="etiqueta" style="left: 75%;">S/180</span>
                        <span class="etiqueta" style="left: 100%;">S/200</span>
                    </div>
                </div>
            </div>
            <div id="talla">
                <h2>Talla</h2>
                <div id="tabla-talla">
                    <table id="tabla-talla-unica">
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td>19</td>
                            <td>20</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <section id="productos">
    <table>
        <tr id="fila-productos"></tr>
    </table>
</section>

<script src="productos.js"></script>

    </main>
</body>
    <?php include('footer.php'); ?>
</html>
