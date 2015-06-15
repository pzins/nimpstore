CREATE LANGUAGE plpgsql;


CREATE or REPLACE FUNCTION trig_new_client() RETURNS trigger AS $trig_new_client$
    BEGIN
		INSERT INTO carte VALUES(nextval('seq_carte'), NULL, NULL, NULL, NEW.login);
    return NULL;
    END;
$trig_new_client$ LANGUAGE plpgsql;


drop TRIGGER trig_new_client on client;

CREATE TRIGGER trig_new_client AFTER INSERT ON client
FOR EACH ROW EXECUTE PROCEDURE trig_new_client();