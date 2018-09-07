CREATE TYPE accion AS ENUM ('C', 'R', 'U', 'D');
CREATE TABLE auditoria (
    id_accion           SERIAL PRIMARY KEY,
    accion_realizada    accion,
    tiempo_accion       TIMESTAMP,
    tabla_modificada    VARCHAR(255),
    id_modificado       VARCHAR(255),
    estado_anterior     JSONB,
    estado_actual       JSONB
);
