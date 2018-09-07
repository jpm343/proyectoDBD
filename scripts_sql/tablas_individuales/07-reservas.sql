CREATE TABLE reservas (
    id_reserva          SERIAL PRIMARY KEY,
    cantidad_menores    INTEGER,
    cantidad_mayores    INTEGER,
    ciudad_destino      VARCHAR(255),
    fecha_inicio        DATE,
    fecha_fin           DATE,
    id_usuario          INTEGER REFERENCES usuarios,
    id_actividad        INTEGER REFERENCES actividades NULL
);
