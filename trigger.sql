CREATE LANGUAGE plpgsql;

drop TRIGGER trig_new_client on client;
drop TRIGGER trig_achat on transaction ;

-- --------------------------------------------------------
-- Trigger pour l'inscription d'un client
--
CREATE or REPLACE FUNCTION trig_new_client() RETURNS trigger AS $trig_new_client$
    BEGIN
		INSERT INTO carte VALUES(nextval('seq_carte'), NULL, NULL, NULL, NEW.login);
    return NULL;
    END;
$trig_new_client$ LANGUAGE plpgsql;

CREATE TRIGGER trig_new_client AFTER INSERT ON client
FOR EACH ROW EXECUTE PROCEDURE trig_new_client();

-- --------------------------------------------------------
-- Trigger pour l'achat
--
CREATE or REPLACE FUNCTION trig_achat() RETURNS trigger AS $trig_achat$
DECLARE
  nouv NUMERIC;
BEGIN
    SELECT montantcourant - new.montanttotal
      into nouv from carte 	WHERE num=new.numcarte;
		UPDATE carte SET montantcourant = nouv
		  WHERE num=new.numcarte;
    return NULL;
    END;
$trig_achat$ LANGUAGE plpgsql;

CREATE TRIGGER trig_achat AFTER INSERT ON transaction
FOR EACH ROW EXECUTE PROCEDURE trig_achat();