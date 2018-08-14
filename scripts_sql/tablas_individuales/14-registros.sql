CREATE TABLE registros (
    id_registro         SERIAL PRIMARY KEY,
    fecha_registro      TIMESTAMP,
    tipo_transaccion    VARCHAR(255),
    subtotal_registro   INTEGER,
    id_usuario          INTEGER REFERENCES usuarios
);
