create table pointages(
    id bigserial primary key,
    reference varchar(10) not null,
    description text
);
create table entreeEcriture(
    id bigserial primary key,
    idjournal bigint,
    dateEntree date not null,
    idpointage bigint,
    reference varchar(20),
    scanpiece text,
    numcompte varchar(5) not null,
    libelle text not null,
    iddeviseequivalence bigint,
    quantite real not null,
    debit real,
    credit real,
    foreign key
        (idjournal) references journals(id),
    foreign key
        (idpointage) references pointages(id),
    foreign key
        (iddeviseequivalence) references deviseequivalences(id)
);

create or replace view grandlivre as 
    select entree.id, journals.code, entree.dateEntree, entree.numcompte, comptes.description, pointages.reference as refpointage, entree.reference as refpiece, entree.scanpiece, entree.libelle, entree.debit, entree.credit
    from entreeEcriture as entree
        join comptes on entree.numcompte=comptes.numero
        join journals on entree.idjournal=journals.id
        join pointages on entree.idpointage=pointages.id;

create or replace view soldelivre as
    select numcompte, description, sum(debit::numeric) as debit_total, sum(credit::numeric) as credit_total, sum(debit::numeric)-sum(credit::numeric) as solde
    from grandlivre group by numcompte, description;

create or replace view balance as
    select numcompte, description, debit_total, credit_total, solde
    from soldelivre;

select entree.id, entree.idjournal, entree.dateentree, entree.numcompte, comptes.description, entree.reference, entree.scanpiece, entree.libelle, entree.debit, entree.credit 
    from entreeecriture as entree
        join comptes on entree.numcompte=comptes.numero;



SELECT LEFT(numcompte, 2) AS groupe, SUM(debit) as debit, SUM(credit) as credit, dateentree
    FROM entreeecriture WHERE LEFT(numcompte, 2) = '20' AND dateentree >= '2023-01-01' AND dateentree <= '2023-12-31' 
    GROUP BY LEFT(numcompte, 2), dateentree;

SELECT LEFT(numcompte, 2) AS groupe, SUM(debit) as debit, SUM(credit) as credit, max(dateentree)
    FROM entreeecriture WHERE LEFT(numcompte, 2) = '20' GROUP BY LEFT(numcompte, 2);


--========================================== MODIFICATION 3 MAI 2023 ===================================================

create table centres(
    id serial primary key,
    description text
);
create table productions(
    id serial primary key,
    description text,
    pu real
);
create table chargesProduits(
    id serial primary key,
    numero varchar(5),
    idProduit int,
    pourcentage real,
    pourc_var real,
    pourc_fix real,
    foreign key(numero)
        references c6(numero),
    foreign key(idProduit)
        references productions(id)
);
create table chargesProduitsCentres(
    id serial primary key,
    idChargesProduits int,
    estVariable varchar(1),
    idCentre int,
    pourc_centre real,
    foreign key(idChargesProduits)
        references chargesProduits(id),
    foreign key(idCentre)
        references centres(id)
);
create table coutProduits(
    id serial primary key,
    numero varchar(5),
    idProduit int,
    cout real,
    dateCout date,
    foreign key(idProduit)
        references productions(id),
    foreign key(idProduit)
        references productions(id)
);
create table coutProduitsCentres(
    id serial primary key,
    idCoutProduits int,
    estVariable varchar(1),
    idCentre int,
    cout_centre real,
    dateCout date,
    foreign key(idCoutProduits)
        references coutProduits(id),
    foreign key(idCentre)
        references centres(id)
);

-- insert into productions values(default, 'Mais', 2000);

-- insert into centres values(default, 'C1'),
--                             (default, 'C2'),
--                             (default, 'C3');

-- insert into chargesProduits values(default, 60100, 2, 100, 60, 40);

-- insert into chargesProduitsCentres values(default, 2, '1', 2, 15),
--                                             (default, 2, '1', 3, 80),
--                                             (default, 2, '1', 4, 5),
--                                             (default, 2, '0', 2, 25),
--                                             (default, 2, '0', 3, 40),
--                                             (default, 2, '0', 4, 35);

-- insert into coutProduits values(default, 60100, 2, 100000, (select current_date));

-- insert into coutProduitsCentres values(default, 1, '1', 2, 15000, (select current_date)),
--                                         (default, 1, '1', 3, 80000, (select current_date)),
--                                         (default, 1, '1', 4, 5000, (select current_date)),
--                                         (default, 1, '0', 2, 25000, (select current_date)),
--                                         (default, 1, '0', 3, 40000, (select current_date)),
--                                         (default, 1, '0', 4, 35000, (select current_date));

-- create view charges as select comptes.numero, sum(c_prod.cout)
--     from comptes
--         left join coutProduits as c_prod on comptes.numero=c_prod.numero
--         where comptes.numero like '6%'
--         group by comptes.numero;
        
create table compte7Productions(
    id serial primary key,
    prefixe varchar(3),
    idProduit int,
    foreign key(idProduit)
        references productions(id)
);

select numero from comptes where description like '%ACHAT SEMENCES%';

insert into coutProduits values(default, '60100', 1, 4321600, '2023-01-01'),
                                (default, '60100', 1, 60000000, '2023-01-01'),
                                -- (default, '60230', 1,  7796400, '2023-01-01'),
                                (default, '60200', 1,   4446700, '2023-01-01'),
                                (default, '60210', 1,   2783700, '2023-01-01'),
                                (default, '60240', 1,   14373200, '2023-01-01'),
                                (default, '60610', 1,   34637200, '2023-01-01'),
                                (default, '60620', 1,   35675400, '2023-01-01'),
                                (default, '61380', 1,   9742000, '2023-01-01'),
                                (default, '61550', 1,   4987300, '2023-01-01'),
                                (default, '61800', 1,   450900, '2023-01-01'),
                                (default, '62620', 1,   8236300, '2023-01-01'),
                                (default, '61810', 1,   789500, '2023-01-01'),
                                (default, '62210', 1,   8538100, '2023-01-01'),
                                (default, '62400', 1,   3200000, '2023-01-01'),
                                (default, '62510', 1,   1934000, '2023-01-01'),
                                (default, '62520', 1,   16222500, '2023-01-01'),
                                (default, '62740', 1,   31523800, '2023-01-01'),
                                (default, '62880', 1,   3142800, '2023-01-01'),
                                (default, '65800', 1,   31784800, '2023-01-01'),
                                (default, '63680', 1,   5029800, '2023-01-01'),
                                (default, '62100', 1,   89267100, '2023-01-01'),
                                (default, '64100', 1,   71735100, '2023-01-01'),
                                (default, '64511', 1,   36320600, '2023-01-01'),
                                (default, '64512', 1,   654600, '2023-01-01'),
                                (default, '65800', 1,   15956700, '2023-01-01'),
                                (default, '68110', 1,   28639600, '2023-01-01'),
                                (default, '65800', 1,   23007600, '2023-01-01');

-- insert into 

-- select sum(cout::numeric)+5927200+7796400 from coutProduits;

-- insert into coutProduits values(default, '62100', 1,   89267100, '2023-01-01');

-- select numero, (sum(cout)+5927200)::int from coutProduits group by numero;

-- select numero, sum(cout::float) from coutProduits where numero='65800';

-- create view charges_totales as
--     select sum(cout::float) as somme from coutProduits;

-- select  
--     from coutProduitsCentres as cpc
--         join coutProduits as cp on cpc.idCoutProduits=cp.id;