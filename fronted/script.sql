Create Table user (
    idUser int Primary Key Auto_Increment,
    name varchar (50) NOT NULL,
    email varchar (128) NOT NULL,
    password varchar (512)  NOT NULL,
    rolAdmin boolean NOT NULL,
);

Create Table Questions (
    idQuestion int Primary Key Auto_Increment, 
    descriptionQuestion varchar (4096)  NOT NULL, 
);

Create Table  answersQuizz (
    idAnswerQuizz int Primary Key auto_increment,
    descriptionAnswerQuizz varchar (4096)  NOT NULL,
    idQuestion int NOT NULL,
    FOREIGN key (idQuestion) REFERENCES Questions(idQuestion)
);

Create Table historyPoints (
    idHistory INT Primary key  AUTO_INCREMENT ,
    idUser int NOT NULL,
    idAnswer INT NOT NULL,
    QuestionNumbers INT NOT NULL,
    points INT NOT NULL,
    NumberQuestions INT NOT NULL,
    optionAnswer INT NOT NULL,
     idQuestion int NOT NULL,
    FOREIGN key (idQuestion) REFERENCES Questions(idQuestion),
    FOREIGN key (idUser) references user(idUser)
)

Create Table answerHanged (
    idAnswerHanged INT Primary key  AUTO_INCREMENT,
    descriptionAnswerHanged varchar (512)
    
);





