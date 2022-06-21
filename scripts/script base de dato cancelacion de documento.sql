
/*base de datos gracoil cancelacion de documentos*/

create database grac_canc_doc;
	use grac_canc_doc;

create table cancelacion_doc (
id_cd int not null primary key auto_increment,
nom_emp varchar(100) default null,
fecha_sol date,
dpt_sol varchar(100) default null,
desc_mov text default null,
tip_mov text default null,
nom_clie text default null,
num_doc text default null,
fecha_doc date,
monto_doc text default null,
fol_fisc text default null,
num_doc_cred text default null,
fec_doc_cred date,
mon_doc_cred text default null
);



/*base de datos inter cancelacion de documentos*/


create database int_canc_doc;
	use int_canc_doc;

create table cancelacion_doc (
	id_cd int not null primary key auto_increment,
	nom_emp varchar(100) default null,
	fecha_sol date,
	dpt_sol varchar(100) default null,
	desc_mov text default null,
	tip_mov text default null,
	nom_clie text default null,
	num_doc text default null,
	fecha_doc date,
	monto_doc text default null,
	fol_fisc text default null,
	num_doc_cred text default null,
    fec_doc_cred date,
    mon_doc_cred text default null
);

