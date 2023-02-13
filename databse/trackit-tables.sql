DROP DATABASE IF EXISTS trackit;
CREATE DATABASE trackit CHARACTER SET utf8 COLLATE utf8_general_ci;
USE trackit;

CREATE TABLE logins(
    id INT(11) UNIQUE UNSIGNED NOT NULL,
    email VARCHAR(70) NOT NULL,
    password VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    update_at TIMESTAMP,
    deleted_at TIMESTAMP
)engine = InnoDB;

CREATE TABLE users(
    id INT(11) UNIQUE UNSIGNED NOT NULL,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNSIGNED UNIQUE NOT NULL,
    password VARCHAR(50 NOT NULL,
    id_package INT(11) UNIQUE NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP
)engine = InnoDB;

CREATE TABLE package(
    id INT(11) UNIQUE UNSIGNED NOT NULL,
    receiver_adress VARCHAR(100) NOT NULL,
    user_id INT(11) UNIQUE NOT NULL,
    received_date TIMESTAMP,
    sent_date TIMESTAMP,

)engine = InnoDB;

