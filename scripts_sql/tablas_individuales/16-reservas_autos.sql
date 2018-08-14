CREATE TABLE reservas_autos (
    id_reserva      INTEGER REFERENCES reservas,
    patente_auto    VARCHAR(255) REFERENCES autos
);
