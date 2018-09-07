CREATE TABLE actividades (
    id_actividad            SERIAL PRIMARY KEY,
    puntuacion_actividad    FLOAT(1),
    nombre_actividad        VARCHAR(255) UNIQUE,
    descripcion_actividad   TEXT,
    ciudad_actividad        VARCHAR(255),
    pais_actividad          VARCHAR(255),
    dias_disponibles        DATE[],
    hora_inicio             TIME,
    hora_fin                TIME
);
