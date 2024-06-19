USE projeto;
 

    CREATE TABLE carro (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(50) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    fabricante VARCHAR(50) NOT NULL,
    quilometragem DOUBLE NOT NULL,
    ano DATE NOT NULL
);

SELECT * FROM carro;

CREATE TABLE cliente (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    sobrenome VARCHAR(50) NOT NULL,
    datanascimento DATE NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    rg VARCHAR(100) NOT NULL
);


CREATE TABLE login (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    senha VARCHAR(20) NOT NULL
);


CREATE TABLE publicacao (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    cliente_id INTEGER  NOT NULL,
    carro_id INTEGER NOT NULL, 
    FOREIGN KEY (cliente_id) REFERENCES cliente (id) ON DELETE CASCADE,
    FOREIGN KEY (carro_id) REFERENCES carro (id) ON DELETE CASCADE
);

INSERT INTO carro(modelo, categoria, fabricante, quilometragem, ano) VALUES ("camaro", "luxo", "chevrolet", 10.000, "2022")

SELECT
                        publicacao.id as id,
                        cliente.nome AS cliente,
                        carro.modelo AS carro
                        FROM publicacao
                        JOIN
                        cliente ON publicacao.cliente_id = cliente.id
                        JOIN
                        carro ON publicacao.carro_id = carro.id;