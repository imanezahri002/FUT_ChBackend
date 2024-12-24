CREATE DATABASE FUT_db;
CREATE TABLE Clubs(
club_id INT PRIMARY KEY AUTO_INCREMENT,
club_name VARCHAR(50) NOT NULL ,
club_image VARCHAR(255)
);
CREATE TABLE Nationalité(
nationality_id INT PRIMARY KEY AUTO_INCREMENT ,
nationality_name VARCHAR(50),
nationality_image VARCHAR(255)
);
CREATE TABLE Joueurs(
joueur_id INT PRIMARY KEY AUTO_INCREMENT,
joueur_name VARCHAR(50),
position VARCHAR(30) CHECK(position IN ('ST','GK','RW','LW','CM1','CM2','CM3','RB','LB','CB1','CB2')),
rating INT NOT NULL,
paceAndDiv INT NOT NULL,
shootAndHandl INT NOT NULL,
pasAndKick INT NOT NULL,
dribAndRef INT NOT NULL,
defAndSpeed INT NOT NULL,
physAndPos INT NOT NULL,
profile_joueur VARCHAR(255) NOT NULL,
nationality_id INT NOT NULL,
club_id INT NOT NULL,
FOREIGN KEY club_id REFERENCES Clubs club_id,
FOREIGN KEY nationality_id REFERENCES Nationalité nationality_id
)
CREATE TRIGGER deleteClub 
BEFORE DELETE ON clubs FOR EACH ROW
BEGIN DELETE FROM joueurs 
WHERE club_id = OLD.club_id; 
END;

CREATE TRIGGER deleteNationality 
BEFORE DELETE ON nationalité FOR EACH ROW
BEGIN DELETE FROM joueurs 
WHERE nationality_id = OLD.nationality_id; 
END ;