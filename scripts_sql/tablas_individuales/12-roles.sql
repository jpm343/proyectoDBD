CREATE TABLE roles (
    id_rol      SERIAL PRIMARY KEY,
    nombre_rol  VARCHAR(255) UNIQUE,
    descripcion VARCHAR(255)
);
