
drop SEQUENCE seq_modele;
drop SEQUENCE seq_transaction;
drop SEQUENCE seq_contenu;
drop SEQUENCE seq_os;
drop SEQUENCE seq_carte;

CREATE SEQUENCE seq_contenu;
CREATE SEQUENCE seq_modele;
CREATE SEQUENCE seq_os;
CREATE SEQUENCE seq_transaction;
CREATE SEQUENCE seq_carte;


ALTER SEQUENCE seq_contenu MINVALUE 0;
ALTER SEQUENCE seq_transaction MINVALUE 0;
ALTER SEQUENCE seq_os MINVALUE 0;
ALTER SEQUENCE seq_modele MINVALUE 0;
ALTER SEQUENCE seq_carte MINVALUE 0;

SELECT setval('seq_modele', 0);
SELECT setval('seq_transaction', 0);
SELECT setval('seq_contenu', 0);
SELECT setval('seq_os', 0);
SELECT setval('seq_carte', 0);