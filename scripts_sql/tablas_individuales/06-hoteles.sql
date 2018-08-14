CREATE TABLE hoteles (
    id_hotel            SERIAL PRIMARY KEY,
    puntuacion_hotel    FLOAT(1),
    descripcion_hotel   TEXT,
    direccion_hotel     VARCHAR(255),
    ciudad_hotel        VARCHAR(255)
);
