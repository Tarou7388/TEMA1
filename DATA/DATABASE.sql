DROP DATABASE beta;
CREATE DATABASE beta;

USE beta;

CREATE Table empleados(
    id_emp          INT AUTO_INCREMENT PRIMARY KEY,
    nombres         VARCHAR(50),
    apellidos       VARCHAR(50),
    nom_user        VARCHAR(50),
    pass_user       VARCHAR(70),
    create_at       datetime not null default NOW(),
    inactive_at     datetime null,
    update_at       datetime null,
    CONSTRAINT uk_nom_user UNIQUE(nom_user)
)ENGINE=INNODB;

INSERT INTO empleados(nombres, apellidos, nom_user, pass_user) VALUES ("FABIAN VALERIO", "TORRES ANCHANTE", "FABIAN123", "BETA123");
INSERT INTO empleados(nombres, apellidos, nom_user, pass_user) VALUES ("ROSA LUISA", "CASTILLA LOPEZ", "ROSA123", "BETA123")

CREATE PROCEDURE SPU_LOGIN(IN _user CHAR(50))
BEGIN
	SELECT
	    EMP.nom_user,
        EMP.pass_user
	FROM empleados EMP
	WHERE (EMP.inactive_at IS NULL)
	    AND (EMP.nom_user = _user);
	END;

CALL SPU_LOGIN ('FABIAN123');