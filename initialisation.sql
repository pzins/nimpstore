DELETE  from dureeacces;
delete from transaction;
delete from installation;
DELETE from ressource;
DELETE  from application;
DELETE from contenu;
DELETE FROM avis;
DELETE FROM comptesanalystes;
DELETE from comptesadministrateurs;
DELETE from editeur;
DELETE FROM terminal;
DELETE FROM carte;
DELETE from modele;
DELETE FROM constructeur_dev;
DELETE from client;
DELETE FROM contenudisponiblesur;
DELETE from os;
DELETE FROM constructeur_os;


drop SEQUENCE seq_modele;
drop SEQUENCE seq_transaction;
drop SEQUENCE seq_contenu;
drop SEQUENCE seq_os;

CREATE SEQUENCE seq_contenu;
CREATE SEQUENCE seq_modele;
CREATE SEQUENCE seq_os;
CREATE SEQUENCE seq_transaction;

ALTER SEQUENCE seq_contenu MINVALUE 0;
ALTER SEQUENCE seq_transaction MINVALUE 0;
ALTER SEQUENCE seq_os MINVALUE 0;
ALTER SEQUENCE seq_modele MINVALUE 0;

SELECT setval('seq_modele', 0);
SELECT setval('seq_transaction', 0);
SELECT setval('seq_contenu', 0);
SELECT setval('seq_os', 0);


INSERT INTO Client VALUES ('aaa', 'aaaaaa', 'albert.martin@gmail.com', 'Martin', 'Albert');
INSERT INTO Client VALUES ('bbb', 'bbbbbb', 'alexandre.lacaz@gmail.com', 'Lacaz', 'Alexandre');
INSERT INTO Client VALUES ('ccc','cccccc', 'luc.zen@gmail.com', 'Zen', 'Luc');
INSERT INTO Client VALUES ('ddd', 'dddddd', 'marc.rede@gmail.com', 'Rede', 'Marc');


/*
INSERT INTO  carte VALUES (0, NULL, NULL, NULL, 'aaa');
INSERT INTO  carte VALUES (1, NULL, NULL, NULL, 'bbb');
INSERT INTO  carte VALUES (2, NULL, NULL, NULL, 'ccc');
INSERT INTO  carte VALUES (3, NULL, NULL, NULL, 'ddd');

*/

INSERT INTO comptesadministrateurs VALUES ('admin','123456');
INSERT INTO comptesanalystes VALUES ('stat','789789');


INSERT INTO Constructeur_OS VALUES ('microsoft');
INSERT INTO Constructeur_OS VALUES ('apple');
INSERT INTO Constructeur_OS VALUES ('ubuntu');
INSERT INTO Constructeur_OS VALUES ('google');

INSERT INTO os VALUES (nextval('seq_os'), '8', 'microsoft');
INSERT INTO os VALUES (nextval('seq_os'), '7', 'microsoft');
INSERT INTO os VALUES (nextval('seq_os'), '10', 'apple');
INSERT INTO os VALUES (nextval('seq_os'), '14', 'ubuntu');
INSERT INTO os VALUES (nextval('seq_os'), '5', 'google');


INSERT INTO Constructeur_dev VALUES ('asus');
INSERT INTO Constructeur_dev VALUES ('hp');
INSERT INTO Constructeur_dev VALUES ('dell');
INSERT INTO Constructeur_dev VALUES ('apple');


INSERT INTO Modele VALUES (nextval('seq_modele'), 'K55V', 'asus' ,1);
INSERT INTO Modele VALUES (nextval('seq_modele'), 'K88X', 'asus' ,2);
INSERT INTO Modele VALUES (nextval('seq_modele'), 'L53E', 'dell' ,2);
INSERT INTO Modele VALUES (nextval('seq_modele'), 'PRO', 'apple' ,3);
INSERT INTO Modele VALUES (nextval('seq_modele'), 'XPS', 'dell' ,1);
INSERT INTO Modele VALUES (nextval('seq_modele'), 'Inspiron3', 'hp' ,1);
INSERT INTO Modele VALUES (nextval('seq_modele'), 'Pavillon', 'hp' ,5);
INSERT INTO Modele VALUES (nextval('seq_modele'), 'r04v', 'asus' ,4);



INSERT INTO Terminal VALUES (1000, 'aaa', 1);
INSERT INTO Terminal VALUES (1001, 'aaa', 7);
INSERT INTO Terminal VALUES (1002, 'bbb', 2);
INSERT INTO Terminal VALUES (1003, 'bbb', 3);
INSERT INTO Terminal VALUES (1004, 'ccc', 4);
INSERT INTO Terminal VALUES (1005, 'ddd', 5);
INSERT INTO Terminal VALUES (1006, 'ddd', 6);




INSERT INTO Editeur VALUES ('EA', 'M. George', 'www.ea.com');
INSERT INTO Editeur VALUES ('Ubisoft', 'M. Paul', 'www.ubisoft.com');
INSERT INTO Editeur VALUES ('Gameloft', 'Mme Baye', 'www.gameloft.com');
INSERT INTO Editeur VALUES ('Konami', 'M. Chris', 'www.konami.com');






INSERT INTO Contenu VALUES (nextval('seq_contenu'),'Ball game', 'jeux avec de balles', 0, 'Gameloft');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'FIFA', 'jeux de foot', 25, 'EA');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'PES', 'jeux de foot', 20, 'Konami');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'Speed Car', 'jeux de course', 0, 'Gameloft');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'Hit shot', 'jeux de tir', 5, 'EA');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'assassin', 'jeux de combat', 0, 'Ubisoft');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'FIFA pack equipe', 'pack nouvelles equipes', 2, 'EA');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'FIFA pack maillot', 'pack nouveaux maillots', 3, 'EA');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'assassin cartes', 'nouvelles cartes', 5, 'Ubisoft');
INSERT INTO Contenu VALUES (nextval('seq_contenu'), 'assassin armes', 'nouvelles armes', 7, 'EA');



INSERT INTO Application VALUES (1, 0);
INSERT INTO Application VALUES (2, 0);
INSERT INTO Application VALUES (3, 0);
INSERT INTO Application VALUES (4, 10);
INSERT INTO Application VALUES (5, 0);
INSERT INTO Application VALUES (6, 5);


INSERT INTO Ressource VALUES (6, 1);
INSERT INTO Ressource VALUES (7, 1);
INSERT INTO Ressource VALUES (8, 5);
INSERT INTO Ressource VALUES (9, 5);

//1-5 os
//1-9 : contenu



INSERT INTO contenudisponiblesur VALUES (1,1);
INSERT INTO contenudisponiblesur VALUES (1,2);
INSERT INTO contenudisponiblesur VALUES (1,3);
INSERT INTO contenudisponiblesur VALUES (2,4);
INSERT INTO contenudisponiblesur VALUES (2,5);
INSERT INTO contenudisponiblesur VALUES (2,1);
INSERT INTO contenudisponiblesur VALUES (2,2);
INSERT INTO contenudisponiblesur VALUES (2,3);
INSERT INTO contenudisponiblesur VALUES (3,1);
INSERT INTO contenudisponiblesur VALUES (3,2);
INSERT INTO contenudisponiblesur VALUES (4,1);
INSERT INTO contenudisponiblesur VALUES (5,1);
INSERT INTO contenudisponiblesur VALUES (6,2);
INSERT INTO contenudisponiblesur VALUES (6,3);
INSERT INTO contenudisponiblesur VALUES (6,4);
INSERT INTO contenudisponiblesur VALUES (6,5);
INSERT INTO contenudisponiblesur VALUES (7,1);
INSERT INTO contenudisponiblesur VALUES (7,2);
INSERT INTO contenudisponiblesur VALUES (7,4);
INSERT INTO contenudisponiblesur VALUES (7,5);
INSERT INTO contenudisponiblesur VALUES (8,1);
INSERT INTO contenudisponiblesur VALUES (8,2);
INSERT INTO contenudisponiblesur VALUES (8,3);
INSERT INTO contenudisponiblesur VALUES (9,4);
INSERT INTO contenudisponiblesur VALUES (9,1);
INSERT INTO contenudisponiblesur VALUES (9,2);
INSERT INTO contenudisponiblesur VALUES (10,1);
INSERT INTO contenudisponiblesur VALUES (10,2);
INSERT INTO contenudisponiblesur VALUES (10,3);
INSERT INTO contenudisponiblesur VALUES (10,4);
INSERT INTO contenudisponiblesur VALUES (10,5);

insert into TRANSACTION VALUES (nextval('seq_transaction'), CURRENT_DATE , 0, 'aaa', 'aaa',0);
insert into TRANSACTION VALUES (nextval('seq_transaction'), CURRENT_DATE , 25, 'bbb', 'bbb',0);
insert into TRANSACTION VALUES (nextval('seq_transaction'), CURRENT_DATE , 20, 'ccc', 'ddd',0);


INSERT INTO dureeacces VALUES (1, 1, -1, false);
INSERT INTO dureeacces VALUES (2, 2, -1, false);
INSERT INTO dureeacces VALUES (3, 3, -1, false);



INSERT INTO Installation VALUES (1, 1000, CURRENT_DATE );
INSERT INTO Installation VALUES (2, 1002, CURRENT_DATE );
INSERT INTO Installation VALUES (2, 1003, CURRENT_DATE );
INSERT INTO Installation VALUES (3, 1005, CURRENT_DATE );
INSERT INTO Installation VALUES (3, 1006, CURRENT_DATE );





INSERT INTO Avis VALUES ('aaa', 1, 3, 'correct');
INSERT INTO Avis VALUES ('bbb', 2, 5, 'genial');

/*


INSERT INTO Carte VALUES ('aex0bgf3',50, 35.6, '2017-01-01', 'CB');
INSERT INTO Carte VALUES ('58sggqoe',50, 44.7, '2017-01-01', 'CB');
INSERT INTO Carte VALUES ('dhodf5wf',15, 11, '2016-01-01', 'CP');


*/
