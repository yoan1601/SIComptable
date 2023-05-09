CREATE  TABLE "public".c4 ( 
	id                   bigint DEFAULT nextval('c1_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1_5 PRIMARY KEY ( id )
 );

CREATE UNIQUE INDEX idx_c1_numero_0 ON "public".c4 ( numero );

CREATE  TABLE "public".tiers ( 
	id                   bigint DEFAULT nextval('tiers_id_seq'::regclass) NOT NULL  ,
	idc4                 varchar(13)  NOT NULL  ,
	libelle               text  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_tiers PRIMARY KEY ( id )
 );

CREATE INDEX unq_tiers_idc4 ON "public".tiers  ( idc4 );

CREATE VIEW "public".comptes AS  SELECT c1.id,
    c1.numero,
    c1.description
   FROM c1
UNION
 SELECT c2.id,
    c2.numero,
    c2.description
   FROM c2
UNION
 SELECT c3.id,
    c3.numero,
    c3.description
   FROM c3
UNION
 SELECT c5.id,
    c5.numero,
    c5.description
   FROM c5
UNION
 SELECT c6.id,
    c6.numero,
    c6.description
   FROM c6
UNION
 SELECT c7.id,
    c7.numero,
    c7.description
   FROM c7
  ORDER BY 2;

COMMENT ON TABLE "public".c4 IS 'id, numero, description';

COMMENT ON TABLE "public".tiers IS 'id, idc4, libelle, description';

INSERT INTO "public".pointage( id, reference, description ) VALUES ( 1, 'AC', 'Avoir client');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 2, 'AF', 'Avoir fournisseur');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 3, 'BE', 'Bordereau escompte');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 4, 'CH', 'Chèque');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 5, 'FC', 'Facture client');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 6, 'FF', 'Facture fournisseur');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 7, 'LC', 'Lettre de change');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 8, 'PC', 'Pièce de caisse');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 9, 'RL', 'Relevé');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 10, 'SA', 'Salaire');
INSERT INTO "public".pointage( id, reference, description ) VALUES ( 11, 'VI', 'Virement');
