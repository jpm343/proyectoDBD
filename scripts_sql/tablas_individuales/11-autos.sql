CREATE TYPE transmision AS ENUM ('A', 'M');
CREATE TABLE autos (
    patente_auto        VARCHAR(255) PRIMARY KEY,
    modelo_auto         VARCHAR(255),
    capacidad_auto      INTEGER,
    precio_dia_auto     INTEGER,
    descripcion_auto    TEXT,
    transmision_auto    transmision,
    nombre_compania     VARCHAR(255) REFERENCES companias_autos
);
