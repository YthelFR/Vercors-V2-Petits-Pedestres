#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        ID_USER        Int  Auto_increment  NOT NULL ,
        NOM_USER       Varchar (100) NOT NULL ,
        PRENOM_USER    Varchar (100) NOT NULL ,
        ADRESSE_USER   Varchar (255) NOT NULL ,
        IS_ADMIN       Bool NOT NULL ,
        DATE_RGPD      Datetime NOT NULL ,
        EMAIL_USER     Varchar (255) NOT NULL ,
        TELEPHONE_USER Varchar (15) NOT NULL
	,CONSTRAINT User_AK UNIQUE (EMAIL_USER,TELEPHONE_USER)
	,CONSTRAINT User_PK PRIMARY KEY (ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reservation
#------------------------------------------------------------

CREATE TABLE Reservation(
        ID_RESERVATION            Int  Auto_increment  NOT NULL ,
        ENFANT_RESERVATION        Bool NOT NULL ,
        NOMBRECASQUES_RESERVATION Int NOT NULL ,
        NOMBRELUGES_RESERVATION   Int NOT NULL ,
        ID_USER                   Int NOT NULL
	,CONSTRAINT Reservation_PK PRIMARY KEY (ID_RESERVATION)

	,CONSTRAINT Reservation_User_FK FOREIGN KEY (ID_USER) REFERENCES User(ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Nuit
#------------------------------------------------------------

CREATE TABLE Nuit(
        ID_NUIT   Int  Auto_increment  NOT NULL ,
        TYPE_NUIT Varchar (50) NOT NULL ,
        PRIX_NUIT Int NOT NULL
	,CONSTRAINT Nuit_PK PRIMARY KEY (ID_NUIT)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pass
#------------------------------------------------------------

CREATE TABLE Pass(
        ID_PASS     Int  Auto_increment  NOT NULL ,
        CHOIX_PASS  Varchar (50) NOT NULL ,
        TARIF_PASS  Int NOT NULL ,
        DATE_PASS   Date NOT NULL ,
        REDUIT_PASS Bool NOT NULL
	,CONSTRAINT Pass_PK PRIMARY KEY (ID_PASS)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Choisi
#------------------------------------------------------------

CREATE TABLE Choisi(
        ID_PASS        Int NOT NULL ,
        ID_RESERVATION Int NOT NULL
	,CONSTRAINT Choisi_PK PRIMARY KEY (ID_PASS,ID_RESERVATION)

	,CONSTRAINT Choisi_Pass_FK FOREIGN KEY (ID_PASS) REFERENCES Pass(ID_PASS)
	,CONSTRAINT Choisi_Reservation0_FK FOREIGN KEY (ID_RESERVATION) REFERENCES Reservation(ID_RESERVATION)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Nuitee
#------------------------------------------------------------

CREATE TABLE Nuitee(
        ID_NUIT        Int NOT NULL ,
        ID_RESERVATION Int NOT NULL ,
        DATE_NUITEE    Date NOT NULL
	,CONSTRAINT Nuitee_PK PRIMARY KEY (ID_NUIT,ID_RESERVATION)

	,CONSTRAINT Nuitee_Nuit_FK FOREIGN KEY (ID_NUIT) REFERENCES Nuit(ID_NUIT)
	,CONSTRAINT Nuitee_Reservation0_FK FOREIGN KEY (ID_RESERVATION) REFERENCES Reservation(ID_RESERVATION)
)ENGINE=InnoDB;

