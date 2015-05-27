
-- --------------------------------------------------------

--
-- Structure de la table carte
--

CREATE TABLE Carte (
  num INT PRIMARY KEY,
  montantDepart money DEFAULT NULL,
  montantCourant money DEFAULT NULL,
  dateValidite date DEFAULT NULL
) ;



--- pour carte bancaire pourquoi juste num?
--- montant courant et depart aussi ?

CREATE VIEW vCarteBancaire AS SELECT num FROM carte WHERE dateValidite = NULL;

CREATE VIEW vCartePrepayee AS SELECT * FROM carte WHERE dateValidite != NULL;

-- --------------------------------------------------------

--
-- Structure de la table client
--

CREATE TABLE Client (
  id SERIAL PRIMARY KEY,
  email VARCHAR(50) NOT NULL UNIQUE,
  nom VARCHAR(30) NOT NULL,
  prenom VARCHAR(30) NOT NULL,
  CHECK (email LIKE '%@%')
);
-- --------------------------------------------------------
CREATE TABLE comptesUtilisateurs (
  id SERIAL PRIMARY KEY REFERENCES Client(id),
  login VARCHAR(20) UNIQUE,
  mdp VARCHAR(20) CHECK (LENGTH(mdp) > 5)
);

CREATE TABLE comptesAdministrateurs (
  login VARCHAR (20) UNIQUE ,
  mdp VARCHAR (20) CHECK (LENGTH (mdp) > 5)
);


CREATE TABLE comptesAnalystes (
  login VARCHAR (20) UNIQUE ,
  mdp VARCHAR (20) CHECK (LENGTH (mdp) > 5)
);


-- --------------------------------------------------------

--
-- Structure de la table constructeur_dev
--

CREATE TABLE Constructeur_dev (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(50) NOT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table constructeur_os
--

CREATE TABLE Constructeur_os (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(50) NOT NULL
);

-- --------------------------------------------------------
--
-- Structure de la table editeur
--

CREATE TABLE Editeur (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  contact VARCHAR(50) NOT NULL,
  url VARCHAR(100) NOT NULL,
  CHECK (url LIKE 'www.%.%')
);

-- --------------------------------------------------------
--
-- Structure de la table contenu

CREATE TABLE Contenu (
  id SERIAL PRIMARY KEY,
  titre VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  coutFixe MONEY NOT NULL,
  idEditeur INT REFERENCES Editeur(id) NOT NULL
);



CREATE VIEW vRessource AS
  SELECT * FROM Contenu C, Application A
  WHERE C.id=A.idApp;

CREATE VIEW vApplication AS
  SELECT * FROM Contenu C, Ressource R
  WHERE C.id=R.idApp;


CREATE TABLE Application (
  idApp SERIAL PRIMARY KEY REFERENCES Contenu(id),
  coutPeriodique MONEY NOT NULL
);

CREATE TABLE Ressource (
  idRessource SERIAL PRIMARY KEY REFERENCES Contenu(id),
  idApp INTEGER REFERENCES Application(idApp)
);
---contrainte : PROJ(Application, id) IN UNION(PROJ(Application, idApp), PROJ(Ressource, idRessource))

-- --------------------------------------------------------

--
-- Structure de la table transaction
--

CREATE TABLE Transaction (
  num SERIAL PRIMARY KEY,
  dateAchat DATE NOT NULL,
  montantTotal MONEY NOT NULL,
  acheteur INT NOT NULL REFERENCES Client(id),
  destinateur INT NOT NULL REFERENCES Client(id),
  numCarte INT NOT NULL REFERENCES Carte(num)
);

--- type money dejà >=0 je pense
--- --------------------------------------------------------
--
-- Structure de la table contenuconcerne
--

CREATE TABLE DureeAcces (
  idcontenu INT NOT NULL REFERENCES Contenu(id),
  numTransaction INT NOT NULL REFERENCES transaction(num),
  dureePeriode INT DEFAULT NULL,
  renouvelement boolean DEFAULT NULL,
  CONSTRAINT unique_dureeacces UNIQUE(idcontenu,numTransaction)
) ;


-- --------------------------------------------------------

--
-- Structure de la table systemeexploitation
--

CREATE TABLE SystemeExploitation (
  id SERIAL PRIMARY KEY ,
  version VARCHAR(50) NOT NULL,
  idConstructeur INT NOT NULL REFERENCES Constructeur_os(id)
) ;
-- --------------------------------------------------------

--
-- Structure de la table contenudisponiblesur
--

CREATE TABLE ContenuDisponibleSur (
  idContenu INT NOT NULL REFERENCES Contenu(id),
  idSystemeExploitation INT NOT NULL REFERENCES SystemeExploitation(id),
  PRIMARY KEY (idContenu,idSystemeExploitation)
) ;

-- --------------------------------------------------------


--
-- Structure de la table modele
--

CREATE TABLE Modele (
  id SERIAL PRIMARY KEY,
  designation VARCHAR(50) NOT NULL UNIQUE ,
  idconstructeur INT NOT NULL REFERENCES Constructeur_dev(id),
  idSystemeExploitation INT NOT NULL REFERENCES SystemeExploitation(id)
);



-- --------------------------------------------------------

--
-- Structure de la table terminal
--

CREATE TABLE Terminal (
  numSerie INT PRIMARY KEY,
  numClient INT NOT NULL REFERENCES Client(id),
  idModele INT NOT NULL REFERENCES Modele(id)
);

--- num de serie plutot varchar que int je pense

-- --------------------------------------------------------
--
-- Structure de la table contenuinstallesur
--

CREATE TABLE Installation (
  idContenu INT NOT NULL REFERENCES Contenu(id),
  numSerieTerminal INT NOT NULL REFERENCES Terminal(numSerie),
  derniereInstallation DATE NOT NULL,
  PRIMARY KEY (idcontenu,numSerieTerminal)
);

-- --------------------------------------------------------


CREATE TABLE Avis (
  idClient INT REFERENCES Client(id),
  idApplication INTEGER REFERENCES Application(idApp),
  note INTEGER,
  commentaire TEXT,
  PRIMARY KEY (idClient, idApplication),
  CHECK (LENGTH(commentaire) <= 500),
  CHECK (note <= 5)
);
