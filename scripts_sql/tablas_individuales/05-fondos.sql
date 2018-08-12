CREATE TABLE fondos (
    cuenta_origen   VARCHAR(255) UNIQUE,
    monto_actual    INTEGER,
    banco_origen    VARCHAR(255),
    id_usuario      INTEGER REFERENCES usuarios
);
