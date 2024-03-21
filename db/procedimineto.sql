Delimiter//
create procedure `proc_insertar_respuestas`
(in idQuestion int, 
in respuesta1 varchar(255), 
in respuesta2 varchar(255), 
in respuesta3 varchar(255), 
in opcionRespuesta int)
begin
    if opcionRespuesta=1 then
        insert into respuestas (idQuestion, descripcionRespuesta, opcionRespuesta) values (idQuestion, respuesta1, 'V');
    else
        insert into respuestas (idQuestion, descripcionRespuesta, opcionRespuesta) values (idQuestion, respuesta1, 'F');
    end if;
    if opcionRespuesta=2 then
        insert into respuestas (idQuestion, descripcionRespuesta, opcionRespuesta) values (idQuestion, respuesta2, 'V');
    else
        insert into respuestas (idQuestion, descripcionRespuesta, opcionRespuesta) values (idQuestion, respuesta2, 'F');
   end if;
    if opcionRespuesta=3 then
        insert into respuestas (idQuestion, descripcionRespuesta, opcionRespuesta) values (idQuestion, respuesta3, 'V');
    else
        insert into respuestas (idQuestion, descripcionRespuesta, opcionRespuesta) values (idQuestion, respuesta3, 'F');
    end if;
end //
Delimiter ;
 
