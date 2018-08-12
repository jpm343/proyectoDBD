CREATE TABLE traslados (
    id_traslado             SERIAL PRIMARY KEY,
    fecha_traslado          TIMESTAMP,
    descripcion_traslado    TEXT,
    origen_traslado         VARCHAR(255),
    destino_traslado        VARCHAR(255),
    precio_traslado         INTEGER
);
