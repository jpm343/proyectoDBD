CREATE TABLE actividades (
    id_actividad            SERIAL PRIMARY KEY,
    puntuacion_actividad    FLOAT(1),
    descripcion_actividad   TEXT,
    ciudad_actividad        VARCHAR(255),
    pais_actividad          VARCHAR(255)
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
    nombre_usuario      VARCHAR(255),
    password_usuario    VARCHAR(255)
);

CREATE TABLE fondos (
    cuenta_origen   VARCHAR(255) PRIMARY KEY,
    monto_actual    INTEGER,
    banco_origen    VARCHAR(255),
    id_usuario      INTEGER REFERENCES usuarios
);

CREATE TABLE hoteles (
    id_hotel            SERIAL PRIMARY KEY,
    puntuacion_hotel    FLOAT(1),
    descripcion_hotel   TEXT,
    direccion_hotel     VARCHAR(255),
    ciudad_hotel        VARCHAR(255)
);

CREATE TABLE traslados (
    id_traslado             SERIAL PRIMARY KEY,
    fecha_traslado          TIMESTAMP,
    descripcion_traslado    TEXT,
    origen_traslado         VARCHAR(255),
    destino_traslado        VARCHAR(255),
    precio_traslado         INTEGER
);

CREATE TABLE reservas (
    id_reserva          SERIAL PRIMARY KEY,
    cantidad_menores    INTEGER,
    cantidad_mayores    INTEGER,
    id_usuario          INTEGER REFERENCES usuarios,
    id_actividad        INTEGER REFERENCES actividades,
    id_traslado         INTEGER REFERENCES traslados
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

CREATE TABLE autos (
    patente_auto        VARCHAR(255) PRIMARY KEY,
    modelo_auto         VARCHAR(255),
    capacidad_auto      INTEGER,
    precio_diario       INTEGER,
    descripcion_auto    TEXT,
    transmision_auto    VARCHAR(255),
    nombre_compania     VARCHAR(255) REFERENCES companias_autos
);

CREATE TABLE roles (
    id_rol      SERIAL PRIMARY KEY,
    sigla_rol   VARCHAR(255),
    nombre_rol  VARCHAR(255)
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

CREATE TABLE reservas_autos (
    id_reserva      INTEGER REFERENCES reservas,
    patente_auto    VARCHAR(255) REFERENCES autos
);

CREATE TABLE reservas_habitaciones (
    id_reserva      INTEGER REFERENCES reservas,
    id_habitacion   INTEGER REFERENCES habitaciones
);
