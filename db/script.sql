CREATE TABLE Usuario (
    idUser INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(512) NOT NULL
);

CREATE TABLE Preguntas (
    idPregunta INT PRIMARY KEY AUTO_INCREMENT, 
    descripcionPregunta VARCHAR(4096) NOT NULL
);

CREATE TABLE respuestas (
    idRespuesta INT PRIMARY KEY AUTO_INCREMENT,
    descripcionRespuesta VARCHAR(4096) NOT NULL,
    opcionRespuesta CHAR(1) NOT NULL,
    idQuestion INT NOT NULL,
    FOREIGN KEY (idQuestion) REFERENCES Preguntas(idPregunta)
);
