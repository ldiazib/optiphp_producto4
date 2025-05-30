 -- Crear la base de datos de WordPress si no existe
CREATE DATABASE IF NOT EXISTS wordpress CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Crear el usuario si no existe y otorgar privilegios
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'user_password';
GRANT ALL PRIVILEGES ON wordpress.* TO 'user'@'%';

-- Asegurarse de que los privilegios se apliquen
FLUSH PRIVILEGES;