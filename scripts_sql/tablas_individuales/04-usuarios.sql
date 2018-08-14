CREATE TABLE usuarios (
    id_usuario          SERIAL PRIMARY KEY,
    correo_usuario      VARCHAR(255) UNIQUE,
    nombre_usuario      VARCHAR(255),
    password_usuario    VARCHAR(255)
);
