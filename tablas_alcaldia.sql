create table rf_persona(
	cod_per serial,
	nom varchar(30),
	ape1 varchar(20),
	ape2 varchar(20),
	sex char,
	fec_nac date,
	dui varchar(10),
	nit varchar(20),
	tel1 varchar(10),
	tel2 varchar(10),
	dep varchar(12),
	mun varchar(30),
	dir text,
	ocu varchar(40),
	est_civ varchar(10),
	primary key(cod_per)
);

create table funcionario(
	cod_fun varchar(5),
	nom varchar(70),
	cargo varchar(40),
	per varchar(12),
	primary key (cod_fun)
);

create table um_proyecto(
	cod_pro varchar(25) primary key,
	nom_pro varchar(100),
	des text, 
	ubi text,
	fec_ini date,
	fec_fin date,
	tip_fon varchar(10),
	mon_pro float,
	mon_ext float,
	pat text,
	est varchar(15)
);

create table um_per_proy_temp(
	car varchar(12),
	sal float,
	cod_pro varchar(10),
	cod_per int
);


create table um_per_proy(
	car varchar(12),
	sal float,
	cod_pro varchar(10) references um_proyecto(cod_pro),
	cod_per int references rf_persona (cod_per)
);

create table um_gas_proy(
	cod_com serial,
	fec_com date,
	num_com varchar(10),
	con_com text,
	mon_com float,
	cod_pro varchar(10) references um_proyecto(cod_pro)
);

create table um_ben_proy(
	cod_per int references rf_persona(cod_per),
	cod_pro varchar(10) references um_proyecto(cod_pro)
);

create table um_expediente(
	cod_exp serial primary key,
	ano_res int,
	niv_edu varchar(25),

	oci_ded text,
	oci_lec text,
	oci_otr text,

	tra_rem char(2),
	baj_con char(2),
	jor_tra int,
	ing_med_men float,
	otr_tip_ing varchar(25),
	dep_eco_agr char(2),
	rec_ayu char(2),
	rec_ayu_ong varchar(30),

	med_cab char(2),
	acu_amb varchar(20),
	tra_con text,
	com varchar(10),
	con_agr varchar(25),
	dur_rel_sen Varchar(30),
	pri_con char(2),

	suf_mal char(2),
	mal_qui varchar(30),
	suf_abu_sex char(2),
	abu_qui_sex varchar(30),

	tra_sep char(2),
	med_cau text,
	rup_ant char(2),
	dur_mal varchar(25),

	ame_rup	char(2),

	mal_men char(2),
	tip_mal_men text,
	num_hij int,
	per_hog text,
	apo_eco_fam varchar(25),
	apo_afe_fam varchar(25),
	apo_cri varchar(25),
	con_sit char(2),
	con_apo char(2),
	man_rel_agr char(2),

	apo_efe_ami varchar(25),
	apo_afe_ami varchar(25),
	ent_con_agr char(2),
	ent_apo_agr char(2),

	niv_edu_agr varchar(25),
	ant_pen_agr text,
	car_agr text,
	dec_aba_hog text,
	res_ame_rup text,
	
	abu_qui text,
	prob_agr text,
	
	cod_per int references rf_persona(cod_per),
	cod_agr int references rf_persona(cod_per)
);

create table um_exp_padres(
	cod_mad int references rf_persona(cod_per),
	cod_pad int references rf_persona(cod_per),
	cod_exp int references um_expediente(cod_exp)
);

create table um_obs_exp(
	cod_exp int references um_expediente(cod_exp),
	fec_obs date,
	obs text
);
 
create table ca_negocio(
	cod_neg serial,
	nom_neg text,
	rub_neg text,
	zon_neg varchar(6),
	dep varchar(12),
	mun varchar(30),
	dir_neg text,
	med_neg float,
	img_neg text,
	est_neg boolean,
	tip_con char,
	cod_con int,
	primary key (cod_neg)
);

-- cod_pan codigo propietario anterior
-- cod_pnu codigo nuevo propietario
create table ca_traspaso(
	cod_neg int references ca_negocio(cod_neg),
	cod_pan int references rf_persona(cod_per),
	cod_pnu int references rf_persona(cod_per),
	fec_tra date
);

create table ca_cierre(
	cod_neg int references ca_negocio(cod_neg),
	fec_cie date,
	mot_cie text
);

create table ca_inmueble(
	cod_inm varchar(20) primary key,
	cod_pro int references rf_persona(cod_per),
	zon_inm varchar(6),
	dir_inm text,
	med_inm float,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text
);

create table ca_cementerio(
	cod_cem serial primary key,
	nom_cem varchar(50),
	sit_en  text,
	zon_cem varchar(6)
);

create table ca_perpetuidad(
	cod_tit serial primary key,
	ancho float,
	largo float,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text,
	nic_aut int,
	clase varchar(30),
	valor float,
	num_rec varchar(15),
	fec_rec date,
	cod_cem int references ca_cementerio(cod_cem),
	cod_pro int references rf_persona(cod_per)
);

create table ca_enterrado(
	cod_per int references rf_persona(cod_per),
	cod_tit int references ca_perpetuidad(cod_tit),
	nom_fall varchar(80)
);

create table ca_sociedad(
	idSoc serial primary key,
	nom_jur varchar(30),
	fec_cons date,
	gir_jur varchar(40),
	nit_jur varchar(20),
	tel_jur varchar(10),
	dir_jur text
);

create table co_impuesto(
	codigo varchar(5)  primary key,
	nom_cue text,
	des_cue text,
	tip_cob varchar(10),
	cob_por float,
	cob_fij float,
	cob_min float,
	condonado boolean
);

create table co_condonado(
	codigo varchar(5) references co_impuesto(codigo),
	fec_ini date,
	fec_fin date,
	num_acu varchar(25)
);

create table co_neginm_imp(
	cod_neginm varchar(20),
	cod_imp varchar(5) references co_impuesto(codigo)
);

create table co_notificacion(
	id_not serial primary key,
	mensaje text,
	fec_hor timestamp,
	status boolean
);

create table co_estcta(
	cod_neg
);

create table co_factura(
	id_fac serial primary key,
	can float,
	nom_con varchar(100),
	con text,
	mun varchar(13),
	fec date,
	num_ser varchar(10),
	num_cor varchar(10)
);



create table af_depto(
	cod serial primary key,
	nom varchar(50)
);
create table af_tfondo(
	cod_tfondo serial primary key,
	nom varchar(50),
	des text
);
create table af_activo(
	cod_act varchar(25) primary key,
	nom varchar(50),
	mar varchar(50),
	mod varchar(50),
	ser varchar(50),
	cos_adq float,
	fec_adq date,
	act boolean,
	cod_dep int references af_depto(cod),
	cod_tfondo int references af_tfondo(cod_tfondo),
	ori varchar(10),
	fec_gar date,
	don varchar(25)
);
create table af_mantenimiento(
	cod_act varchar(25) references af_activo(cod_act),
	des varchar(100),
	cos float,
	emp varchar(50),
	fec date,
	cod_man serial
);
create table af_traslados(
	cod_tra serial primary key,
	cod_act varchar(25) references af_activo(cod_act),
	fec date,
	new_ubi varchar(100),
	cod_dep int
);

create table se_usuario(
	id serial primary key unique,
	nom varchar(100),
	mail varchar(100),
	usu varchar(25),
	contra varchar(40),
	niv varchar(13),
	act boolean
);