START TRANSACTION;

-- ============================================================
--   Suppression et création de la base de données 
-- ============================================================
DROP DATABASE IF EXISTS catalogue_top_secret;
CREATE DATABASE catalogue_top_secret;
USE  catalogue_top_secret;

-- ============================================================
--   Création des tables                                
-- ============================================================

CREATE TABLE pays (
    code_pays VARCHAR(255),
    libelle_pays VARCHAR(255),
    CONSTRAINT PK_code_pays PRIMARY KEY (code_pays)
);

CREATE TABLE type_planques (
    libelle_planque VARCHAR(60),
    CONSTRAINT PK_libelle_planque PRIMARY KEY (libelle_planque)
);

CREATE TABLE specialites (
    libelle_specialite VARCHAR(255),
    CONSTRAINT PK_libelle_specialite PRIMARY KEY (libelle_specialite)
);

CREATE TABLE type_missions (
    libelle_mission VARCHAR(255),
    CONSTRAINT PK_libelle_mission PRIMARY KEY (libelle_mission)
);

CREATE TABLE statut_missions (
    libelle_statut VARCHAR(255),
    CONSTRAINT PK_libelle_statut PRIMARY KEY (libelle_statut)
);

CREATE TABLE planques (
    code_planque VARCHAR(255),
    adresse_planque VARCHAR(255),
     code_pays VARCHAR(255),
     libelle_planque VARCHAR(60),
    CONSTRAINT PK_code_planque PRIMARY KEY (code_planque),
    CONSTRAINT FK_code_pays FOREIGN KEY (code_pays) REFERENCES pays (code_pays) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_planques_type_planques FOREIGN KEY (libelle_planque) REFERENCES type_planques (libelle_planque) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE missions (
    code_mission VARCHAR(255),
    titre_mission VARCHAR (60),
    descriptions VARCHAR(255),
    date_debut_mission DATE,
    date_fin_mission DATE,
    code_pays VARCHAR(255),
    libelle_mission VARCHAR(255),
    libelle_statut VARCHAR(255),
    CONSTRAINT PK_code_mission PRIMARY KEY (code_mission),
    CONSTRAINT FK_missions_pays FOREIGN KEY (code_pays) REFERENCES pays (code_pays) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_missions_type_missioins FOREIGN KEY (libelle_mission) REFERENCES type_missions (libelle_mission) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_missions_statut_missions FOREIGN KEY (libelle_statut) REFERENCES statut_missions (libelle_statut) ON DELETE CASCADE ON UPDATE CASCADE
    
);


CREATE TABLE attribuer_missions (
     code_planque VARCHAR(255),
     code_mission VARCHAR(255),
     CONSTRAINT FK_attribuer_missions_missions FOREIGN KEY (code_planque) REFERENCES planques (code_planque) ON DELETE CASCADE ON UPDATE CASCADE,
     CONSTRAINT FK_code_mission FOREIGN KEY (code_mission) REFERENCES missions (code_mission) ON DELETE CASCADE ON UPDATE CASCADE
    );

CREATE TABLE agents (
    code_agent VARCHAR(255),
    nom_agent VARCHAR (60),
    prenom_agent VARCHAR (60),
    date_naissance_agent DATE,
    code_pays VARCHAR(255),
    CONSTRAINT PK_code_agent PRIMARY KEY (code_agent),
    CONSTRAINT FK_agents_pays FOREIGN KEY (code_pays) REFERENCES pays (code_pays) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE possede_specialites (
    code_agent VARCHAR(255),
    libelle_specialite VARCHAR(255),
    CONSTRAINT FK_possede_specialites_agents FOREIGN KEY (code_agent) REFERENCES agents (code_agent) ON DELETE CASCADE,
    CONSTRAINT FK_possede_specialites_spesialetes FOREIGN KEY (libelle_specialite) REFERENCES specialites (libelle_specialite) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE cibles (
    code_cible VARCHAR(255),
    nom_cible VARCHAR(60),
    prenom_cible VARCHAR(60),
    date_naissance_cible DATE,
    code_pays VARCHAR(255),
    code_mission VARCHAR(255),
    CONSTRAINT PK_code_cible PRIMARY KEY (code_cible),
    CONSTRAINT FK_cibles_pays FOREIGN KEY (code_pays) REFERENCES pays (code_pays) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_cibles_missions FOREIGN KEY (code_mission) REFERENCES missions (code_mission) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE vise_cibles (
     code_mission VARCHAR(255),
     code_cible VARCHAR(255),
     CONSTRAINT FK_vise_cibles_missions FOREIGN KEY (code_mission) REFERENCES missions (code_mission) ON DELETE CASCADE ON UPDATE CASCADE,
     CONSTRAINT FK_vise_cibles_cibles FOREIGN KEY (code_cible) REFERENCES cibles (code_cible) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE agents_effectuer_missions (
    code_mission VARCHAR(255),
    code_agent VARCHAR(255),
    CONSTRAINT FK_agents_effectuer_missions_missions FOREIGN KEY (code_mission) REFERENCES missions (code_mission) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_agents_effectuer_missions_agents FOREIGN KEY (code_agent) REFERENCES agents (code_agent) ON DELETE CASCADE ON UPDATE CASCADE
    );

    CREATE TABLE contacts (
    code_contact VARCHAR(255),
    nom_contact VARCHAR (60),
    prenom_contact VARCHAR (60),
    date_naissance_contact DATE,
    code_pays VARCHAR(255),
    CONSTRAINT PK_code_contact PRIMARY KEY (code_contact),
    CONSTRAINT FK_contacts_pays FOREIGN KEY (code_pays) REFERENCES pays (code_pays) ON DELETE CASCADE ON UPDATE CASCADE
);


    CREATE TABLE contacts_lier_missions (
    code_mission VARCHAR(255),  
    code_contact VARCHAR(255),
    CONSTRAINT FK_contacts_lier_missions_missions FOREIGN KEY (code_mission) REFERENCES missions (code_mission) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_contacts_lier_missions_contacts FOREIGN KEY (code_contact) REFERENCES contacts (code_contact) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE admins (
    code_admin VARCHAR(255),
    nom_admin VARCHAR(60),
    prenom_admin VARCHAR(60),
    adresse_email_admin VARCHAR(60),
    pwd_admin VARCHAR(255),
    date_creat_admin DATE,
    CONSTRAINT PK_code_admin PRIMARY KEY (code_admin)
    );

-- ============================================================
--   Insertion des enregistrements
-- ============================================================

    INSERT INTO  pays VALUES ('FR', 'Français');
    INSERT INTO pays VALUES ('BY', 'Biélorusse');

    INSERT INTO type_planques VALUES ('appartement');
    INSERT INTO type_planques VALUES ('hotel');

    INSERT INTO specialites VALUES ('espion');
    INSERT INTO specialites VALUES ('nettoyeur');

    INSERT INTO type_missions VALUES ('espionnage');
    INSERT INTO type_missions VALUES ('nettoyage');

    INSERT INTO statut_missions VALUES ('en preparation');
    INSERT INTO statut_missions VALUES ('en cours');
    INSERT INTO statut_missions VALUES ('finie');

    INSERT INTO planques VALUES ('P01', 'rue du larcin, 38000, Grenoble', 'FR', 'hotel');
    INSERT INTO planques VALUES ('P02', 'ulitsa lenin 10, 220015 Minsk', 'BY','appartement');

    INSERT INTO missions VALUES ('APACHE', 'mission CRS','Attraper tous les deserteurs', '2020-08-08', '2020-08-10', 'FR', 'espionnage', 'finie');

    INSERT INTO missions VALUES ('DONALD', 'mission espionnage américain','infiltrer le FBI pour  connaître les opérations militaires américaines', '2020-09-08','2021-02-23','BY','nettoyage','en cours');

    INSERT INTO attribuer_missions VALUES ('P01', 'APACHE');
    INSERT INTO attribuer_missions VALUES ('P02', 'DONALD');

    INSERT INTO agents VALUES ('A007', 'BOND', 'James', '1973-01-01', 'BY');
    INSERT INTO agents VALUES ('AOSS117', 'Dujardin', 'Jean', '1970-11-01','FR');

    INSERT INTO possede_specialites VALUES ('A007', 'nettoyeur');
    INSERT INTO possede_specialites VALUES ('AOSS117','espion');

    INSERT INTO cibles VALUES ('CI01', 'Lespion', 'Pierre', '1958-03-22','BY','DONALD');
    INSERT INTO cibles VALUES ('CI02', 'Lefuyard', 'Pablo', '1965-02-12','FR','APACHE');

    INSERT INTO vise_cibles VALUES ('APACHE', 'CI01');
    INSERT INTO vise_cibles VALUES ('DONALD', 'CI02');

    INSERT INTO agents_effectuer_missions VALUES ('APACHE','A007');
    INSERT INTO agents_effectuer_missions VALUES ('DONALD','AOSS117');

    INSERT INTO contacts VALUES ('CO1', 'Cédric', 'Martin', '1977-10-03', 'FR');
    INSERT INTO contacts VALUES ('CO2', 'Ivan', 'Petrov', '1980-03-22', 'BY');

    INSERT INTO contacts_lier_missions VALUES ('APACHE', 'CO1');
    INSERT INTO contacts_lier_missions VALUES ('DONALD', 'CO2');

    INSERT INTO admins VALUES ('AD01','Martin', 'Théo', 'theo.martin.simplon@gmail.com', 'theo01!', '2020-09-16');
    INSERT INTO admins VALUES ('AD02', 'Dupond', 'Zoé', 'zoe.dupond.simplon@gmail.com', 'zoe02!', '2020-09-16');

COMMIT;

