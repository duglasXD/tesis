--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Estrutura de tabla 'af_activo'
--
DROP TABLE IF EXISTS af_activo CASCADE;
CREATE TABLE af_activo (
	cod_act character varying(25) NOT NULL,
	nom character varying(50),
	mar character varying(50),
	mod character varying(50),
	ser character varying(50),
	cos_adq double precision,
	fec_adq date,
	act boolean,
	cod_dep integer,
	cod_tfondo integer,
	ori character varying(10),
	fec_gar date,
	don character varying(25)
);
--
-- Creando datos de 'af_activo'
--
--
-- Creando indices PrimaryKey 'af_activo'
--
ALTER TABLE ONLY  af_activo  ADD CONSTRAINT  af_activo_pkey  PRIMARY KEY  (cod_act);
--
-- Creando indices Unique 'af_activo'
--




 CREATE SEQUENCE af_depto_cod_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'af_depto'
--
DROP TABLE IF EXISTS af_depto CASCADE;
CREATE TABLE af_depto (
	cod integer NOT NULL DEFAULT nextval('af_depto_cod_seq'::regclass),
	nom character varying(50)
);


 ALTER SEQUENCE af_depto_cod_seq OWNED BY af_depto.cod;--
-- Creando datos de 'af_depto'
--
--
-- Creando indices PrimaryKey 'af_depto'
--
ALTER TABLE ONLY  af_depto  ADD CONSTRAINT  af_depto_pkey  PRIMARY KEY  (cod);
--
-- Creando indices Unique 'af_depto'
--




 CREATE SEQUENCE af_mantenimiento_cod_man_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'af_mantenimiento'
--
DROP TABLE IF EXISTS af_mantenimiento CASCADE;
CREATE TABLE af_mantenimiento (
	cod_act character varying(25),
	des character varying(100),
	cos double precision,
	emp character varying(50),
	fec date,
	cod_man integer NOT NULL DEFAULT nextval('af_mantenimiento_cod_man_seq'::regclass)
);


 ALTER SEQUENCE af_mantenimiento_cod_man_seq OWNED BY af_mantenimiento.cod_man;--
-- Creando datos de 'af_mantenimiento'
--
--
-- Creando indices Unique 'af_mantenimiento'
--




 CREATE SEQUENCE af_tfondo_cod_tfondo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'af_tfondo'
--
DROP TABLE IF EXISTS af_tfondo CASCADE;
CREATE TABLE af_tfondo (
	cod_tfondo integer NOT NULL DEFAULT nextval('af_tfondo_cod_tfondo_seq'::regclass),
	nom character varying(50),
	des text
);


 ALTER SEQUENCE af_tfondo_cod_tfondo_seq OWNED BY af_tfondo.cod_tfondo;--
-- Creando datos de 'af_tfondo'
--
--
-- Creando indices PrimaryKey 'af_tfondo'
--
ALTER TABLE ONLY  af_tfondo  ADD CONSTRAINT  af_tfondo_pkey  PRIMARY KEY  (cod_tfondo);
--
-- Creando indices Unique 'af_tfondo'
--




 CREATE SEQUENCE af_traslados_cod_tra_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'af_traslados'
--
DROP TABLE IF EXISTS af_traslados CASCADE;
CREATE TABLE af_traslados (
	cod_tra integer NOT NULL DEFAULT nextval('af_traslados_cod_tra_seq'::regclass),
	cod_act character varying(25),
	fec date,
	new_ubi character varying(100),
	cod_dep integer
);


 ALTER SEQUENCE af_traslados_cod_tra_seq OWNED BY af_traslados.cod_tra;--
-- Creando datos de 'af_traslados'
--
--
-- Creando indices PrimaryKey 'af_traslados'
--
ALTER TABLE ONLY  af_traslados  ADD CONSTRAINT  af_traslados_pkey  PRIMARY KEY  (cod_tra);
--
-- Creando indices Unique 'af_traslados'
--




 CREATE SEQUENCE ca_cementerio_cod_cem_seq
    START WITH 7
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'ca_cementerio'
--
DROP TABLE IF EXISTS ca_cementerio CASCADE;
CREATE TABLE ca_cementerio (
	cod_cem integer NOT NULL DEFAULT nextval('ca_cementerio_cod_cem_seq'::regclass),
	nom_cem character varying(50),
	sit_en text,
	zon_cem character varying(6)
);


 ALTER SEQUENCE ca_cementerio_cod_cem_seq OWNED BY ca_cementerio.cod_cem;--
-- Creando datos de 'ca_cementerio'
--
INSERT INTO ca_cementerio VALUES ('6','Cementerio de La Divina Providencia','C/ Nueva Esparta a un costado de cancha municipal','Rural');
INSERT INTO ca_cementerio VALUES ('5','Cementerio Santa Anita','C/ Santa Anita','Rural');
--
-- Creando indices PrimaryKey 'ca_cementerio'
--
ALTER TABLE ONLY  ca_cementerio  ADD CONSTRAINT  ca_cementerio_pkey  PRIMARY KEY  (cod_cem);
--
-- Creando indices Unique 'ca_cementerio'
--


--
-- Estrutura de tabla 'ca_cierre'
--
DROP TABLE IF EXISTS ca_cierre CASCADE;
CREATE TABLE ca_cierre (
	cod_neg integer,
	fec_cie date,
	mot_cie text
);
--
-- Creando datos de 'ca_cierre'
--
--
-- Creando indices Unique 'ca_cierre'
--


--
-- Estrutura de tabla 'ca_enterrado'
--
DROP TABLE IF EXISTS ca_enterrado CASCADE;
CREATE TABLE ca_enterrado (
	cod_per integer,
	cod_tit integer,
	nom_fall character varying(80)
);
--
-- Creando datos de 'ca_enterrado'
--
--
-- Creando indices Unique 'ca_enterrado'
--


--
-- Estrutura de tabla 'ca_inmueble'
--
DROP TABLE IF EXISTS ca_inmueble CASCADE;
CREATE TABLE ca_inmueble (
	cod_inm character varying(20) NOT NULL,
	cod_pro integer,
	zon_inm character varying(6),
	dir_inm text,
	med_inm double precision,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text
);
--
-- Creando datos de 'ca_inmueble'
--
--
-- Creando indices PrimaryKey 'ca_inmueble'
--
ALTER TABLE ONLY  ca_inmueble  ADD CONSTRAINT  ca_inmueble_pkey  PRIMARY KEY  (cod_inm);
--
-- Creando indices Unique 'ca_inmueble'
--




 CREATE SEQUENCE ca_negocio_cod_neg_seq
    START WITH 37
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'ca_negocio'
--
DROP TABLE IF EXISTS ca_negocio CASCADE;
CREATE TABLE ca_negocio (
	cod_neg integer NOT NULL DEFAULT nextval('ca_negocio_cod_neg_seq'::regclass),
	nom_neg text,
	rub_neg text,
	zon_neg character varying(6),
	dep character varying(12),
	mun character varying(30),
	dir_neg text,
	med_neg double precision,
	img_neg text,
	est_neg boolean,
	tip_con character(1),
	cod_con integer
);


 ALTER SEQUENCE ca_negocio_cod_neg_seq OWNED BY ca_negocio.cod_neg;--
-- Creando datos de 'ca_negocio'
--
INSERT INTO ca_negocio VALUES ('1','Tienda Mishita','tieda','Rural','Cuscatlán','San Cristóbal','C/Santa Anita','12',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('2','Tienda Mishita 2','tienda','Rural','Cuscatlán','San Cristóbal','ahi','3',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('3','Tienda Mishita 3','tienda','Rural','Cuscatlán','San Cristóbal','asdas','3',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('4','Tienda Darlene','tienda','Rural','Cuscatlán','San Cristóbal','ahi','9',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('5','Darlene 2','tienda','Rural','Cuscatlán','San Cristóbal','asdasdas','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('6','Darlene 3','tienda','Rural','Cuscatlán','San Cristóbal',NULL,'0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('7','Darlene 7','tienda','Rural','Cuscatlán','San Cristóbal','asdas','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('8','Darlene 7','tienda','Rural','Cuscatlán','San Cristóbal','asdas','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('9','Darlene 7','tienda','Rural','Cuscatlán','San Cristóbal','asdas','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('10','Darlene 8',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('11','Darlene 8',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('12','Dar9','tienda','Rural','Cuscatlán','San Cristóbal','asdas','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('13','dar10',NULL,'Rural','Cuscatlán','San Cristóbal','asd','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('14','dar11','asdasda','Rural','Cuscatlán','San Cristóbal','asdasd','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('15','dar12','asda','Rural','Cuscatlán','San Cristóbal','asdas','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('16','dar13',NULL,'Rural','Cuscatlán','San Cristóbal',NULL,'0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('17','dar13',NULL,'Rural','Cuscatlán','San Cristóbal',NULL,'0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('18','dar14','asdasd','Rural','Cuscatlán','San Cristóbal','asdas','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('19','dar15','asdasd','Rural','Cuscatlán','San Cristóbal','asdas','0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('20','dar16',NULL,'Rural','Cuscatlán','San Cristóbal',NULL,'0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('21','abarroteria astrid','asd','Rural','Cuscatlán','San Cristóbal','asd','0',NULL,'t','N','1');
INSERT INTO ca_negocio VALUES ('22','abarroteria astrid','asd','Rural','Cuscatlán','San Cristóbal','asd','0',NULL,'t','N','1');
INSERT INTO ca_negocio VALUES ('23','abarroteria astrid 3','asd','Rural','Cuscatlán','San Cristóbal','asd','0',NULL,'t','N','1');
INSERT INTO ca_negocio VALUES ('24','dar20',NULL,'Rural','Cuscatlán','San Cristóbal',NULL,'0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('25','negocio de astrid','asdas','Rural','Cuscatlán','San Cristóbal','asda','2',NULL,'t','N','1');
INSERT INTO ca_negocio VALUES ('26','dar21',NULL,'Rural','Cuscatlán','San Cristóbal',NULL,'0',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('27','dar23',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('28','dar23',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('29','dar23',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('30','dar23',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('31','dar23',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('32','dar23',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('33','dar23',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('34','dar25',NULL,'Rural','Cuscatlán','San Cristóbal','asdsa','2',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('35','dar1412',NULL,'Rural','Cuscatlán','San Cristóbal','asda','3',NULL,'t','N','2');
INSERT INTO ca_negocio VALUES ('36','Licores Darleem',NULL,'Rural','Cuscatlán','San Cristóbal','asdas','2',NULL,'t','N','2');
--
-- Creando indices PrimaryKey 'ca_negocio'
--
ALTER TABLE ONLY  ca_negocio  ADD CONSTRAINT  ca_negocio_pkey  PRIMARY KEY  (cod_neg);
--
-- Creando indices Unique 'ca_negocio'
--




 CREATE SEQUENCE ca_perpetuidad_cod_tit_seq
    START WITH 4
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'ca_perpetuidad'
--
DROP TABLE IF EXISTS ca_perpetuidad CASCADE;
CREATE TABLE ca_perpetuidad (
	cod_tit integer NOT NULL DEFAULT nextval('ca_perpetuidad_cod_tit_seq'::regclass),
	ancho double precision,
	largo double precision,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text,
	nic_aut integer,
	clase character varying(30),
	valor double precision,
	num_rec character varying(15),
	fec_rec date,
	cod_cem integer,
	cod_pro integer
);


 ALTER SEQUENCE ca_perpetuidad_cod_tit_seq OWNED BY ca_perpetuidad.cod_tit;--
-- Creando datos de 'ca_perpetuidad'
--
INSERT INTO ca_perpetuidad VALUES ('1','2','3','muert','muert','muert','muert','1','Primera','54.29','2506','2015-04-29','6','1');
INSERT INTO ca_perpetuidad VALUES ('2','0','0',NULL,NULL,NULL,NULL,'1','Primera','54.29',NULL,'2015-05-08','6','1');
INSERT INTO ca_perpetuidad VALUES ('3','0','0',NULL,NULL,NULL,NULL,'1','Primera','54.29',NULL,'2015-05-08','6','2');
--
-- Creando indices PrimaryKey 'ca_perpetuidad'
--
ALTER TABLE ONLY  ca_perpetuidad  ADD CONSTRAINT  ca_perpetuidad_pkey  PRIMARY KEY  (cod_tit);
--
-- Creando indices Unique 'ca_perpetuidad'
--




 CREATE SEQUENCE ca_sociedad_idsoc_seq
    START WITH 2
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'ca_sociedad'
--
DROP TABLE IF EXISTS ca_sociedad CASCADE;
CREATE TABLE ca_sociedad (
	idsoc integer NOT NULL DEFAULT nextval('ca_sociedad_idsoc_seq'::regclass),
	nom_jur character varying(30),
	fec_cons date,
	gir_jur character varying(40),
	nit_jur character varying(20),
	tel_jur character varying(10),
	dir_jur text
);


 ALTER SEQUENCE ca_sociedad_idsoc_seq OWNED BY ca_sociedad.idsoc;--
-- Creando datos de 'ca_sociedad'
--
INSERT INTO ca_sociedad VALUES ('1','Los Socios S.A de C.V','1992-09-10','tiendas','0241-321454-313-5','1546-7644','C/Concepción ');
--
-- Creando indices PrimaryKey 'ca_sociedad'
--
ALTER TABLE ONLY  ca_sociedad  ADD CONSTRAINT  ca_sociedad_pkey  PRIMARY KEY  (idsoc);
--
-- Creando indices Unique 'ca_sociedad'
--


--
-- Estrutura de tabla 'ca_traspaso'
--
DROP TABLE IF EXISTS ca_traspaso CASCADE;
CREATE TABLE ca_traspaso (
	cod_neg integer,
	cod_pan integer,
	cod_pnu integer,
	fec_tra date
);
--
-- Creando datos de 'ca_traspaso'
--
--
-- Creando indices Unique 'ca_traspaso'
--


--
-- Estrutura de tabla 'co_condonado'
--
DROP TABLE IF EXISTS co_condonado CASCADE;
CREATE TABLE co_condonado (
	codigo character varying(5),
	fec_ini date,
	fec_fin date,
	num_acu character varying(25)
);
--
-- Creando datos de 'co_condonado'
--
--
-- Creando indices Unique 'co_condonado'
--


--
-- Estrutura de tabla 'co_impuesto'
--
DROP TABLE IF EXISTS co_impuesto CASCADE;
CREATE TABLE co_impuesto (
	codigo character varying(5) NOT NULL,
	nom_cue text,
	des_cue text,
	tip_cob character varying(10),
	cob_por double precision,
	cob_fij double precision,
	cob_min double precision,
	condonado boolean
);
--
-- Creando datos de 'co_impuesto'
--
INSERT INTO co_impuesto VALUES ('11801','COMERCIO',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('11802','INDUSTRIA',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('11804','DE SERVICIOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('11816','TRANSPORTES',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('11818','VIALIDAD',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12105','POR SERVICIOS DE CERTIFICACION',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12106','POR EXPEDICION DE DOC. DE IDENTIFICACION',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12110','CASETAS DE TELEFONOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12115','MERCADO',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12118','POSTES, TORRES Y ANTENAS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12119','RASTRO Y TIANGUE',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12123','BAÑOS Y SERVICIOS SANITARIOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12210','PERMISOS Y LICENCIAS MUNICIPALES',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12211','COTEJO DE FIERROS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('14201','SERVICIOS BASICOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('14299','SERVICIOS DIVERSOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('15301','MULTAS POR MORA DE IMPUESTOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('15302','INTERESES MORATORIOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('15312','MULTAS (REG)',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('15313','MULTAS AL COMERCIO',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('15314','MULTAS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('15703','INTERESES BANCARIOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('15799','INGRESOS DIVERSOS',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('16201','FODES FUNCIONAMIENTO',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('16304','DE PERSONAS NATURALES',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('22201','TRANSF. DE CAPITAL AL SECTOR PUBLICO',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('22036','ESTUDIOS DE FACTIBILIDAD',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('22038','INFRAESTRUCTURA SOCIAL',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('31306','DE MUNICIPALIDADES',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('31308','CREDITO DE EMPRESA PRIVADA FINANCIERA',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('31310','EMPRESITO DE PERSONAS NATURALES',NULL,'Fijo','0','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12114','FIESTAS PATRONALES',NULL,'Porcentaje','5','0','2.86','f');
INSERT INTO co_impuesto VALUES ('12108','ALUMBRADO PUBLICO',NULL,'Fijo','0','0.03','2.86','f');
INSERT INTO co_impuesto VALUES ('12117','PAVIMENTACION',NULL,'Fijo','0','0.05','2.86','f');
INSERT INTO co_impuesto VALUES ('12111','CEMENTERIOS MUNICIPALES',NULL,'Fijo','0','54.29','2.86','f');
--
-- Creando indices PrimaryKey 'co_impuesto'
--
ALTER TABLE ONLY  co_impuesto  ADD CONSTRAINT  co_impuesto_pkey  PRIMARY KEY  (codigo);
--
-- Creando indices Unique 'co_impuesto'
--


--
-- Estrutura de tabla 'co_neginm_imp'
--
DROP TABLE IF EXISTS co_neginm_imp CASCADE;
CREATE TABLE co_neginm_imp (
	cod_neginm character varying(20),
	cod_imp character varying(5)
);
--
-- Creando datos de 'co_neginm_imp'
--
INSERT INTO co_neginm_imp VALUES ('1','12108');
INSERT INTO co_neginm_imp VALUES ('1','12117');
INSERT INTO co_neginm_imp VALUES ('4','12108');
INSERT INTO co_neginm_imp VALUES ('4','12117');
INSERT INTO co_neginm_imp VALUES ('7','11802');
INSERT INTO co_neginm_imp VALUES ('7','11816');
INSERT INTO co_neginm_imp VALUES ('8','11802');
INSERT INTO co_neginm_imp VALUES ('8','11816');
INSERT INTO co_neginm_imp VALUES ('9','11802');
INSERT INTO co_neginm_imp VALUES ('9','11816');
INSERT INTO co_neginm_imp VALUES ('18','12117');
INSERT INTO co_neginm_imp VALUES ('19','12117');
INSERT INTO co_neginm_imp VALUES ('21','12117');
INSERT INTO co_neginm_imp VALUES ('22','12117');
INSERT INTO co_neginm_imp VALUES ('23','12117');
INSERT INTO co_neginm_imp VALUES ('35','12108');
INSERT INTO co_neginm_imp VALUES ('36','12108');
--
-- Creando indices Unique 'co_neginm_imp'
--




 CREATE SEQUENCE co_notificacion_id_not_seq
    START WITH 4
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'co_notificacion'
--
DROP TABLE IF EXISTS co_notificacion CASCADE;
CREATE TABLE co_notificacion (
	id_not integer NOT NULL DEFAULT nextval('co_notificacion_id_not_seq'::regclass),
	mensaje text,
	fec_hor timestamp,
	status boolean
);


 ALTER SEQUENCE co_notificacion_id_not_seq OWNED BY co_notificacion.id_not;--
-- Creando datos de 'co_notificacion'
--
INSERT INTO co_notificacion VALUES ('1','Cobro por título de perpetuidad a nombre de: Astrid Idania Vasquez Gonzales','2015-04-29 23:14:24','t');
INSERT INTO co_notificacion VALUES ('2','Cobro por título de perpetuidad a nombre de: Astrid Idania Vasquez Gonzales','2015-05-08 22:07:47','t');
INSERT INTO co_notificacion VALUES ('3','Cobro por título de perpetuidad a nombre de: Darlene Melissa Gonzales ','2015-05-08 22:08:25','t');
--
-- Creando indices PrimaryKey 'co_notificacion'
--
ALTER TABLE ONLY  co_notificacion  ADD CONSTRAINT  co_notificacion_pkey  PRIMARY KEY  (id_not);
--
-- Creando indices Unique 'co_notificacion'
--




 CREATE SEQUENCE rf_persona_cod_per_seq
    START WITH 8
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'rf_persona'
--
DROP TABLE IF EXISTS rf_persona CASCADE;
CREATE TABLE rf_persona (
	cod_per integer NOT NULL DEFAULT nextval('rf_persona_cod_per_seq'::regclass),
	nom character varying(30),
	ape1 character varying(20),
	ape2 character varying(20),
	sex character(1),
	fec_nac date,
	dui character varying(10),
	nit character varying(20),
	tel1 character varying(10),
	tel2 character varying(10),
	dep character varying(12),
	mun character varying(30),
	dir text,
	ocu character varying(40),
	est_civ character varying(10)
);


 ALTER SEQUENCE rf_persona_cod_per_seq OWNED BY rf_persona.cod_per;--
-- Creando datos de 'rf_persona'
--
INSERT INTO rf_persona VALUES ('1','Astrid Idania','Vasquez','Gonzales','F','1995-05-12','04175525-3','1902-120595-101-2','7786-5525',NULL,'Cuscatlán','San Cristóbal','C/ Santa Anita','Estudiante','Soltera');
INSERT INTO rf_persona VALUES ('2','Darlene Melissa','Gonzales',NULL,'F','1992-01-30','04215466-5','0321-300192-101-1','7874-4154',NULL,'Cuscatlán','San Cristóbal','C/ Santa Anita','Comerciante','Soltera');
INSERT INTO rf_persona VALUES ('3','Angel Alberto','Hernández','Vásquez','M','1989-09-25','04563564-6','1443-061651-654-6','7874-9846',NULL,'Cuscatlán','San Cristóbal',NULL,NULL,'Casado');
INSERT INTO rf_persona VALUES ('4','Griselda','Vasquez','Cruz','F','1989-05-19','04513216-5','0124-190589-574-6','7878-7841',NULL,'Cuscatlán','San Cristóbal','ahi','estudiante','Casada');
INSERT INTO rf_persona VALUES ('5','Angela Esmeralda','Aragon','Herrera','F','1989-08-20','04153646-8','0321-200889-001-2','1586-4567',NULL,'Cuscatlán','San Cristóbal',NULL,'Gerente','Casada');
INSERT INTO rf_persona VALUES ('6','Gustavo Alejandro','Angel','Maravilla','M','1992-06-17','04152456-4','1541-221531-345-6','0245-3478',NULL,'Cuscatlán','San Cristóbal',NULL,'Estudiante','Casado');
INSERT INTO rf_persona VALUES ('7','Franklin Antonio','Ramos','Rodriguez','M','1988-01-31','04565468-4','0452-456765-477-8',NULL,NULL,'Cuscatlán','San Cristóbal',NULL,'Estudiante','Casado');
--
-- Creando indices PrimaryKey 'rf_persona'
--
ALTER TABLE ONLY  rf_persona  ADD CONSTRAINT  rf_persona_pkey  PRIMARY KEY  (cod_per);
--
-- Creando indices Unique 'rf_persona'
--




 CREATE SEQUENCE se_usuario_id_seq
    START WITH 4
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'se_usuario'
--
DROP TABLE IF EXISTS se_usuario CASCADE;
CREATE TABLE se_usuario (
	id integer NOT NULL DEFAULT nextval('se_usuario_id_seq'::regclass),
	nom character varying(100),
	mail character varying(100),
	usu character varying(25),
	contra character varying(40),
	niv character varying(13),
	act boolean
);


 ALTER SEQUENCE se_usuario_id_seq OWNED BY se_usuario.id;--
-- Creando datos de 'se_usuario'
--
INSERT INTO se_usuario VALUES ('3','Angelito','angelito@gmail.com','angel','2113f57a0cb4897c1fb57cae4eb2a45f55207e3a','6','t');
--
-- Creando indices PrimaryKey 'se_usuario'
--
ALTER TABLE ONLY  se_usuario  ADD CONSTRAINT  se_usuario_pkey  PRIMARY KEY  (id);
--
-- Creando indices Unique 'se_usuario'
--


--
-- Estrutura de tabla 'um_ben_proy'
--
DROP TABLE IF EXISTS um_ben_proy CASCADE;
CREATE TABLE um_ben_proy (
	cod_per integer,
	cod_pro character varying(10)
);
--
-- Creando datos de 'um_ben_proy'
--
--
-- Creando indices Unique 'um_ben_proy'
--


--
-- Estrutura de tabla 'um_exp_padres'
--
DROP TABLE IF EXISTS um_exp_padres CASCADE;
CREATE TABLE um_exp_padres (
	cod_mad integer,
	cod_pad integer,
	cod_exp integer
);
--
-- Creando datos de 'um_exp_padres'
--
--
-- Creando indices Unique 'um_exp_padres'
--




 CREATE SEQUENCE um_expediente_cod_exp_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'um_expediente'
--
DROP TABLE IF EXISTS um_expediente CASCADE;
CREATE TABLE um_expediente (
	cod_exp integer NOT NULL DEFAULT nextval('um_expediente_cod_exp_seq'::regclass),
	ano_res integer,
	niv_edu character varying(25),
	oci_ded text,
	oci_lec text,
	oci_otr text,
	tra_rem boolean,
	baj_con boolean,
	jor_tra integer,
	ing_med_men double precision,
	otr_tip_ing character varying(25),
	dep_eco_agr boolean,
	rec_ayu boolean,
	rec_ayu_ong character varying(30),
	med_cab boolean,
	acu_amb character varying(20),
	tra_con text,
	com character varying(10),
	con_agr character varying(25),
	dur_rel_sen character varying(30),
	pri_con boolean,
	suf_mal boolean,
	mal_qui character varying(30),
	suf_abu_sex boolean,
	abu_qui_sex character varying(30),
	tra_sep boolean,
	med_cau text,
	rup_ant boolean,
	dur_mal character varying(25),
	ame_rup boolean,
	mal_men boolean,
	tip_mal_men text,
	num_hij integer,
	per_hog text,
	apo_eco_fam character varying(25),
	apo_afe_fam character varying(25),
	apo_cri character varying(25),
	con_sit boolean,
	con_apo boolean,
	man_rel_agr boolean,
	apo_efe_ami character varying(25),
	apo_afe_ami character varying(25),
	ent_con_agr boolean,
	ent_apo_agr boolean,
	niv_edu_agr character varying(25),
	ant_pen_agr text,
	car_agr text,
	dec_aba_hog text,
	res_ame_rup text,
	abu_qui text,
	prob_agr text,
	cod_per integer,
	cod_agr integer
);


 ALTER SEQUENCE um_expediente_cod_exp_seq OWNED BY um_expediente.cod_exp;--
-- Creando datos de 'um_expediente'
--
--
-- Creando indices PrimaryKey 'um_expediente'
--
ALTER TABLE ONLY  um_expediente  ADD CONSTRAINT  um_expediente_pkey  PRIMARY KEY  (cod_exp);
--
-- Creando indices Unique 'um_expediente'
--




 CREATE SEQUENCE um_gas_proy_cod_com_seq
    START WITH 3
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    --
-- Estrutura de tabla 'um_gas_proy'
--
DROP TABLE IF EXISTS um_gas_proy CASCADE;
CREATE TABLE um_gas_proy (
	cod_com integer NOT NULL DEFAULT nextval('um_gas_proy_cod_com_seq'::regclass),
	fec_com date,
	num_com character varying(10),
	con_com text,
	mon_com double precision,
	cod_pro character varying(10)
);


 ALTER SEQUENCE um_gas_proy_cod_com_seq OWNED BY um_gas_proy.cod_com;--
-- Creando datos de 'um_gas_proy'
--
INSERT INTO um_gas_proy VALUES ('2','2015-05-03','12312','comercio','150','P001');
--
-- Creando indices Unique 'um_gas_proy'
--


--
-- Estrutura de tabla 'um_obs_exp'
--
DROP TABLE IF EXISTS um_obs_exp CASCADE;
CREATE TABLE um_obs_exp (
	cod_exp integer,
	fec_obs date,
	obs text
);
--
-- Creando datos de 'um_obs_exp'
--
--
-- Creando indices Unique 'um_obs_exp'
--


--
-- Estrutura de tabla 'um_per_proy'
--
DROP TABLE IF EXISTS um_per_proy CASCADE;
CREATE TABLE um_per_proy (
	car character varying(12),
	sal double precision,
	cod_pro character varying(10),
	cod_per integer
);
--
-- Creando datos de 'um_per_proy'
--
--
-- Creando indices Unique 'um_per_proy'
--


--
-- Estrutura de tabla 'um_per_proy_temp'
--
DROP TABLE IF EXISTS um_per_proy_temp CASCADE;
CREATE TABLE um_per_proy_temp (
	car character varying(12),
	sal double precision,
	cod_pro character varying(10),
	cod_per integer
);
--
-- Creando datos de 'um_per_proy_temp'
--
--
-- Creando indices Unique 'um_per_proy_temp'
--


--
-- Estrutura de tabla 'um_proyecto'
--
DROP TABLE IF EXISTS um_proyecto CASCADE;
CREATE TABLE um_proyecto (
	cod_pro character varying(10) NOT NULL,
	nom_pro character varying(100),
	des text,
	ubi text,
	fec_ini date,
	fec_fin date,
	tip_fon character varying(10),
	mon_pro double precision,
	mon_ext double precision,
	pat text,
	est character varying(15)
);
--
-- Creando datos de 'um_proyecto'
--
INSERT INTO um_proyecto VALUES ('P001','corte','asjdlak','asjajlas','2015-05-03','2015-05-13','Externos','0','25000','erfw','En espera');
--
-- Creando indices PrimaryKey 'um_proyecto'
--
ALTER TABLE ONLY  um_proyecto  ADD CONSTRAINT  um_proyecto_pkey  PRIMARY KEY  (cod_pro);
--
-- Creando indices Unique 'um_proyecto'
--




--
-- Creating relacionships for 'af_activo'
--

ALTER TABLE ONLY af_activo ADD CONSTRAINT af_activo_cod_dep_fkey FOREIGN KEY (cod_dep) REFERENCES af_depto(cod);

--
-- Creating relacionships for 'af_activo'
--

ALTER TABLE ONLY af_activo ADD CONSTRAINT af_activo_cod_tfondo_fkey FOREIGN KEY (cod_tfondo) REFERENCES af_tfondo(cod_tfondo);

--
-- Creating relacionships for 'af_mantenimiento'
--

ALTER TABLE ONLY af_mantenimiento ADD CONSTRAINT af_mantenimiento_cod_act_fkey FOREIGN KEY (cod_act) REFERENCES af_activo(cod_act);

--
-- Creating relacionships for 'af_traslados'
--

ALTER TABLE ONLY af_traslados ADD CONSTRAINT af_traslados_cod_act_fkey FOREIGN KEY (cod_act) REFERENCES af_activo(cod_act);

--
-- Creating relacionships for 'ca_cierre'
--

ALTER TABLE ONLY ca_cierre ADD CONSTRAINT ca_cierre_cod_neg_fkey FOREIGN KEY (cod_neg) REFERENCES ca_negocio(cod_neg);

--
-- Creating relacionships for 'ca_enterrado'
--

ALTER TABLE ONLY ca_enterrado ADD CONSTRAINT ca_enterrado_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'ca_enterrado'
--

ALTER TABLE ONLY ca_enterrado ADD CONSTRAINT ca_enterrado_cod_tit_fkey FOREIGN KEY (cod_tit) REFERENCES ca_perpetuidad(cod_tit);

--
-- Creating relacionships for 'ca_inmueble'
--

ALTER TABLE ONLY ca_inmueble ADD CONSTRAINT ca_inmueble_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'ca_perpetuidad'
--

ALTER TABLE ONLY ca_perpetuidad ADD CONSTRAINT ca_perpetuidad_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'ca_perpetuidad'
--

ALTER TABLE ONLY ca_perpetuidad ADD CONSTRAINT ca_perpetuidad_cod_cem_fkey FOREIGN KEY (cod_cem) REFERENCES ca_cementerio(cod_cem);

--
-- Creating relacionships for 'ca_traspaso'
--

ALTER TABLE ONLY ca_traspaso ADD CONSTRAINT ca_traspaso_cod_pnu_fkey FOREIGN KEY (cod_pnu) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'ca_traspaso'
--

ALTER TABLE ONLY ca_traspaso ADD CONSTRAINT ca_traspaso_cod_neg_fkey FOREIGN KEY (cod_neg) REFERENCES ca_negocio(cod_neg);

--
-- Creating relacionships for 'ca_traspaso'
--

ALTER TABLE ONLY ca_traspaso ADD CONSTRAINT ca_traspaso_cod_pan_fkey FOREIGN KEY (cod_pan) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'co_condonado'
--

ALTER TABLE ONLY co_condonado ADD CONSTRAINT co_condonado_codigo_fkey FOREIGN KEY (codigo) REFERENCES co_impuesto(codigo);

--
-- Creating relacionships for 'co_neginm_imp'
--

ALTER TABLE ONLY co_neginm_imp ADD CONSTRAINT co_neginm_imp_cod_imp_fkey FOREIGN KEY (cod_imp) REFERENCES co_impuesto(codigo);

--
-- Creating relacionships for 'um_ben_proy'
--

ALTER TABLE ONLY um_ben_proy ADD CONSTRAINT um_ben_proy_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES um_proyecto(cod_pro);

--
-- Creating relacionships for 'um_ben_proy'
--

ALTER TABLE ONLY um_ben_proy ADD CONSTRAINT um_ben_proy_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'um_exp_padres'
--

ALTER TABLE ONLY um_exp_padres ADD CONSTRAINT um_exp_padres_cod_exp_fkey FOREIGN KEY (cod_exp) REFERENCES um_expediente(cod_exp);

--
-- Creating relacionships for 'um_exp_padres'
--

ALTER TABLE ONLY um_exp_padres ADD CONSTRAINT um_exp_padres_cod_pad_fkey FOREIGN KEY (cod_pad) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'um_exp_padres'
--

ALTER TABLE ONLY um_exp_padres ADD CONSTRAINT um_exp_padres_cod_mad_fkey FOREIGN KEY (cod_mad) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'um_expediente'
--

ALTER TABLE ONLY um_expediente ADD CONSTRAINT um_expediente_cod_agr_fkey FOREIGN KEY (cod_agr) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'um_expediente'
--

ALTER TABLE ONLY um_expediente ADD CONSTRAINT um_expediente_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'um_gas_proy'
--

ALTER TABLE ONLY um_gas_proy ADD CONSTRAINT um_gas_proy_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES um_proyecto(cod_pro);

--
-- Creating relacionships for 'um_obs_exp'
--

ALTER TABLE ONLY um_obs_exp ADD CONSTRAINT um_obs_exp_cod_exp_fkey FOREIGN KEY (cod_exp) REFERENCES um_expediente(cod_exp);

--
-- Creating relacionships for 'um_per_proy'
--

ALTER TABLE ONLY um_per_proy ADD CONSTRAINT um_per_proy_cod_per_fkey FOREIGN KEY (cod_per) REFERENCES rf_persona(cod_per);

--
-- Creating relacionships for 'um_per_proy'
--

ALTER TABLE ONLY um_per_proy ADD CONSTRAINT um_per_proy_cod_pro_fkey FOREIGN KEY (cod_pro) REFERENCES um_proyecto(cod_pro);