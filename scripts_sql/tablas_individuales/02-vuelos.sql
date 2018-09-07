CREATE TABLE vuelos (
    id_vuelo            SERIAL PRIMARY KEY,
    fecha_salida        TIMESTAMP,
    fecha_llegada       TIMESTAMP,
    ciudad_origen       VARCHAR(255),
    ciudad_destino      VARCHAR(255),
    aeropuerto_origen   VARCHAR(255),
    aeropuerto_destino  VARCHAR(255),
    pais_origen         VARCHAR(255),
    pais_destino        VARCHAR(255),
    nombre_aerolinea    VARCHAR(255) REFERENCES aerolineas
);
