const productos = [
    {
        img: "img/zapato1.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato2.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato3.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato1.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato2.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato3.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato1.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato2.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato3.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato1.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato2.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

    {
        img: "img/zapato3.jpg",
        nombre: "Zapato",
        marca: "Adidas",
        precio: "S/ 125.99",
        color: "Azul Oscuro",
        estrellas: 5
    },

   
    // Puedes agregar más productos aquí si lo deseas
];

const filaProductos = document.getElementById("fila-productos");
let tr = document.createElement("tr");

productos.forEach((producto, index) => {
    const td = document.createElement("td");
    td.classList.add("producto");

    td.innerHTML = `
        <div class="producto-info">
            <div class="corazon">
                <button class="favorito-btn">❤️</button>
            </div>
            <img src="${producto.img}" alt="${producto.nombre}">
            <p class="nombre">${producto.nombre}</p>
            <p class="marca">Marca: ${producto.marca}</p>
            <p class="precio">Precio: ${producto.precio}</p>
            <p class="color">Color: ${producto.color}</p>
            <button class="agregar-carrito-btn">Agregar al carrito</button>
        </div>
        <div class="estrellas">
            ${"★".repeat(producto.estrellas)}
        </div>
    `;

    tr.appendChild(td);

    // Cada 4 productos se cierra la fila y se inicia una nueva
    if ((index + 1) % 4 === 0) {
        filaProductos.appendChild(tr);
        tr = document.createElement("tr");
    }
});

// Si quedaron productos sin cerrar en una fila, se agrega esa fila
if (tr.children.length > 0) {
    filaProductos.appendChild(tr);
}

// productos.forEach(producto => {
//     const td = document.createElement("td");
//     td.classList.add("producto");

//     td.innerHTML = `
//         <div class="producto-info">
//             <div class="corazon">
//                 <button class="favorito-btn">❤️</button>
//             </div>
//             <img src="${producto.img}" alt="${producto.nombre}">
//             <p class="nombre">${producto.nombre}</p>
//             <p class="marca">Marca: ${producto.marca}</p>
//             <p class="precio">Precio: ${producto.precio}</p>
//             <p class="color">Color: ${producto.color}</p>
//             <button class="agregar-carrito-btn">Agregar al carrito</button>
//         </div>
//         <div class="estrellas">
//             ${"★".repeat(producto.estrellas)}
//         </div>
//     `;

//     filaProductos.appendChild(td);
// });
