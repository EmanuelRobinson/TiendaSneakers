-- drop database BdSneakers;
CREATE DATABASE IF NOT EXISTS BdSneakers;
USE BdSneakers;

-- Tabla de Estados (para envios y compras)
CREATE TABLE estados (
    id_estado INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla de Tipos de Metodo de Pago
CREATE TABLE tipos_metodo_pago (
    id_tipo_pago INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla de Usuarios (Incluye clientes y asesores)
CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    direccion VARCHAR(250),
    distrito VARCHAR(100),
    rol ENUM('cliente', 'asesor', 'admin') NOT NULL
);

-- Tabla de Asesores (Un tipo de usuario con informacion adicional)
CREATE TABLE asesores (
    id_asesor INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    zona_asignada VARCHAR(100),
    comision DECIMAL(10,2),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

-- Tabla de Metodos de Pago
CREATE TABLE metodospago (
    id_metodo_pago INT PRIMARY KEY AUTO_INCREMENT,
    id_tipo_pago INT,
    detalles VARCHAR(250),
    id_estado INT,
    FOREIGN KEY (id_tipo_pago) REFERENCES tipos_metodo_pago(id_tipo_pago),
    FOREIGN KEY (id_estado) REFERENCES estados(id_estado)
);

-- Tabla de Categorias de Productos (Dama, Caballero, Nino)
CREATE TABLE categorias (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla de Productos
CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

-- Tabla de Inventario (Manejo del stock)
CREATE TABLE inventario (
    id_inventario INT PRIMARY KEY AUTO_INCREMENT,
    id_producto INT NOT NULL,
    cantidad_disponible INT NOT NULL CHECK (cantidad_disponible >= 0),
    ubicacion_almacen VARCHAR(250),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

-- Tabla de Compras
CREATE TABLE compras (
    id_compra INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_metodo_pago INT NOT NULL,
    id_asesor INT NULL,
    total DECIMAL(10,2) NOT NULL,
    fecha_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_estado INT NOT NULL,
    tipo_cliente ENUM('Lima', 'Provincia') NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_metodo_pago) REFERENCES metodospago(id_metodo_pago),
    FOREIGN KEY (id_asesor) REFERENCES asesores(id_asesor),
    FOREIGN KEY (id_estado) REFERENCES estados(id_estado)
);

-- Tabla de Detalles de Compra
CREATE TABLE detallescompra (
    id_detalle_compra INT PRIMARY KEY AUTO_INCREMENT,
    id_compra INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_compra) REFERENCES compras(id_compra),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

-- Tabla de Envios
CREATE TABLE envios (
    id_envio INT PRIMARY KEY AUTO_INCREMENT,
    id_compra INT NOT NULL,
    direccion_envio VARCHAR(250),
    id_estado INT NOT NULL,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    destino VARCHAR(100) NULL,
    agencia VARCHAR(100) NULL,
    dni VARCHAR(15) NULL,
    FOREIGN KEY (id_compra) REFERENCES compras(id_compra),
    FOREIGN KEY (id_estado) REFERENCES estados(id_estado)
);

-- Trigger para verificar stock antes de registrar una compra
DELIMITER //
CREATE TRIGGER verificar_stock
BEFORE INSERT ON detallescompra
FOR EACH ROW
BEGIN
    DECLARE stock_actual INT;
    SELECT cantidad_disponible INTO stock_actual FROM inventario WHERE id_producto = NEW.id_producto;
    IF stock_actual < NEW.cantidad THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stock insuficiente';
    END IF;
END;
//
DELIMITER ;

-- Trigger para actualizar el inventario despues de una compra
DELIMITER //
CREATE TRIGGER actualizar_inventario_compra
AFTER INSERT ON detallescompra
FOR EACH ROW
BEGIN
    UPDATE inventario 
    SET cantidad_disponible = GREATEST(cantidad_disponible - NEW.cantidad, 0)
    WHERE id_producto = NEW.id_producto;
END;
//
DELIMITER ;

-- Verificacion de las columnas creadas
SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'BdSneakers';
