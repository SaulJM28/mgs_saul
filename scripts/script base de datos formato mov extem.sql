create database fme;
	use fme;

create table mov_ext_empresa(
id_ext int not null auto_increment primary key,
no_ope int default null,
clv_sol_inc text default null,
area text default null,
proceso text default null,
importe text default null,
solicitud text default null,
fec_lim_reg date,
fec_cap date,
dias_atra int default null,
just text default null,
obser text default null,
nom_resp_area text default null,
nom_resp_proc text default null,
empresa text default null
);

insert into mov_ext_empresa (id_ext, no_ope, clv_sol_inc, area, proceso, importe, solicitud, fec_lim_reg, fec_cap, dias_atra, just, obser, nom_resp_area, nom_resp_proc, empresa) 
					values ('', 001, 'ejemplo', 'ejemplo', 'ejemplo', 'ejemplo', 'ejemplo', '2022-05-30', '2022-05-01', 10, 'ejemplo', 'ejemplo', 'ejemplo', 'ejemplo', 'gracoil');

					insert into mov_ext_empresa (id_ext, no_ope, clv_sol_inc, area, proceso, importe, solicitud, fec_lim_reg, fec_cap, dias_atra, just, obser, nom_resp_area, nom_resp_proc, empresa) 
					values ('', 001, 'ejemplo', 'ejemplo', 'ejemplo', 'ejemplo', 'ejemplo', '2022-05-30', '2022-05-01', 10, 'ejemplo', 'ejemplo', 'ejemplo', 'ejemplo', 'inter');

DELIMITER |

CREATE TRIGGER dias_atra BEFORE INSERT ON mov_ext_empresa
  FOR EACH ROW BEGIN
    INSERT INTO mov_ext_empresa SET New.dias_atra = TIMESTAMPDIFF(DAY, NEW.fec_lim_reg, NEW.fec_cap);
  END
|

DELIMITER ;