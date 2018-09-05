CREATE TABLE hoteles (
    id_hotel            SERIAL PRIMARY KEY,
    nombre_hotel        VARCHAR(255) UNIQUE,
    puntuacion_hotel    FLOAT(1),
    descripcion_hotel   TEXT,
    direccion_hotel     VARCHAR(255),
    ciudad_hotel        VARCHAR(255)
);
