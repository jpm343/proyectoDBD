CREATE TABLE usuarios_roles (
    id_usuario  INTEGER REFERENCES usuarios,
    id_rol      INTEGER REFERENCES roles
);
