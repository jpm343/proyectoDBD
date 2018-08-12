CREATE TABLE autos (
    patente_auto        VARCHAR(255) PRIMARY KEY,
    modelo_auto         VARCHAR(255),
    capacidad_auto      INTEGER,
    precio_diario       INTEGER,
    descripcion_auto    TEXT,
    transmision_auto    VARCHAR(255),
    nombre_compania     VARCHAR(255) REFERENCES companias_autos,
    id_reserva          INTEGER REFERENCES reservas NULL
);
