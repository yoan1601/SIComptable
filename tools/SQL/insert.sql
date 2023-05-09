insert into centres (description) values ('ADM DIST');
insert into centres (description) values ('USINE');
insert into centres (description) values ('PLANTATION');
insert into centres (description) values ('RH');
insert into productions (description, pu) values ('Mais', 2000);
insert into productions (description, pu) values ('Riz', 2000);

INSERT INTO "public".entreeEcriture (idjournal, dateEntree, idpointage, reference, 
scanPiece, numCompte, libelle, iddeviseequivalence, quantite, debit, credit) VALUES 
 (2, '2023-03-21', 2, null, null, '60100', 'Achats', 3, 2.5, 100, 0),
 (2, '2023-03-21', 6, '16087€', null, '40310', 'Tovo', 3, 1, 0, 120),
 (2, '2023-03-21', 3, '1254565476', null, '44560', 'TVA', 3, 1, 20, 0);

INSERT INTO "public".pointages( reference, description ) VALUES ( 'AC', 'Avoir client');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'AF', 'Avoir fournisseur');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'BE', 'Bordereau escompte');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'CH', 'Chèque');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'FC', 'Facture client');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'FF', 'Facture fournisseur');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'LC', 'Lettre de change');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'PC', 'Pièce de caisse');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'RL', 'Relevé');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'SA', 'Salaire');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'VI', 'Virement');
INSERT INTO "public".pointages( reference, description ) VALUES ( 'N/A', 'Sans');

INSERT INTO "public".deviseequivalences
	( reference, devise, taux, dateheuremaj) VALUES ( 2, 1, 5, current_timestamp );
INSERT INTO "public".deviseequivalences
	( reference, devise, taux, dateheuremaj) VALUES ( 3, 1, 4.5, current_timestamp );
INSERT INTO "public".deviseequivalences
	( reference, devise, taux, dateheuremaj) VALUES ( 4, 1, 4.8, current_timestamp );
INSERT INTO "public".deviseequivalences
	( reference, devise, taux, dateheuremaj) VALUES ( 1, 1, 1, current_timestamp );

INSERT INTO "public".comptabilites
	( debutexercice, tenuecompte, dateheuremaj, capital) VALUES ( date'2023-01-01', 1, current_timestamp, 10000000 );

INSERT INTO "public".identites
	( nom, adresse, mdp, tel, telecopie, dateheuremaj, objet) VALUES ( 'MadaSociete', 'Andraharo', '1234', '0348680369', '22456', current_timestamp, 'techno');

Nom: DIMPEX
Adresse: ENCEINTE ITU ANDOHARANOFOTSY BP 1960 Antananarivo 101
Mot de passe: individuel
Tél: 22 770 99                                       
Télécopie: 22 230 66

INSERT INTO "public".devises
(description, symbole) VALUES 
( 'Ariary', 'Ar' ),
( 'Dollars', 'SSD' ),
( 'Sterling', '£' ),
( 'Euro', 'EUR' );


