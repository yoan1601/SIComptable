CREATE SEQUENCE "public".c1_0_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".c1_1_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".c1_2_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".c1_3_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".c1_4_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".c1_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".comptabilites_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".deviseequivalences_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".devises_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".document_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".entreeecriture_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".extiers_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".identites_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".journals_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".pointage_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".seq_entree START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".tiers_id_seq START WITH 1 INCREMENT BY 1;

CREATE  TABLE "public".c1 ( 
	id                   bigint DEFAULT nextval('c1_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1 PRIMARY KEY ( id )
 );

CREATE UNIQUE INDEX idx_c1_numero ON "public".c1 ( numero );

CREATE  TABLE "public".c2 ( 
	id                   bigint DEFAULT nextval('c1_2_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1_2 PRIMARY KEY ( id ),
	CONSTRAINT unq_c2_numero UNIQUE ( numero ) 
 );

CREATE  TABLE "public".c3 ( 
	id                   bigint DEFAULT nextval('c1_3_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1_3 PRIMARY KEY ( id ),
	CONSTRAINT unq_c3_numero UNIQUE ( numero ) 
 );

CREATE  TABLE "public".c4 ( 
	id                   bigint DEFAULT nextval('c1_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1_5 PRIMARY KEY ( id )
 );

CREATE UNIQUE INDEX idx_c1_numero_0 ON "public".c4 ( numero );

CREATE  TABLE "public".c5 ( 
	id                   bigint DEFAULT nextval('c1_1_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1_1 PRIMARY KEY ( id ),
	CONSTRAINT unq_c5_numero UNIQUE ( numero ) 
 );

CREATE  TABLE "public".c6 ( 
	id                   bigint DEFAULT nextval('c1_0_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1_0 PRIMARY KEY ( id ),
	CONSTRAINT unq_c6_numero UNIQUE ( numero ) 
 );

CREATE  TABLE "public".c7 ( 
	id                   bigint DEFAULT nextval('c1_4_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_c1_4 PRIMARY KEY ( id ),
	CONSTRAINT unq_c7_numero UNIQUE ( numero ) 
 );

CREATE  TABLE "public".devises ( 
	id                   bigint DEFAULT nextval('devises_id_seq'::regclass) NOT NULL  ,
	description          text  NOT NULL  ,
	symbole              text    ,
	CONSTRAINT pk_devises PRIMARY KEY ( id )
 );

CREATE  TABLE "public".document ( 
	id                   bigint DEFAULT nextval('document_id_seq'::regclass) NOT NULL  ,
	nif                  text  NOT NULL  ,
	scannif              text    ,
	stat                 text  NOT NULL  ,
	scanstat             text    ,
	nrcs                 text  NOT NULL  ,
	scannrcs             text    ,
	dateheuremaj         timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL  ,
	CONSTRAINT pk_document PRIMARY KEY ( id )
 );

CREATE  TABLE "public".identites ( 
	id                   bigint DEFAULT nextval('identites_id_seq'::regclass) NOT NULL  ,
	nom                  text  NOT NULL  ,
	adresse              text  NOT NULL  ,
	mdp                  text  NOT NULL  ,
	tel                  text  NOT NULL  ,
	telecopie            text  NOT NULL  ,
	dateheuremaj         timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL  ,
	objet                text    ,
	logo                 text    ,
	CONSTRAINT pk_identite PRIMARY KEY ( id )
 );

CREATE  TABLE "public".journals ( 
	id                   bigint DEFAULT nextval('journals_id_seq'::regclass) NOT NULL  ,
	code                 text  NOT NULL  ,
	intitule             text  NOT NULL  ,
	CONSTRAINT pk_journals PRIMARY KEY ( id )
 );

CREATE  TABLE "public".pointages ( 
	id                   bigint DEFAULT nextval('pointage_id_seq'::regclass) NOT NULL  ,
	reference            varchar(10)  NOT NULL  ,
	description          text    ,
	CONSTRAINT pk_pointage PRIMARY KEY ( id )
 );

CREATE  TABLE "public".tiers ( 
	id                   bigint DEFAULT nextval('tiers_id_seq'::regclass) NOT NULL  ,
	idc4                 varchar(13)  NOT NULL  ,
	libelle              text  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_tiers PRIMARY KEY ( id )
 );

CREATE INDEX unq_tiers_numerogen ON "public".tiers  ( idc4 );

CREATE  TABLE "public".comptabilites ( 
	id                   bigint DEFAULT nextval('comptabilites_id_seq'::regclass) NOT NULL  ,
	debutexercice        date DEFAULT CURRENT_DATE NOT NULL  ,
	tenuecompte          bigint  NOT NULL  ,
	dateheuremaj         timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL  ,
	capital              real  NOT NULL  ,
	CONSTRAINT pk_comptabilite PRIMARY KEY ( id )
 );

CREATE  TABLE "public".deviseequivalences ( 
	id                   bigint DEFAULT nextval('deviseequivalences_id_seq'::regclass) NOT NULL  ,
	reference            bigint  NOT NULL  ,
	devise               bigint  NOT NULL  ,
	taux                 real  NOT NULL  ,
	dateheuremaj         timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL  ,
	CONSTRAINT pk_deviseequivalences PRIMARY KEY ( id )
 );

CREATE  TABLE "public".entreeecriture ( 
	id                   bigint DEFAULT nextval('entreeecriture_id_seq'::regclass) NOT NULL  ,
	idjournal            bigint  NOT NULL  ,
	dateentree           date DEFAULT CURRENT_DATE NOT NULL  ,
	idpointage           bigint    ,
	reference            varchar(20)    ,
	scanpiece            text    ,
	numcompte            varchar(5)  NOT NULL  ,
	libelle              text  NOT NULL  ,
	iddeviseequivalence  bigint    ,
	quantite             real    ,
	debit                real    ,
	credit               real    ,
	groupe               bigint    ,
	CONSTRAINT pk_entreeecriture PRIMARY KEY ( id )
 );

CREATE  TABLE "public".extiers ( 
	id                   bigint DEFAULT nextval('extiers_id_seq'::regclass) NOT NULL  ,
	idtier               bigint  NOT NULL  ,
	CONSTRAINT pk_extiers PRIMARY KEY ( id )
 );

ALTER TABLE "public".comptabilites ADD CONSTRAINT fk_comptabilites_devises FOREIGN KEY ( tenuecompte ) REFERENCES "public".devises( id );

ALTER TABLE "public".deviseequivalences ADD CONSTRAINT fk_deviseequivalences_devises FOREIGN KEY ( reference ) REFERENCES "public".devises( id );

ALTER TABLE "public".deviseequivalences ADD CONSTRAINT fk_deviseequivalences_devises_0 FOREIGN KEY ( devise ) REFERENCES "public".devises( id );

ALTER TABLE "public".entreeecriture ADD CONSTRAINT fk_entreeecriture_deviseequivalences FOREIGN KEY ( iddeviseequivalence ) REFERENCES "public".deviseequivalences( id );

ALTER TABLE "public".entreeecriture ADD CONSTRAINT fk_entreeecriture_journals FOREIGN KEY ( idjournal ) REFERENCES "public".journals( id );

ALTER TABLE "public".entreeecriture ADD CONSTRAINT fk_entreeecriture_pointages FOREIGN KEY ( idpointage ) REFERENCES "public".pointages( id );

ALTER TABLE "public".extiers ADD CONSTRAINT fk_extiers_tiers FOREIGN KEY ( idtier ) REFERENCES "public".tiers( id );

CREATE VIEW "public".balance AS  SELECT soldelivre.numcompte,
    soldelivre.description,
    soldelivre.debit_total,
    soldelivre.credit_total,
    soldelivre.solde
   FROM soldelivre;

CREATE VIEW "public".compte_groupe2 AS  SELECT "left"((entreeecriture.numcompte)::text, 2) AS groupe,
    sum(entreeecriture.debit) AS debit,
    sum(entreeecriture.credit) AS credit
   FROM entreeecriture
  GROUP BY ("left"((entreeecriture.numcompte)::text, 2))
  ORDER BY ("left"((entreeecriture.numcompte)::text, 2));

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
 SELECT c4.id,
    c4.numero,
    c4.description
   FROM c4
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

CREATE VIEW "public".grandlivre AS  SELECT entree.id,
    journals.code,
    entree.dateentree,
    entree.numcompte,
    comptes.description,
    pointages.reference AS refpointage,
    entree.reference AS refpiece,
    entree.scanpiece,
    entree.libelle,
    entree.debit,
    entree.credit
   FROM (((entreeecriture entree
     JOIN comptes ON (((entree.numcompte)::text = (comptes.numero)::text)))
     JOIN journals ON ((entree.idjournal = journals.id)))
     JOIN pointages ON ((entree.idpointage = pointages.id)));

CREATE VIEW "public".soldelivre AS  SELECT grandlivre.numcompte,
    grandlivre.description,
    sum(grandlivre.debit) AS debit_total,
    sum(grandlivre.credit) AS credit_total,
    (sum(grandlivre.debit) - sum(grandlivre.credit)) AS solde
   FROM grandlivre
  GROUP BY grandlivre.numcompte, grandlivre.description;

COMMENT ON TABLE "public".c1 IS 'id, numero, description';

COMMENT ON TABLE "public".c2 IS 'id, numero, description';

COMMENT ON TABLE "public".c3 IS 'id, numero, description';

COMMENT ON TABLE "public".c4 IS 'id, numero, description';

COMMENT ON TABLE "public".c5 IS 'id, numero, description';

COMMENT ON TABLE "public".c6 IS 'id, numero, description';

COMMENT ON TABLE "public".c7 IS 'id, numero, description';

COMMENT ON TABLE "public".devises IS 'id, description, symbole';

COMMENT ON TABLE "public".document IS 'id, NIF, scanNIF, STAT, scanSTAT,NRCS, scanNRCS, dateheuremaj';

COMMENT ON TABLE "public".identites IS 'id, nom, adresse, mdp, tel, telecopie, dateHeuremaj, objet, logo';

COMMENT ON TABLE "public".journals IS 'id, code, intitule';

COMMENT ON TABLE "public".pointages IS 'id, reference, description';

COMMENT ON TABLE "public".tiers IS 'id, numerogen, libele, description';

COMMENT ON TABLE "public".comptabilites IS 'id, debutExercice, tenuecompte,dateheuremaj, capital';

COMMENT ON TABLE "public".deviseequivalences IS 'id, reference, devise, taux \nexemple :  1, dollars, ariary, 5 -> 1dollars= 5*ariary';

COMMENT ON TABLE "public".extiers IS 'id, idtier';

INSERT INTO "public".c1( id, numero, description ) VALUES ( 50, '10100', 'CAPITAL');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 51, '10610', 'RESERVE LEGALE');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 52, '11000', 'REPORT A NOUVEAU');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 53, '11010', 'REPORT A NOUVEAU SOLDE CREDITEUR');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 54, '11200', 'AUTRES PRODUITS ET CHARGES');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 55, '11900', 'REPORT A NOUVEAU SOLDE DEBITEUR');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 56, '12800', 'RESULTAT EN INSTANCE');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 57, '13300', 'IMPOTS DIFFERES ACTIFS');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 58, '16110', 'EMPRUNT A LT');
INSERT INTO "public".c1( id, numero, description ) VALUES ( 59, '16510', 'ENMPRUNT A MOYEN TERME');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 42, '20124', 'FRAIS DE REHABILITATION');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 43, '20800', 'AUTRES IMMOB INCORPORELLES');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 44, '21100', 'TERRAINS');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 45, '21200', 'CONSTRUCTION');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 46, '21300', 'MATERIEL ET OUTILLAGE');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 47, '21510', 'MATERIEL AUTOMOBILE');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 48, '21520', 'MATERIEL MOTO');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 49, '21600', 'AGENCEMENT. AM .INST');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 50, '21810', 'MATERIELS ET MOBILIERS DE BUREAU');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 51, '21819', 'MATERIELS INFORMATIQUES ET AUTRES');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 52, '21820', 'MAT. MOB DE LOGEMENT');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 53, '21880', 'AUTRES IMMOBILISATIONS CORP');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 54, '23000', 'IMMOBILISATION EN COURS');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 55, '28000', 'AMORT IMMOB INCORP');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 56, '28120', 'AMORTISSEMENT DES CONSTRUCTIONS');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 57, '28130', 'AMORT MACH-MATER-OUTIL');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 58, '28150', 'AMORT MAT DE TRANSPORT');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 59, '28160', 'AMORT A.A.I');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 60, '28181', 'AMORT MATERIEL&MOB');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 61, '28182', 'AMORTISSEMENTS MATERIELS INFORMATIQ');
INSERT INTO "public".c2( id, numero, description ) VALUES ( 62, '28183', 'AMORT MATER & MOB LOGT');
INSERT INTO "public".c3( id, numero, description ) VALUES ( 9, '32110', 'STOCK MATIERES PREMIERES');
INSERT INTO "public".c3( id, numero, description ) VALUES ( 10, '35500', 'STOCK PRODUITS FINIS');
INSERT INTO "public".c3( id, numero, description ) VALUES ( 11, '37000', 'STOCK MARCHANDISES');
INSERT INTO "public".c3( id, numero, description ) VALUES ( 12, '39700', 'PROVISIONS/DEPRECIATIONS STOCKS');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 60, '40110', 'FOURNISSEURS DEXPLOITATIONS LOCAUX');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 61, '40120', 'FOURNISSEURS DEXPLOITATIONS ETRANGERS');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 62, '40310', 'FOURNISSEURS D''IMMOBILISATION');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 63, '40810', 'FRNS: FACTURE A RECEVOIR');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 64, '40910', 'FRNS:AVANCES&ACOMPTES VERSER');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 65, '40980', 'FRNS: RABAIS A OBTENIR');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 66, '41110', 'CLIENTS LOCAUX');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 67, '41120', 'CLIENTS ETRANGERS');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 68, '41400', 'CLIENTS DOUTEUX');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 69, '41800', 'CLIENTS FACTURE A RETABLIR');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 70, '42100', 'PERSONNEL: SALAIRES A PAYER');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 71, '42510', 'PERSONNEL: AVANCES QUINZAINES');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 72, '42520', 'PERSONNEL: AVANCES SPECIALES');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 73, '42860', 'PERS:CHARGES  A PAYER');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 74, '43100', 'CNAPS ');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 75, '43120', 'OSTIE');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 76, '44200', 'ETAT IBS');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 77, '44210', 'ACOMPTE IBS');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 78, '44321', 'TVA … IMPUTER:DEC ULTERIEURE');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 79, '44500', 'ETAT:IRSA VERSER');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 80, '44560', 'ETAT: TVA DEDUCTIBLE');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 81, '44570', 'ETAT: TVA COLLECTEE');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 82, '44571', 'TVA A VERSER');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 83, '45100', 'COMPTE  COURANT ASSOC');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 84, '46700', 'DEB/CRED DIVERS');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 85, '46800', 'CHARGES A PAYER DEB/CRED DIVERS');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 86, '48610', 'CHARGE CONSTATES D''AVANCE');
INSERT INTO "public".c4( id, numero, description ) VALUES ( 87, '49100', 'PERTE/CLIENTS');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 18, '51200', 'BOA ANKORONDRANO');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 19, '51201', 'BOA DOLLARS');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 20, '51202', 'BNI MADAGASCAR');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 21, '51203', 'BNI DOLLARS');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 22, '53100', 'CAISSE ');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 23, '58110', 'VIREMENTINTERNE:BANQ/CAISSE');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 24, '58130', 'VIREMENT INTERNE:BANQ/BANQ');
INSERT INTO "public".c5( id, numero, description ) VALUES ( 25, '58140', 'VIREMENT INTERNE CAISSE/CAISSE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 107, '60100', 'ACHAT MATIERES PREMIERESS');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 108, '60200', 'FOURNIT DE MAGASIN');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 109, '60210', 'FOURNIT BUR ');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 110, '60220', 'FOURNIT DE LOGT');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 111, '60230', 'EMBALLAGES(PLAST-CARTON....');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 112, '60240', 'PIEC RECH VOITURES ADMINISTRATIVES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 113, '60241', 'PIEC RECH CAMIONS');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 114, '60242', 'PIEC RECH MOTO');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 115, '60250', 'AUTRES ACHATS');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 116, '60300', 'VARIATION  STOCK MAT PREM');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 117, '60610', 'EAU ET ELECTRICITE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 118, '60620', 'GAZ,COMBUST,CARBURANT,LUBRIF');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 119, '61300', 'LOC IMMOBILIERES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 120, '61380', 'AUTRES LOCATIONS');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 121, '61550', 'ENTRET & REP VEHICULE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 122, '61560', 'MAINTENANCE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 123, '61610', 'ASSURANCE GLOBALE DOMMAGES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 124, '61611', 'ASSURANCE FLOTTE AUTOMOBILE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 125, '61800', 'PHOTOCOPIE ET ASSIMILES ');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 126, '61810', 'ENVOI COLIS(LETTRE&DOC...');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 127, '62100', 'PERSONNEL EXTER');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 128, '62210', 'HONORAIRE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 129, '62220', 'REMUNERATION DES TRANSITAIRES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 130, '62230', 'CATALOGUES ET IMPRIMES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 131, '62240', 'PUBLICATION');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 132, '62250', 'SPONSORING-MECENAT...');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 133, '62260', 'TS DOUANE ET ASSIMILES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 134, '62400', 'FRAIS DE TRANSPORT');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 135, '62510', 'VOYAGES   ET DEPLACEMENT');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 136, '62520', 'MISSION(DEPL+HEBERGT+RESTø)');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 137, '62530', 'RECEPTION');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 138, '62610', 'SERVICES POSTAUX');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 139, '62620', 'TEL&FAX');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 140, '62630', 'INTERNET TANA');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 141, '62740', 'COMMISSIONS BANCAIRE INTERNATIONALE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 142, '62760', 'COMMISSIONS BNI');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 143, '62770', 'COMMISSIONS BOA');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 144, '62880', 'AUTRES  CHARGES EXTERNES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 145, '63680', 'AUTRES IMPOTS/TAXES/DROITS DIV');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 146, '64100', 'REMUNERATION PERSONNEL');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 147, '64120', 'DROIT DE CONGES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 148, '64511', 'CNAPS:COTISATION  PATRONALE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 149, '64512', 'OSTIE : COTISATION PATRONALE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 150, '64750', 'MED ET ASSIM PERS');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 151, '65800', 'AUTRES CHARGES DIVERSES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 152, '65810', 'ECART/PAIEMENT');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 153, '65811', 'PERTE/TVA NON RECUPERABLE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 154, '66200', 'INTERETS  BANCAIRES BNI');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 155, '66300', 'INTERETS  BANCAIRES BOA');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 156, '66600', 'DIFFF  DE  CHANGE  PERTE');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 157, '66680', 'AGIOS/TRAITES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 158, '68110', 'D.A.P  IMMO INCORPORELLES');
INSERT INTO "public".c6( id, numero, description ) VALUES ( 159, '68120', 'D.A.P  IMMO  CORPORELLE');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 19, '70110', 'VENTE LOCALE');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 20, '70120', 'VENTES  A  L EXPORTATION');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 21, '70800', 'AUTRES PROD  DES ACT ANNEX&ACS');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 22, '71300', 'VARIATION DE STOCK  P.F');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 23, '75800', 'AUTRES PRODUITS D EXPLOITATION');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 24, '75810', 'ECART/ENCAISSEMENT');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 25, '76200', 'INTERET CREDITEUR BANQUES BNI');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 26, '76300', 'INTERET CREDITEUR BANQUES BOA');
INSERT INTO "public".c7( id, numero, description ) VALUES ( 27, '76600', 'DIFFERENCE DE  CHANGE:PROFIT');
INSERT INTO "public".devises( id, description, symbole ) VALUES ( 1, 'Ariary', 'Ar');
INSERT INTO "public".devises( id, description, symbole ) VALUES ( 3, 'Sterling', '£');
INSERT INTO "public".devises( id, description, symbole ) VALUES ( 4, 'Euro', 'EUR');
INSERT INTO "public".devises( id, description, symbole ) VALUES ( 2, 'Dollars', '$');
INSERT INTO "public".document( id, nif, scannif, stat, scanstat, nrcs, scannrcs, dateheuremaj ) VALUES ( 6, 'NIF0014', 'nif.png', 'STAT13435', 'nrcs1.png', 'NRCS001452', 'nrcs2.png', '2023-03-15 12:20:29 PM');
INSERT INTO "public".document( id, nif, scannif, stat, scanstat, nrcs, scannrcs, dateheuremaj ) VALUES ( 7, 'NIF0014', 'td_1_AR.pdf', 'STAT13435', 'servlets.pdf', 'NRCS001452', 'cours_L1_ITUTB.pdf', '2023-03-15 12:22:48 PM');
INSERT INTO "public".identites( id, nom, adresse, mdp, tel, telecopie, dateheuremaj, objet, logo ) VALUES ( 1, 'MadaSociete', 'Andraharo', '1234', '0348680369', '22456', '2023-03-11 02:05:31 PM', 'techno', null);
INSERT INTO "public".identites( id, nom, adresse, mdp, tel, telecopie, dateheuremaj, objet, logo ) VALUES ( 2, 'DIMPEX', 'ENCEINTE ITU ANDOHARANOFOTSY BP 1960 Antananarivo 101', 'individuel', '2277099', '2223066', '2023-03-14 02:22:22 PM', 'Production articles industriels et vente de marchandises pour clients locaux et étrangers', 'smoke1.jpg');
INSERT INTO "public".identites( id, nom, adresse, mdp, tel, telecopie, dateheuremaj, objet, logo ) VALUES ( 3, 'DIMPEX', 'ENCEINTE ITU ANDOHARANOFOTSY BP 1960 Antananarivo 101', 'individuel', '2277099', '2223066', '2023-04-04 07:41:22 PM', 'Production articles industriels et vente de marchandises pour clients locaux et étrangers', 'dimpex.png');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 2, 'AC', 'Achats');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 3, 'AN', 'A Nouveau');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 4, 'BN', 'Banque BNI');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 5, 'BO', 'Banque BOA');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 6, 'CA', 'Caisse');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 7, 'OD', 'Opérations Diverses');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 8, 'VL', 'Ventes locales');
INSERT INTO "public".journals( id, code, intitule ) VALUES ( 9, 'VE', 'Vente à l''exportation');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 1, 'AC', 'Avoir client');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 2, 'AF', 'Avoir fournisseur');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 3, 'BE', 'Bordereau escompte');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 4, 'CH', 'Chèque');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 5, 'FC', 'Facture client');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 6, 'FF', 'Facture fournisseur');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 7, 'LC', 'Lettre de change');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 8, 'PC', 'Pièce de caisse');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 9, 'RL', 'Relevé');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 10, 'SA', 'Salaire');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 11, 'VI', 'Virement');
INSERT INTO "public".pointages( id, reference, description ) VALUES ( 12, 'N/A', 'Sans');
INSERT INTO "public".tiers( id, idc4, libelle, description ) VALUES ( 2, '40110', 'PC up', 'Boutique informatique');
INSERT INTO "public".tiers( id, idc4, libelle, description ) VALUES ( 3, '41400', 'Panera', 'masera');
INSERT INTO "public".comptabilites( id, debutexercice, tenuecompte, dateheuremaj, capital ) VALUES ( 1, '2023-01-01', 1, '2023-03-15 01:01:54 AM', 1.0E7);
INSERT INTO "public".comptabilites( id, debutexercice, tenuecompte, dateheuremaj, capital ) VALUES ( 2, '2023-01-01', 1, '2023-03-15 01:44:40 AM', 1500000.0);
INSERT INTO "public".comptabilites( id, debutexercice, tenuecompte, dateheuremaj, capital ) VALUES ( 3, '2023-01-01', 1, '2023-03-15 11:38:06 AM', 1600000.0);
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 1, 2, 1, 5.0, '2023-03-15 02:01:26 AM');
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 2, 3, 1, 4.5, '2023-03-15 02:01:26 AM');
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 3, 4, 1, 4.8, '2023-03-15 02:01:27 AM');
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 4, 3, 1, 4.81, '2023-03-15 03:04:07 AM');
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 5, 2, 1, 5.1, '2023-03-15 03:05:21 AM');
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 6, 2, 1, 5.1, '2023-03-15 03:06:00 AM');
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 7, 3, 1, 6.5, '2023-03-15 11:42:31 AM');
INSERT INTO "public".deviseequivalences( id, reference, devise, taux, dateheuremaj ) VALUES ( 8, 1, 1, 1.0, '2023-03-21 05:43:44 PM');
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 13, 3, '2023-03-01', 12, '2023', '', '10100', 'A NOUVEAU 2022', 8, 1.0, 0.0, 1400000.0, 6);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 14, 3, '2023-03-01', 12, '2023', '', '10610', 'A NOUVEAU 2022', 8, 1.0, 0.0, 27920.0, 7);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 15, 3, '2023-03-01', 12, '2023', '', '11000', 'A NOUVEAU 2022', 8, 1.0, 0.0, 177080.0, 8);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 16, 3, '2023-03-01', 12, '2023', '', '12800', 'A NOUVEAU 2022', 8, 1.0, 0.0, 322480.0, 9);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 17, 3, '2023-03-01', 12, '2023', '', '16110', 'A NOUVEAU 2022', 8, 1.0, 0.0, 1819280.0, 10);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 18, 3, '2023-03-01', 12, '2023', '', '16510', 'A NOUVEAU 2022', 8, 1.0, 0.0, 180720.0, 11);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 19, 3, '2023-03-01', 12, '2023', '', '20124', 'A NOUVEAU 2022', 8, 1.0, 71600.0, 0.0, 12);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 20, 3, '2023-03-01', 12, '2023', '', '20800', 'A NOUVEAU 2022', 8, 1.0, 86500.0, 0.0, 13);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 21, 3, '2023-03-01', 12, '2023', '', '21100', 'A NOUVEAU 2022', 8, 1.0, 450000.0, 0.0, 14);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 22, 3, '2023-03-01', 12, '2023', '', '21200', 'A NOUVEAU 2022', 8, 1.0, 846200.0, 0.0, 15);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 23, 3, '2023-03-01', 12, '2023', '', '21300', 'A NOUVEAU 2022', 8, 1.0, 1265500.0, 0.0, 16);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 24, 3, '2023-03-01', 12, '2023', '', '21510', 'A NOUVEAU 2022', 8, 1.0, 1346400.0, 0.0, 17);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 25, 3, '2023-03-01', 12, '2023', '', '21810', 'A NOUVEAU 2022', 8, 1.0, 783800.0, 0.0, 18);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 26, 3, '2023-03-01', 12, '2023', '', '21880', 'A NOUVEAU 2022', 8, 1.0, 121800.0, 0.0, 19);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 27, 3, '2023-03-01', 12, '2023', '', '23000', 'A NOUVEAU 2022', 8, 1.0, 120000.0, 0.0, 20);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 28, 3, '2023-03-01', 12, '2023', '', '28000', 'A NOUVEAU 2022', 8, 1.0, 0.0, 94500.0, 21);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 29, 3, '2023-03-01', 12, '2023', '', '28120', 'A NOUVEAU 2022', 8, 1.0, 0.0, 186600.0, 22);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 30, 3, '2023-03-01', 12, '2023', '', '28130', 'A NOUVEAU 2022', 8, 1.0, 0.0, 597250.0, 23);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 31, 3, '2023-03-01', 12, '2023', '', '28150', 'A NOUVEAU 2022', 8, 1.0, 0.0, 681480.0, 24);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 32, 3, '2023-03-01', 12, '2023', '', '28181', 'A NOUVEAU 2022', 8, 1.0, 0.0, 459660.0, 25);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 33, 3, '2023-03-01', 12, '2023', '', '32110', 'A NOUVEAU 2022', 8, 1.0, 276130.0, 0.0, 26);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 34, 3, '2023-03-01', 12, '2023', '', '35500', 'A NOUVEAU 2022', 8, 1.0, 1075600.0, 0.0, 27);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 35, 3, '2023-03-01', 12, '2023', '', '37000', 'A NOUVEAU 2022', 8, 1.0, 1173180.0, 0.0, 28);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 36, 3, '2023-03-01', 12, '2023', '', '39700', 'A NOUVEAU 2022', 8, 1.0, 0.0, 346580.0, 29);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 37, 3, '2023-03-01', 12, '2023', '', '40110', 'A NOUVEAU 2022', 8, 1.0, 0.0, 865400.0, 30);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 38, 3, '2023-03-01', 12, '2023', '', '40110', 'A NOUVEAU 2022', 8, 1.0, 0.0, 1236300.0, 31);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 39, 3, '2023-03-01', 12, '2023', '', '40110', 'A NOUVEAU 2022', 8, 1.0, 0.0, 748000.0, 32);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 40, 3, '2023-03-01', 12, '2023', '', '40110', 'A NOUVEAU 2022', 8, 1.0, 0.0, 750850.0, 33);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 41, 3, '2023-03-01', 12, '2023', '', '40810', 'A NOUVEAU 2022', 8, 1.0, 0.0, 288650.0, 34);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 42, 3, '2023-03-01', 12, '2023', '', '40980', 'A NOUVEAU 2022', 8, 1.0, 26450.0, 0.0, 35);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 43, 3, '2023-03-01', 12, '2023', '', '41110', 'A NOUVEAU 2022', 8, 1.0, 418000.0, 0.0, 36);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 44, 3, '2023-03-01', 12, '2023', '', '41110', 'A NOUVEAU 2022', 8, 1.0, 1012500.0, 0.0, 37);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 45, 3, '2023-03-01', 12, '2023', '', '41110', 'A NOUVEAU 2022', 8, 1.0, 852900.0, 0.0, 38);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 46, 3, '2023-03-01', 12, '2023', '', '41120', 'A NOUVEAU 2022', 8, 1.0, 720000.0, 0.0, 39);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 47, 3, '2023-03-01', 12, '2023', '', '41400', 'A NOUVEAU 2022', 8, 1.0, 160000.0, 0.0, 40);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 48, 3, '2023-03-01', 12, '2023', '', '41800', 'A NOUVEAU 2022', 8, 1.0, 57500.0, 0.0, 41);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 49, 3, '2023-03-01', 12, '2023', '', '42100', 'A NOUVEAU 2022', 8, 1.0, 0.0, 455560.0, 42);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 50, 3, '2023-03-01', 12, '2023', '', '43100', 'A NOUVEAU 2022', 8, 1.0, 0.0, 42380.0, 43);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 51, 3, '2023-03-01', 12, '2023', '', '43120', 'A NOUVEAU 2022', 8, 1.0, 0.0, 28260.0, 44);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 52, 3, '2023-03-01', 12, '2023', '', '44200', 'A NOUVEAU 2022', 8, 1.0, 0.0, 270000.0, 45);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 53, 3, '2023-03-01', 12, '2023', '', '44560', 'A NOUVEAU 2022', 8, 1.0, 0.0, 203370.0, 46);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 54, 3, '2023-03-01', 12, '2023', '', '44571', 'A NOUVEAU 2022', 8, 1.0, 26700.0, 0.0, 47);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 55, 3, '2023-03-01', 12, '2023', '', '46700', 'A NOUVEAU 2022', 8, 1.0, 172500.0, 0.0, 48);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 56, 3, '2023-03-01', 12, '2023', '', '49100', 'A NOUVEAU 2022', 8, 1.0, 0.0, 80000.0, 49);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 57, 3, '2023-03-01', 12, '2023', '', '51200', 'A NOUVEAU 2022', 8, 1.0, 300300.0, 0.0, 50);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 58, 3, '2023-03-01', 12, '2023', '', '51202', 'A NOUVEAU 2022', 8, 1.0, 0.0, 119560.0, 51);
INSERT INTO "public".entreeecriture( id, idjournal, dateentree, idpointage, reference, scanpiece, numcompte, libelle, iddeviseequivalence, quantite, debit, credit, groupe ) VALUES ( 59, 3, '2023-03-01', 12, '2023', '', '53100', 'A NOUVEAU 2022', 8, 1.0, 18320.0, 0.0, 52);