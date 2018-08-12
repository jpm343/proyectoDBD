CREATE TABLE actividades (
    id_actividad            SERIAL PRIMARY KEY,
    puntuacion_actividad    FLOAT(1),
    descripcion_actividad   TEXT,
    ciudad_actividad        VARCHAR(255),
    pais_actividad          VARCHAR(255)
);
