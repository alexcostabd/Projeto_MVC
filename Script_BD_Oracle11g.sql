DROP TABLE PRODUTO_LINHA;
DROP TABLE PRODUTO;

CREATE SEQUENCE sequencia_produto
    MINVALUE 1
    MAXVALUE 999999
    START WITH 1
    INCREMENT BY 1;
    
CREATE SEQUENCE sequencia_linha
    MINVALUE 1
    MAXVALUE 999999
    START WITH 1
    INCREMENT BY 1;
    
CREATE SEQUENCE sequencia_fabricante
    MINVALUE 1
    MAXVALUE 999999
    START WITH 1
    INCREMENT BY 1;

CREATE TABLE Fabricante (
    FAB_Id NUMBER NOT NULL PRIMARY KEY,
    FAB_Nome VARCHAR2(200) NOT NULL UNIQUE   
); 

CREATE TABLE PRODUTO_LINHA(    
    LIN_Id NUMBER NOT NULL,
    LIN_Nome VARCHAR(80) NULL, 
    PRIMARY KEY (LIN_Id)
);

desc PRODUTO_LINHA;
ALTER TABLE PRODUTO_LINHA ADD PRIMARY KEY (LIN_Id);
 




CREATE TABLE PRODUTO(
    FAB_Id NUMBER NOT NULL, 
    LIN_Id NUMBER NOT NULL,
    PRO_Id NUMBER NOT NULL,
    PRO_Nome VARCHAR(250) NOT NULL,
    PRO_Descricao VARCHAR(250) NOT NULL,
    PRO_PrecoInicial NUMBER(8,2) NOT NULL,
    PRO_Peso NUMBER(4,2) NOT NULL,
    PRO_Imagem BLOB,
    PRO_Destaque CHAR CHECK (PRO_Destaque in (0,1)),
    PRO_Estoque NUMBER(4,2) NOT NULL    
);

ALTER TABLE PRODUTO ADD CONSTRAINT PF_PROD PRIMARY KEY (PRO_Id);
ALTER TABLE PRODUTO ADD CONSTRAINT FK_PROD_LINHA FOREIGN KEY (LIN_Id) REFERENCES PRODUTO_LINHA (LIN_Id);
ALTER TABLE PRODUTO ADD CONSTRAINT FK_PROD_FAB FOREIGN KEY (FAB_Id) REFERENCES Fabricante (FAB_Id);


CREATE TABLE Usuario(
    USU_Login VARCHAR2(20) NOT NULL PRIMARY KEY,
    USU_Senha VARCHAR2(30)
);

select sequencia_fabricante.currval from dual;

INSERT INTO fabricante (FAB_Id, FAB_Nome) VALUES (sequencia_fabricante.nextval, 'Adidas');
INSERT INTO fabricante (FAB_Id, FAB_Nome) VALUES (sequencia_fabricante.nextval, 'Dal Ponte');
INSERT INTO fabricante (FAB_Id, FAB_Nome) VALUES (sequencia_fabricante.nextval, 'Olympicus');

INSERT INTO PRODUTO_LINHA (LIN_Id, LIN_Nome) VALUES ( sequencia_linha.nextval, 'Camisetas Oficiais');
INSERT INTO PRODUTO_LINHA (LIN_Id, LIN_Nome) VALUES (sequencia_linha.nextval, 'Camiseta Treino'); 
INSERT INTO PRODUTO_LINHA (LIN_Id, LIN_Nome) VALUES (sequencia_linha.nextval, 'Camiseta Comemorativa');

select * from Usuario;

INSERT INTO Usuario (USU_Login, USU_Senha) VALUES ('admin', '123456');
