CREATE TABLE fondos (
    id_fondos       SERIAL PRIMARY KEY,
    cuenta_origen   VARCHAR(255),
    monto_actual    INTEGER,
    banco_origen    VARCHAR(255),
    id_usuario      INTEGER REFERENCES usuarios
);
