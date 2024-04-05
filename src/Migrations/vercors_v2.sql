#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: asy_user
#------------------------------------------------------------

CREATE TABLE asy_user(
        ID_USER        Int  Auto_increment  NOT NULL ,
        NOM_USER       Varchar (100) NOT NULL ,
        PRENOM_USER    Varchar (100) NOT NULL ,
        ADRESSE_USER   Varchar (255) NOT NULL ,
        IS_ADMIN       Bool NOT NULL ,
        DATE_RGPD      Datetime NOT NULL ,
        PASSWORD_USER  Varchar (255) NOT NULL ,
        EMAIL_USER     Varchar (255) NOT NULL ,
        TELEPHONE_USER Varchar (15) NOT NULL
	,CONSTRAINT asy_user_AK UNIQUE (EMAIL_USER,TELEPHONE_USER)
	,CONSTRAINT asy_user_PK PRIMARY KEY (ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: asy_reservation
#------------------------------------------------------------

CREATE TABLE asy_reservation(
        ID_RESERVATION            Int  Auto_increment  NOT NULL ,
        ENFANT_RESERVATION        Bool NOT NULL ,
        NOMBRECASQUES_RESERVATION Int NOT NULL ,
        NOMBRELUGES_RESERVATION   Int NOT NULL ,
        NOMBRE_RESERVATION        Int NOT NULL ,
        ID_USER                   Int NOT NULL
	,CONSTRAINT asy_reservation_PK PRIMARY KEY (ID_RESERVATION)

	,CONSTRAINT asy_reservation_asy_user_FK FOREIGN KEY (ID_USER) REFERENCES asy_user(ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: asy_nuit
#------------------------------------------------------------

CREATE TABLE asy_nuit(
        ID_NUIT   Int  Auto_increment  NOT NULL ,
        TYPE_NUIT Varchar (50) NOT NULL ,
        PRIX_NUIT Int NOT NULL
	,CONSTRAINT asy_nuit_PK PRIMARY KEY (ID_NUIT)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: asy_pass
#------------------------------------------------------------

CREATE TABLE asy_pass(
        ID_PASS     Int  Auto_increment  NOT NULL ,
        CHOIX_PASS  Varchar (50) NOT NULL ,
        TARIF_PASS  Int NOT NULL ,
        REDUIT_PASS Bool NOT NULL
	,CONSTRAINT asy_pass_PK PRIMARY KEY (ID_PASS)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: asy_choisi
#------------------------------------------------------------

CREATE TABLE asy_choisi(
        ID_PASS        Int NOT NULL ,
        ID_RESERVATION Int NOT NULL ,
        DATE_PASS      Date NOT NULL
	,CONSTRAINT asy_choisi_PK PRIMARY KEY (ID_PASS,ID_RESERVATION)

	,CONSTRAINT asy_choisi_asy_pass_FK FOREIGN KEY (ID_PASS) REFERENCES asy_pass(ID_PASS)
	,CONSTRAINT asy_choisi_asy_reservation0_FK FOREIGN KEY (ID_RESERVATION) REFERENCES asy_reservation(ID_RESERVATION)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: asy_nuitee
#------------------------------------------------------------

CREATE TABLE asy_nuitee(
        ID_NUIT        Int NOT NULL ,
        ID_RESERVATION Int NOT NULL ,
        DATE_NUITEE    Date NOT NULL
	,CONSTRAINT asy_nuitee_PK PRIMARY KEY (ID_NUIT,ID_RESERVATION)

	,CONSTRAINT asy_nuitee_asy_nuit_FK FOREIGN KEY (ID_NUIT) REFERENCES asy_nuit(ID_NUIT)
	,CONSTRAINT asy_nuitee_asy_reservation0_FK FOREIGN KEY (ID_RESERVATION) REFERENCES asy_reservation(ID_RESERVATION)
)ENGINE=InnoDB;

