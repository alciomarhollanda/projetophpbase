CREATE TABLE compra(
	IdCompra INT PRIMARY KEY AUTO_INCREMENT,
	dataCompra datetime DEFAULT now(),
    valorCompraTotal float,
    fk_IdReg int not null,
    foreign key (fk_IdReg) references reg(id)
);


CREATE TABLE produto(
	IdProduto INT PRIMARY KEY AUTO_INCREMENT,
	nomeProduto VARCHAR(50) NOT NULL,
    preco float not null
);

CREATE TABLE compra_produto(
	fkCompra INT NOT NULL,
	fkProduto INT NOT NULL,
    
	PRIMARY KEY (fkCompra, fkProduto),
	FOREIGN KEY(fkCompra) REFERENCES compra(IdCompra),
	FOREIGN KEY(fkProduto) REFERENCES produto(IdProduto)
);

insert into produto (nomeProduto, preco) values ("Biscoito",3.90);
insert into produto (nomeProduto, preco) values ("Pão",9.50);
insert into produto (nomeProduto, preco) values ("Contra filé ",39.50);


insert into compra (fk_IdReg) values (3);

alter table compra_produto add qtd_produto int ;

insert into compra_produto (fkCompra,fkProduto,qtd_produto) values (1,3,5);
insert into compra_produto (fkCompra,fkProduto,qtd_produto) values (1,2,2);

select * from compra_produto as cp
inner join produto as p on p.IdProduto = cp.fkProduto
inner join compra as c on c.IdCompra = cp.fkCompra
inner join reg as r on r.id = c.fk_IdReg;

select * from compra;



