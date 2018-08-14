CREATE TABLE habitaciones (
    id_habitacion               SERIAL PRIMARY KEY,
    numero_habitacion           INTEGER,
    capacidad_habitacion        INTEGER,
    precio_noche_habitacion     INTEGER,
    tipo_habitacion             VARCHAR(255),
    id_hotel                    INTEGER REFERENCES hoteles
);
