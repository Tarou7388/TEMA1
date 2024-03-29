DROP DATABASE beta;
CREATE DATABASE beta;

USE beta;

CREATE Table empleados(
    id_emp          INT AUTO_INCREMENT PRIMARY KEY,
    nombres         VARCHAR(50),
    apellidos       VARCHAR(50),
    nom_user        VARCHAR(120),
    pass_user       VARCHAR(74),
	token_user		CHAR(6) NULL,
    create_at       datetime not null default NOW(),
    inactive_at     datetime null,
    update_at       datetime null,
    CONSTRAINT uk_nom_user UNIQUE(nom_user)
)ENGINE=INNODB;

INSERT INTO empleados(nombres, apellidos, nom_user, pass_user) VALUES ("FABIAN VALERIO", "TORRES ANCHANTE", "FABIAN123", "BETA123");
INSERT INTO empleados(nombres, apellidos, nom_user, pass_user) VALUES ("ROSA LUISA", "CASTILLA LOPEZ", "ROSA123", "BETA123")

CREATE PROCEDURE SPU_LOGIN(IN _user VARCHAR(120))
BEGIN
	SELECT
	    EMP.nom_user,
        EMP.pass_user
	FROM empleados EMP
	WHERE (EMP.inactive_at IS NULL)
	    AND (EMP.nom_user = _user);
	END;

CREATE PROCEDURE SPU_TOKEN_CREAR(IN _user VARCHAR(120),IN _token CHAR(6))
BEGIN
	UPDATE empleados
		SET	
			token_user=_token
		WHERE (nom_user=_user);
	END;

CREATE PROCEDURE SPU_ACTUALIZAR_CONTRASEÑA(IN _user VARCHAR(120),IN _pass VARCHAR(74))
BEGIN
	UPDATE empleados
		SET	
			pass_user=_pass
		WHERE (nom_user=_user);
	END;

CREATE PROCEDURE SPU_TOKEN(IN _user VARCHAR(120))
BEGIN
	SELECT
	    EMP.token_user
	FROM empleados EMP
	WHERE (EMP.inactive_at IS NULL)
	    AND (EMP.nom_user = _user);
	END;


SELECT * from empleados;

CREATE PROCEDURE SPU_registro(
    IN _nombres  VARCHAR(50),
    IN _apellidos  VARCHAR(50),
    IN _nom_user  VARCHAR(120),
    IN _pass_user  VARCHAR(100)
)
BEGIN
	INSERT INTO
	    empleados (
	        nombres,
	        apellidos,
	        nom_user,
	        pass_user
	    )
	VALUES (
	        _nombres,
	        _apellidos,
	        _nom_user,
	        _pass_user
	    );
	END;


CALL SPU_REGISTRO('JUAN','lopez', 'juan113', 'asdww');
CALL SPU_LOGIN ('FABIAN123');