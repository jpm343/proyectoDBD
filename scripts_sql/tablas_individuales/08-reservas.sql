CREATE TABLE reservas (
    id_reserva          SERIAL PRIMARY KEY,
    cantidad_menores    INTEGER,
    cantidad_mayores    INTEGER,
    id_usuario          INTEGER REFERENCES usuarios,
    id_actividad        INTEGER REFERENCES actividades,
    id_traslado         INTEGER REFERENCES traslados
);
