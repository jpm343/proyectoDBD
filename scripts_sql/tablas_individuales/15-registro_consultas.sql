CREATE TABLE registro_consultas (
    id_auditoria                    SERIAL PRIMARY KEY,
    cantidad_personas_consultada    INTEGER,
    tipo_consulta                   VARCHAR(255),
    fecha_partida_consultada        TIMESTAMP,
    ciudad_origen_consultada        VARCHAR(255),
    ciudad_destino_consultada       VARCHAR(255),
    fecha_regreso_consultada        TIMESTAMP,
    id_usuario                      INTEGER REFERENCES usuarios
);
