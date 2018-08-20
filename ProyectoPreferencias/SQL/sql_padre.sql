-- Table: public.pre_pais

-- DROP TABLE public.pre_pais;

CREATE TABLE public.pre_pais
(
  pai_id integer NOT NULL,
  pai_nombre character varying(100) NOT NULL,
  CONSTRAINT tcc_pais_pkey PRIMARY KEY (pai_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pre_pais
  OWNER TO postgres;

-- Table: public.pre_musica

-- DROP TABLE public.pre_musica;

CREATE TABLE public.pre_musica
(
  mus_id integer NOT NULL,
  mus_nombre character varying(100) NOT NULL,
  CONSTRAINT pre_musica_pkey PRIMARY KEY (mus_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pre_musica
  OWNER TO postgres;

-- Table: public.pre_pelicula

-- DROP TABLE public.pre_pelicula;

CREATE TABLE public.pre_pelicula
(
  pel_id integer NOT NULL,
  pel_nombre character varying(100)  NOT NULL,

  CONSTRAINT pre_pelicula_pkey PRIMARY KEY (pel_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pre_pelicula
  OWNER TO postgres;

-- Table: public.pre_usuario

-- DROP TABLE public.pre_usuario;

CREATE TABLE public.pre_usuario
(
  usr_id bigint NOT NULL,
  usr_nombre character varying(150) NOT NULL,
  cli_apellido character varying(150) NOT NULL,
  usr_correo character varying(150) NOT NULL,
  usr_fechanacimiento timestamp without time zone NOT NULL,
  usr_nac_id integer NOT NULL,

  CONSTRAINT pre_usuario_pkey PRIMARY KEY (usr_id),

  CONSTRAINT pre_usuario_usr_nac_id_fkey FOREIGN KEY (usr_nac_id)
      REFERENCES public.pre_pais (pai_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pre_usuario
  OWNER TO postgres;

-- Table: public.pre_usuariopelicula

-- DROP TABLE public.pre_usuariopelicula;

CREATE TABLE public.pre_usuariopelicula
(
  uxp_id bigint NOT NULL,
  uxp_pel_id integer NOT NULL,
  uxp_usr_id integer NOT NULL,

  CONSTRAINT pre_usuariopelicula_pkey PRIMARY KEY (uxp_id),

  CONSTRAINT pre_usuariopelicula_uxp_pel_id_fkey FOREIGN KEY (uxp_pel_id)
      REFERENCES public.pre_pelicula (pel_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT pre_usuariopelicula_uxp_usr_id_fkey FOREIGN KEY (uxp_usr_id)
      REFERENCES public.pre_usuario (usr_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pre_usuariopelicula
  OWNER TO postgres;

-- Table: public.pre_usuariomusica

-- DROP TABLE public.pre_usuariomusica;

CREATE TABLE public.pre_usuariomusica
(
  uxm_id bigint NOT NULL,
  uxm_mus_id integer NOT NULL,
  uxm_usr_id integer NOT NULL,

  CONSTRAINT pre_usuariomusica_pkey PRIMARY KEY (uxm_id),

  CONSTRAINT pre_usuariopelicula_uxm_mus_id_fkey FOREIGN KEY (uxm_mus_id)
      REFERENCES public.pre_pelicula (pel_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT pre_usuariopelicula_uxm_usr_id_fkey FOREIGN KEY (uxm_usr_id)
      REFERENCES public.pre_usuario (usr_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pre_usuariopelicula
  OWNER TO postgres;

INSERT INTO public.pre_pais (pai_id,pai_nombre) VALUES 
(0,'SIN PAÍS')
,(10,'APATRIDA')
,(30,'OMITIDA/O')
,(103,'ANGOLA')
,(104,'ARGELIA')
,(105,'BENIN')
,(107,'BOTSWANA')
,(108,'BURUNDI')
,(109,'CABO VERDE')
,(110,'CAMERÚN')
,(111,'CHAD')
,(112,'UNION DE LAS COMORAS')
,(113,'REPUBLICA DEL CONGO')
,(114,'COSTA DE MARFIL')
,(115,'EGIPTO')
,(116,'ETIOPÍA')
,(117,'GABON')
,(118,'GAMBIA')
,(119,'GHANA')
,(120,'GUINEA')
,(121,'GUINEA BISSAU')
,(122,'GUINEA ECUATORIAL')
,(123,'REPUBLICA CENTROAFRICANA')
,(133,'KENIA')
,(134,'LESOTHO')
,(135,'LIBERIA')
,(136,'LIBIA')
,(137,'MALAWI')
,(139,'MALI')
,(140,'MARRUECOS')
,(141,'MAURICIO')
,(142,'MAURITANIA')
,(143,'MOZAMBIQUE')
,(145,'NIGER')
,(146,'NIGERIA')
,(147,'RUANDA')
,(148,'SAO TOME Y PRINCIPE')
,(149,'SENEGAL')
,(150,'SEYCHELLES')
,(151,'SIERRA LEONA')
,(152,'SOMALIA')
,(153,'SUDÁFRICA')
,(154,'SUDÁN')
,(155,'TANZANIA')
,(156,'TOGO')
,(158,'TÚNEZ')
,(159,'UGANDA')
,(160,'REPUBLICA DEMOCRATICA DEL CONGO')
,(161,'ZAMBIA')
,(162,'ZIMBABWE')
,(164,'BURKINA FASO')
,(166,'DJIBOUTI')
,(167,'ERITREA')
,(169,'MADAGASCAR')
,(170,'NAMIBIA')
,(172,'SWAZILANDIA')
,(173,'SAHARA OCCIDENTAL')
,(203,'ARGENTINA')
,(205,'BARBADOS')
,(206,'BELICE')
,(207,'BOLIVIA')
,(208,'BRASIL')
,(209,'CANADÁ')
,(210,'CHILE')
,(211,'COLOMBIA')
,(212,'COSTA RICA')
,(213,'CUBA')
,(214,'DOMINICA')
,(215,'REPUBLICA DOMINICANA')
,(216,'ECUADOR')
,(217,'EL SALVADOR')
,(218,'ESTADOS UNIDOS')
,(219,'GRANADA')
,(221,'GUATEMALA')
,(222,'GUAYANA FRANCESA')
,(223,'GUYANA')
,(224,'HAITÍ')
,(225,'HONDURAS')
,(244,'ISLAS VIRGENES BRITANICAS')
,(245,'JAMAICA')
,(246,'MÉXICO')
,(247,'NEERLANDESAS ANT.')
,(248,'NICARAGUA')
,(249,'PANAMÁ')
,(250,'PARAGUAY')
,(251,'PERÚ')
,(252,'PUERTO RICO')
,(253,'SANTA LUCIA')
,(254,'SAN CRISTOBAL,NEVIS')
,(255,'SAN VICENTE')
,(256,'SURINAM')
,(257,'TRINIDAD Y TOBAGO')
,(258,'URUGUAY')
,(259,'VENEZUELA')
,(301,'AFGANISTAN')
,(302,'ARABIA SAUDITA')
,(303,'BAHREIN')
,(304,'BANGLADESH')
,(306,'BRUNEI DARUSSALAM')
,(307,'BUTAN')
,(308,'CAMBOYA')
,(309,'CHINA')
,(311,'CHIPRE')
,(312,'COREA DEL NORTE')
,(313,'COREA DEL SUR')
,(314,'EMIRATOS ÁRABES UNIDOS')
,(315,'FILIPINAS')
,(316,'HONG KONG')
,(317,'INDIA')
,(318,'INDONESIA')
,(319,'IRAK')
,(320,'IRÁN')
,(336,'ISRAEL')
,(337,'JAPÓN')
,(338,'JORDANIA')
,(339,'QATAR')
,(340,'KUWAIT')
,(341,'LAOS')
,(342,'LÍBANO')
,(343,'MACAO')
,(344,'MALASIA')
,(345,'MALDIVAS')
,(346,'MONGOLIA')
,(347,'NEPAL')
,(348,'OMAN')
,(349,'PAKISTÁN')
,(350,'SINGAPUR')
,(351,'SIRIA')
,(353,'SRI LANKA')
,(354,'TAILANDIA')
,(355,'TURQUÍA')
,(356,'RUSIA')
,(357,'VIETNAM')
,(358,'YEMEN')
,(361,'SIBERIA')
,(363,'ARMENIA')
,(364,'AZERBAIJAN')
,(365,'BELARUS')
,(367,'GEORGIA')
,(368,'KAZAJSTAN')
,(369,'KIRGUISTAN')
,(370,'LETONIA')
,(371,'MOLDAVIA')
,(373,'TURKMENISTAN')
,(374,'UCRANIA')
,(375,'UZBEKISTAN')
,(376,'TAIWAN')
,(377,'TAYIKISTAN')
,(381,'MYANMAR')
,(391,'PALESTINA')
,(401,'ALBANIA')
,(403,'ALEMANIA')
,(404,'ANDORRA')
,(405,'AUSTRIA')
,(406,'BÉLGICA')
,(408,'BULGARIA')
,(410,'DINAMARCA')
,(411,'ESCOCIA')
,(412,'ESPAÑA')
,(413,'FINLANDIA')
,(414,'FRANCIA')
,(415,'GALES')
,(416,'GIBRALTAR')
,(417,'GRECIA')
,(418,'HUNGRÍA')
,(419,'INGLATERRA')
,(420,'IRLANDA REP. DE')
,(421,'IRLANDA')
,(422,'ISLANDIA')
,(433,'ITALIA')
,(435,'LUXEMBURGO')
,(436,'MALTA')
,(437,'MÓNACO')
,(439,'NORUEGA')
,(440,'PAÍSES BAJOS')
,(441,'POLONIA')
,(442,'PORTUGAL')
,(443,'REINO UNIDO')
,(444,'RUMANIA')
,(445,'SAN MARINO')
,(446,'SUECIA')
,(447,'SUIZA')
,(448,'VATICANO')
,(449,'YUGOSLAVIA')
,(451,'BOSNIA')
,(452,'CROACIA')
,(453,'ESLOVAQUIA')
,(454,'ESLOVENIA')
,(455,'SERBIA')
,(456,'MACEDONIA')
,(457,'LITUANIA')
,(460,'REPUBLICA CHECA')
,(461,'ESTONIA')
,(462,'LIECHTENSTEIN')
,(463,'SANTA SEDE')
,(470,'MONTENEGRO')
,(501,'AUSTRALIA')
,(502,'FIDJI O FIJI')
,(534,'MARSHALL ISLANDS')
,(536,'NIUE')
,(537,'NORFOLK ISLANDS')
,(538,'NUEVA CALEDONIA')
,(540,'PALAU')
,(542,'PITCAIRN ISLANDS')
,(543,'POLINESIA FRANCESA')
,(545,'SAMOA AMERICANA')
,(560,'WALLIS Y FUTUNA')
,(562,'KIRIBATI')
,(563,'MICRONESIA')
,(564,'NAURU')
,(565,'NUEVA ZELANDA')
,(566,'PAPUA NUEVA GUINEA')
,(567,'ISLAS SALOMON')
,(568,'SAMOA OCCIDENTAL')
,(569,'TONGA')
,(570,'TUVALU')
,(571,'VANUATU')
,(617,'SVALBARD')
,(2023,'ANTIGUA Y BARBUDA')
,(9996,'GROENLANDIA')
,(9997,'HAWAI')
,(9998,'ALASKA')
,(9999,'MARTINICA')
,(20423,'BAHAMASSSS');

INSERT INTO public.pre_musica(
mus_id, 
mus_nombre
)
VALUES 
(0,'OTRO'),
(1,'ROCK'),
(2,'JAZZ'),
(3,'METAL'),
(4,'REGGAE'),
(5,'SALSA');

INSERT INTO public.pre_pelicula(
            pel_id, pel_nombre)
VALUES 
(0,'SUSPENSO'),
(1,'TERROR'),
(2,'CIENCIA FICCION'),
(3,'ROMANCE'),
(4,'DRAMA'),
(5,'COMEDIA');

