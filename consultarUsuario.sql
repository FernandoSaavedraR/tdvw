

select nombre,apellidos,usuario,contrasena,direccion,numero,cvv,banco,fondos from persona 
inner join usuario on persona.id_persona = usuario.id_persona
inner join rel_dir_persona on rel_dir_persona.id_persona = persona.id_persona
inner join direcciones on rel_dir_persona.id_direccion = direcciones.id_direccion
inner join rel_tarjeta_usuario on rel_tarjeta_usuario.id_usuario = usuario.id_usuario
inner join tarjeta on rel_tarjeta_usuario.id_tarjeta = tarjeta.id_tarjeta;