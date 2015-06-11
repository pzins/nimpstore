
INSERT INTO Client VALUES ('aaa', 'aaaaaa', 'albert.martin@gmail.com', 'Martin', 'Albert');
INSERT INTO Client VALUES ('bbb', 'bbbbbb', 'alexandre.lacaz@gmail.com', 'Lacaz', 'Alexandre');
INSERT INTO Client VALUES ('ccc','cccccc', 'luc.zen@gmail.com', 'Zen', 'Luc');
INSERT INTO Client VALUES ('ddd', 'dddddd', 'marc.rede@gmail.com', 'Rede', 'Marc');

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
/*


INSERT INTO Contenu VALUES (0, 'Ball game', 'jeux avec de balles', 0, 'Gameloft');
INSERT INTO Contenu VALUES (1, 'FIFA', 'jeux de foot', 3.0, 'EA');
INSERT INTO Contenu VALUES (2, 'PES', 'jeux de foot', 2.8, 'Konami');
INSERT INTO Contenu VALUES (3, 'Speed Car', 'jeux de course', 0, 'Gameloft');
INSERT INTO Contenu VALUES (4, 'Hit shot', 'jeux de tir', 5, 'EA');
INSERT INTO Contenu VALUES (5, 'assassin', 'jeux de combat', 4.6, 'Ubisoft');
INSERT INTO Contenu VALUES (6, 'FIFA pack equipe', 'pack nouvelles equipes', 0.7, 'EA');
INSERT INTO Contenu VALUES (7, 'FIFA pack maillot', 'pack nouveaux maillots', 0.3, 'EA');
INSERT INTO Contenu VALUES (8, 'assassin cartes', 'nouvelles cartes', 1.1, 'Ubisoft');
INSERT INTO Contenu VALUES (9, 'assassin armes', 'nouvelles armes', 0.9, 'EA');



INSERT INTO Application VALUES (0, 4);
INSERT INTO Application VALUES (1, 0);
INSERT INTO Application VALUES (2, 0);
INSERT INTO Application VALUES (3, 8);
INSERT INTO Application VALUES (4, 0);
INSERT INTO Application VALUES (5, 0);


INSERT INTO Ressource VALUES (6, 1);
INSERT INTO Ressource VALUES (7, 1);
INSERT INTO Ressource VALUES (8, 5);
INSERT INTO Ressource VALUES (9, 5);


INSERT INTO ContenuDispoOS VALUES (0, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (0, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (1, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (1, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (1, 'Ubuntu', 14);
INSERT INTO ContenuDispoOS VALUES (2, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (2, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (3, 'Apple', 10);
INSERT INTO ContenuDispoOS VALUES (3, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (3, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (4, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (4, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (4, 'Ubuntu', 14);
INSERT INTO ContenuDispoOS VALUES (5, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (5, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (5, 'Apple', 10);
INSERT INTO ContenuDispoOS VALUES (6, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (6, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (7, 'Microsoft', 7);
INSERT INTO ContenuDispoOS VALUES (7, 'Microsoft', 8);
INSERT INTO ContenuDispoOS VALUES (8, 'Apple', 10);
INSERT INTO ContenuDispoOS VALUES (9, 'Apple', 10);




INSERT INTO Installation VALUES ('00001', 0, '2015-05-10');
INSERT INTO Installation VALUES ('00002', 5, '2015-04-10');
INSERT INTO Installation VALUES ('00003', 1, '2015-03-10');
INSERT INTO Installation VALUES ('00003', 6, '2015-05-08');
INSERT INTO Installation VALUES ('00004', 5, '2015-04-04');
INSERT INTO Installation VALUES ('00005', 2, '2015-04-04');
INSERT INTO Installation VALUES ('00006', 4, '2015-02-10');


INSERT INTO Avis VALUES (1, 0, 2, 'correct');
INSERT INTO Avis VALUES (3, 2, 1, 'très bien');
INSERT INTO Avis VALUES (4, 4, 4, 'mauvaise');
INSERT INTO Avis VALUES (2, 1, 5, 'géniale');




INSERT INTO Carte VALUES ('aex0bgf3',50, 35.6, '2017-01-01', 'CB');
INSERT INTO Carte VALUES ('58sggqoe',50, 44.7, '2017-01-01', 'CB');
INSERT INTO Carte VALUES ('dhodf5wf',15, 11, '2016-01-01', 'CP');

INSERT INTO Transaction VALUES (0, '2015-05-10', 4, 1, 1, 'aex0bgf3');
INSERT INTO Transaction VALUES (1, '2015-05-10', 4.6, 1, 1, 'aex0bgf3');
INSERT INTO Transaction VALUES (2, '2015-05-10', 3, 1, 2, 'aex0bgf3');
INSERT INTO Transaction VALUES (3, '2015-05-10', 0.7, 2, 2, '58sggqoe');
INSERT INTO Transaction VALUES (7, '2015-05-10', 4.6, 2, 1, '58sggqoe');
INSERT INTO Transaction VALUES (5, '2015-05-10', 2.8, 1, 3, 'aex0bgf3');
INSERT INTO Transaction VALUES (6, '2015-05-10', 5, 4, 4, 'dhodf5wf');

INSERT INTO DureeAcces VALUES (0, 6, FALSE, 0);


*/