create database actividades_contador;
	use actividades_contador;

create table actividades_contador(
id_ac int primary key not null auto_increment,
acti text default null,
fecha_lim date,
avance varchar(4) default null,
present text default null,
revisado varchar(4) default null,
comp varchar(4) default null,
dept varchar(60) default null,
obser text default null,
estatus text default null
);

insert into actividades_contador(
id_ac,
acti,
fecha_lim,
avance,
present,
revisado,
comp,
dept,
obser,
estatus
) values('', 'Estadias', '2022-08-31', '20', 'memoria_tecnica.docx', 'NO', 'NO', 'SISTEMAS', 'N/A', 'PROCESO');


insert into actividades_contador(
id_ac,
acti,
fecha_lim,
avance,
present,
revisado,
comp,
dept,
obser, 
estatus
) values('', 'Estadias', '2022-08-31', '20', 'memoria_tecnica.docx', 'NO', 'NO', 'SISTEMAS', 'N/A', 'PROCESO');

insert into actividades_contador(
id_ac,
acti,
fecha_lim,
avance,
present,
revisado,
comp,
dept,
obser,
estatus
) values('', 'Estadias', '2022-08-31', '100', 'memoria_tecnica.docx', 'NO', 'NO', 'SISTEMAS', 'N/A', 'FINALIZADAD');