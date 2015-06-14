create trigger tInstallation
before INSERT ON

--Ajoute automatiquement une commande dans la base
CREATE FUNCTION trig_commande() RETURNS trigger AS $trig_commande$
    DECLARE
		idPanier INTEGER;
    BEGIN
		SELECT currval('seq_tpanier') INTO idPanier
		FROM tPanier;

		INSERT INTO tcommande VALUES(idPanier, NOW(), 'en preparation', NULL, NULL, NULL);

        RETURN NEW;
    END;
$trig_commande$ LANGUAGE plpgsql;

CREATE TRIGGER trig_commande AFTER INSERT ON tPanier
    FOR EACH ROW EXECUTE PROCEDURE trig_commande();