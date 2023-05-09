update entreeEcriture set numcompte = '53100' where id = 168;

SELECT * from chargesProduitsCentres where idChargesProduits = 1;

SELECT LEFT(numcompte, 2) AS groupe, SUM(debit) as debit, SUM(credit) as credit,SUM(debit) - SUM(credit) as solde
FROM entreeecriture
WHERE LEFT(numcompte, 2) = '28' or LEFT(numcompte, 2) = '39'
GROUP BY LEFT(numcompte, 2);


CREATE VIEW compte_groupe3 AS
SELECT LEFT(numcompte, 3) AS groupe, SUM(debit) as debit, SUM(credit) as credit
FROM entreeecriture
GROUP BY LEFT(numcompte, 3)
ORDER BY groupe;

update entreeecriture set numcompte = '60100' where id = 7;
update entreeecriture set numcompte = '44560' where id = 9;


SELECT * from comptes WHERE numero = '60100';

SELECT * from deviseequivalences WHERE reference = 2 and devise = (SELECT tenuecompte FROM comptabilites WHERE dateheuremaj = (SELECT MAX(dateheuremaj) FROM comptabilites)) and dateheuremaj = (SELECT MAX(dateheuremaj) FROM deviseequivalences WHERE reference = 2);

SELECT * from deviseequivalences WHERE dateheuremaj = (SELECT MAX(dateheuremaj) from comptabilites) group by reference, id;

SELECT * from comptabilites WHERE dateheuremaj = (SELECT MAX(dateheuremaj) from comptabilites)

CREATE OR REPLACE VIEW comptes as (
SELECT *
FROM c1
UNION
SELECT *
FROM c2
UNION
SELECT *
FROM c3
UNION
SELECT *
FROM c4
UNION
SELECT *
FROM c5
UNION
SELECT *
FROM c6
UNION
SELECT *
FROM c7
ORDER BY numero
);