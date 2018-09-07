BEGIN;

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

CREATE TABLE aerolineas (
    nombre_aerolinea        VARCHAR(255) PRIMARY KEY,
    puntuacion_aerolinea    DOUBLE PRECISION,
    tipo_aerolinea          VARCHAR(255)
);

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

CREATE TABLE companias_autos (
    nombre_compania         VARCHAR(255) PRIMARY KEY,
    paises_de_atencion      VARCHAR(255)[],
    ciudades_de_atencion    VARCHAR(255)[]
);

CREATE TABLE usuarios (
    id_usuario          SERIAL PRIMARY KEY,
    correo_usuario      VARCHAR(255) UNIQUE,
    nombre_usuario      VARCHAR(255) UNIQUE,
    password_usuario    VARCHAR(255)
);

CREATE TABLE fondos (
    id_fondos       SERIAL PRIMARY KEY,
    cuenta_origen   VARCHAR(255),
    monto_actual    INTEGER,
    banco_origen    VARCHAR(255),
    id_usuario      INTEGER REFERENCES usuarios
);

CREATE TABLE hoteles (
    id_hotel            SERIAL PRIMARY KEY,
    nombre_hotel        VARCHAR(255) UNIQUE,
    puntuacion_hotel    FLOAT(1),
    descripcion_hotel   TEXT,
    direccion_hotel     VARCHAR(255),
    ciudad_hotel        VARCHAR(255)
);

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

CREATE TABLE traslados (
    id_traslado             SERIAL PRIMARY KEY,
    fecha_traslado          TIMESTAMP,
    descripcion_traslado    TEXT,
    origen_traslado         VARCHAR(255),
    destino_traslado        VARCHAR(255),
    precio_traslado         INTEGER,
    id_reserva              INTEGER REFERENCES reservas
);

CREATE TABLE habitaciones (
    id_habitacion               SERIAL PRIMARY KEY,
    numero_habitacion           INTEGER,
    capacidad_habitacion        INTEGER,
    precio_noche_habitacion     INTEGER,
    tipo_habitacion             VARCHAR(255),
    id_hotel                    INTEGER REFERENCES hoteles
);

CREATE TABLE asientos (
    id_asiento          SERIAL PRIMARY KEY,
    rut_pasajero        INTEGER,
    clase_asiento       VARCHAR(255),
    numero_asiento      INTEGER,
    nombre_pasajero     VARCHAR(255),
    id_vuelo            INTEGER REFERENCES vuelos,
    id_reserva          INTEGER REFERENCES reservas NULL
);

CREATE TYPE transmision AS ENUM ('A', 'M');
CREATE TABLE autos (
    patente_auto        VARCHAR(255) PRIMARY KEY,
    modelo_auto         VARCHAR(255),
    capacidad_auto      INTEGER,
    precio_dia_auto     INTEGER,
    descripcion_auto    TEXT,
    transmision_auto    transmision,
    nombre_compania     VARCHAR(255) REFERENCES companias_autos
);

CREATE TABLE roles (
    id_rol      SERIAL PRIMARY KEY,
    nombre_rol  VARCHAR(255) UNIQUE,
    descripcion VARCHAR(255)
);

CREATE TABLE usuarios_roles (
    id_usuario  INTEGER REFERENCES usuarios,
    id_rol      INTEGER REFERENCES roles
);

CREATE TABLE registros (
    id_registro         SERIAL PRIMARY KEY,
    fecha_registro      TIMESTAMP,
    tipo_transaccion    VARCHAR(255),
    subtotal_registro   INTEGER,
    id_usuario          INTEGER REFERENCES usuarios
);

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

CREATE TABLE reservas_autos (
    id_reserva      INTEGER REFERENCES reservas,
    patente_auto    VARCHAR(255) REFERENCES autos
);

CREATE TABLE reservas_habitaciones (
    id_reserva      INTEGER REFERENCES reservas,
    id_habitacion   INTEGER REFERENCES habitaciones
);

COMMIT;
