CREATE TABLE asientos (
    id_asiento          SERIAL PRIMARY KEY,
    rut_pasajero        INTEGER,
    clase_asiento       VARCHAR(255),
    numero_asiento      INTEGER,
    nombre_pasajero     VARCHAR(255),
    id_vuelo            INTEGER REFERENCES vuelos,
    id_reserva          INTEGER REFERENCES reservas NULL
);
