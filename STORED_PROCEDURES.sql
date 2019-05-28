DROP PROCEDURE IF EXISTS ALTA_CLIENTE;
DELIMITER //

CREATE PROCEDURE ALTA_CLIENTE(FNAME VARCHAR(50),LNAME VARCHAR(50),SEX BOOL,
USERS TEXT,PASS TEXT,DIR TEXT)
BEGIN
	DECLARE EXISTE INT;
	DECLARE ID INT;
	SET EXISTE = (SELECT COUNT(USUARIO.USUARIO) FROM USUARIO WHERE USERS = USUARIO);
	IF (EXISTE > 0) THEN
		SELECT "USUARIO YA EXISTENTE" AS MENSAJE;
	ELSE 
		INSERT INTO PERSONA(NOMBRE,APELLIDOS,SEXO) VALUES(FNAME,LNAME,SEX);
		SET ID = LAST_INSERT_ID();
		INSERT INTO USUARIO (USUARIO,CONTRASENA,ID_PERSONA,TIPO) VALUES (USERS,MD5(PASS),ID,"CLIENTE");
		INSERT INTO DIRECCIONES(DIRECCION) VALUES (DIR);
			INSERT INTO REL_DIR_PERSONA (ID_PERSONA,ID_DIRECCION) VALUES (ID,LAST_INSERT_ID());
		SELECT "USUARIO REGISTRADO" AS MENSAJE;
	END IF;
	
END
//
DELIMITER ;
DROP PROCEDURE IF EXISTS LOGIN;
DELIMITER //

CREATE PROCEDURE LOGIN(USERS TEXT,PASS TEXT)
BEGIN
	DECLARE SESION BOOL;
	DECLARE EXISTE INT;
	SET EXISTE = (SELECT COUNT(USUARIO.USUARIO) FROM USUARIO WHERE USERS = USUARIO AND CONTRASENA = MD5(PASS));
	IF (EXISTE > 0) THEN
		SET SESION = TRUE;
		SELECT SESION AS SESION, USERS AS USUARIO;
		
	ELSE
		SET SESION = FALSE;
		SELECT SESION AS SESION;
	END IF;
END
//
DELIMITER ;
DROP PROCEDURE IF EXISTS ALTA_INGREDIENTE;
DELIMITER //
CREATE PROCEDURE ALTA_INGREDIENTE(NAME VARCHAR(50),DESCRIPTION TEXT,QUANTITY INT)
BEGIN
	DECLARE EXISTE INT;
	SET EXISTE = (SELECT COUNT(*) FROM INVENTARIO WHERE PRODUCTO = NAME);
	IF (EXISTE > 0) THEN
		SELECT "PRODUCTO YA EXISTENTE" AS MENSAJE;
	ELSE
		INSERT INTO INVENTARIO (PRODUCTO,CANTIDAD,DESCRIPCION) VALUES (NAME,QUANTITY,DESCRIPTION);
		SELECT "PRODUCTO REGISTRADO" AS MENSAJE;
	END IF;
END
//
DELIMITER ;
DROP PROCEDURE IF EXISTS ALTA_PRODUCTO;
DELIMITER //
CREATE PROCEDURE ALTA_PRODUCTO(NAME VARCHAR(40),DESCRIPTION TEXT,PRICE FLOAT ,IMAGE TEXT)
BEGIN
	DECLARE EXISTE INT;
	SET EXISTE = (SELECT COUNT(*) FROM PRODUCTO WHERE NOMBRE = NAME);
	IF (EXISTE > 0) THEN
		SELECT "PRODUCTO YA EXISTENTE" AS MENSAJE;
	ELSE
		INSERT INTO PRODUCTO (NOMBRE,DESCRIPCION,PRECIO,IMG) VALUES (NAME,DESCRIPTION,PRICE,IMAGE);
		SELECT "PRODUCTO REGISTRADO" AS MENSAJE;
	END IF;
END
//
DELIMITER ;
DROP PROCEDURE IF EXISTS ALTA_OFERTA;
DELIMITER //

CREATE PROCEDURE ALTA_OFERTA (TIPE TEXT, VALUE FLOAT)
BEGIN
	DECLARE EXISTE INT;
	SET EXISTE = (SELECT COUNT(*) FROM TIPO_OFERTAS WHERE TIPE = TIPO);
	IF (EXISTE > 0) THEN
		SELECT "OFERTA YA EXISTENTE" AS MENSAJE;
	ELSE
		INSERT INTO TIPO_OFERTAS(TIPO,VALOR) VALUES (TIPE,VALUE);
		SELECT "OFERTA REGISTRADA" AS MENSAJE;
	END IF;
END
//
DELIMITER ;
DROP PROCEDURE IF EXISTS REGISTRAR_OFERTA;
DELIMITER //
CREATE PROCEDURE REGISTRAR_OFERTA(TIPE TEXT,NAME VARCHAR(40))
BEGIN
	DECLARE ID_P INT;
	DECLARE ID_O INT;
	DECLARE EXISTE INT;
	SET ID_P = (SELECT ID_PRODUCTO FROM PRODUCTO WHERE NAME = NOMBRE);
	SET ID_O = (SELECT ID_TO FROM TIPO_OFERTAS WHERE TIPE = TIPO);
	SET EXISTE = (SELECT COUNT(*) FROM REL_OFERTAS_PRODUCTO WHERE ID_P = ID_PRODUCTO AND ID_O = ID_OFERTA);
	IF (EXISTE >0) THEN
	SELECT "OFERTA YA REGISTRADA" AS MENSAJE;
	ELSE
	INSERT INTO REL_OFERTAS_PRODUCTO (ID_OFERTA,ID_PRODUCTO) VALUES (ID_O,ID_P);
	SELECT "OFERTA REGISTRADA" AS MENSAJE;
	END IF;
END
//
DELIMITER ;
DROP PROCEDURE IF EXISTS AGREGAR_RECETA;
DELIMITER //
CREATE PROCEDURE AGREGAR_RECETA(INGREDIENTE VARCHAR(50),PRODUCT VARCHAR(40),QUANTITY INT)
BEGIN
	DECLARE ID_I INT;
    DECLARE ID_P INT;
	SET ID_I =(SELECT ID_INVENTARIO FROM INVENTARIO WHERE INGREDIENTE = PRODUCTO);
    SET ID_P = (SELECT ID_PRODUCTO FROM PRODUCTO WHERE NOMBRE = PRODUCT);
    SELECT ID_I,ID_P;
    IF (ID_I > 0)  AND (ID_P > 0) THEN
		INSERT INTO REL_INVENTARIO_PRODUCTO(ID_INVENTARIO,ID_PRODUCTO,CANTIDAD) VALUES (ID_I,ID_P,QUANTITY);
        SELECT "SE REGISTRÓ EL INGREDIENTE" AS MENSAJE;
	ELSE
		SELECT "NO SE PUDO REGISTRAR" AS MENSAJE;
    END IF;
END 
//
