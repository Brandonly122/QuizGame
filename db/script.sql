CREATE TABLE Usuario (
    idUser INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(128) NOT NULL,
    password VARCHAR(512) NOT NULL,
    rolAdmin BOOLEAN NOT NULL
)

CREATE TABLE Questions (
    idQuestion INT PRIMARY KEY AUTO_INCREMENT, 
    descriptionQuestion VARCHAR(4096) NOT NULL
)

Create Table  answersQuizz (
    idAnswerQuizz int Primary Key auto_increment,
    descriptionAnswerQuizz varchar (4096)  NOT NULL,
    idQuestion int NOT NULL,
    FOREIGN key (idQuestion) REFERENCES Questions(idQuestion)
)

CREATE TABLE historyPoints (
    idHistory INT PRIMARY KEY AUTO_INCREMENT,
    idUser INT NOT NULL,
    idAnswerQuizz INT NOT NULL,
    idQuestion INT NOT NULL,
    points INT NOT NULL,
    FOREIGN KEY (idAnswerQuizz) REFERENCES answersQuizz(idAnswerQuizz),
    FOREIGN KEY (idQuestion) REFERENCES Questions(idQuestion),
    FOREIGN KEY (idUser) REFERENCES Usuario(idUser) -- Cambio realizado aquí
);

Create Table answerHanged (
    idAnswerHanged INT Primary key  AUTO_INCREMENT,
    descriptionAnswerHanged varchar (512)
    
)


