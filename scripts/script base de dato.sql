create database registro_cliente;
	use registro_cliente;

CREATE TABLE registro_cliente (
    id_regclie int not null auto_increment primary key,
   	rzs varchar(200),
   	reg_fed_con varchar(200),
   	dic_fisc varchar(200),
   	nom_conct_comp varchar(200),
   	correo_conct_comp varchar(200),
   	tel_ofic varchar(200),
   	tel_mob_conct varchar(200),
   	com_men_apro varchar(200),
   	dic_entreg varchar(200),
   	nom_conct_pag varchar(200),
   	correo_conct_pag varchar(200),
   	tel_ofic_conct_pag varchar(200),
   	tel_mob_conct_pag varchar(200),
   	correo_env_fact varchar(200),
   	num_cuen varchar(200)
);


insert into registro_cliente(
		id_regclie,
		rzs,
		reg_fed_con,
		dic_fisc,
		nom_conct_comp,
		correo_conct_comp,
		tel_ofic,
		tel_mob_conct,
		com_men_apro,
		dic_entreg,
		nom_conct_pag,
		correo_conct_pag,
		tel_ofic_conct_pag,
		tel_mob_conct_pag,
		correo_env_fact,
		num_cuen
		)values(
		'',
		'TRANSPORTES RISERO SA DE CV',
		'TRI1405156Z3',
		'Calle Estudiante #10, Col. San Felipe, Atotonilco el alto, Jal.',
		'LUIS FERNANDO SERRANO GUZMAN ',
		'serguz.transportes@hotmail.com',
		'391 917 0283',
		'3317250253',
		'40,000 LITROS',
		'EL RANERO DE SERRANO, DIRECCION;ANTONIO FLORES  ZAHER 20, ATOTONILCO EL ALTO, JAL.',
		'RICARDO SERRANO RODRIGUEZ',
		'transportesrisero@hotmail.com',
		'391 917 0283',
		'3312848259',
		'transportesrisero@hotmail.com',
		'0234095597C'
		);

