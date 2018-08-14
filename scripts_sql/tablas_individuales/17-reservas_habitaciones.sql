CREATE TABLE reservas_habitaciones (
    id_reserva      INTEGER REFERENCES reservas,
    id_habitacion   INTEGER REFERENCES habitaciones
);
