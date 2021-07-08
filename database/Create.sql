drop database if exists Gvoto;
create database Gvoto
default character set utf8
default collate utf8_general_ci;

use gvoto;

#============= Tabela Usuario ============= #

drop table if exists `Usuario`;

create table if not exists Usuario(
id 	  int not null primary key auto_increment ,
nome  nvarchar(100) not null ,
email  nvarchar(100) not null ,
senha longtext not null ,
papel enum('super','normal')   not null default 'super' ,
sessao enum('online','offline') not null default 'offline' 
) default charset = utf8;

#============= Tabela Imagem ============= #

drop table if exists `Imagem`;

create table if not exists Imagem(
id 	  int not null primary key auto_increment ,
caminho  longtext not null
) default charset = utf8;

#============= Tabela Presidentes ============= #

drop table if exists `Presidentes`;

create table if not exists Presidentes(
id 	     int not null primary key auto_increment ,
idFoto int ,
nome  nvarchar(100) not null ,
genero enum('Masculino','Feminino') not null ,
dataNascimento	date not null ,
bi  nvarchar(100) not null ,
foreign key (idFoto) references Imagem (id)
) default charset = utf8;

#============= Tabela Partidos ============= #

drop table if exists `Partidos`;

create table if not exists Partidos(
id 	     int not null primary key auto_increment ,
idPresidente int not null ,
idBandeira int ,
nome  nvarchar(100) not null ,
foreign key (idPresidente) references Presidentes (id),
foreign key (idBandeira) references Imagem (id)
) default charset = utf8;

#============= Tabela Eleitores ============= #

drop table if exists `Eleitores`;

create table if not exists Eleitores(
id 	     int not null primary key auto_increment ,
nome  nvarchar(100) not null ,
codVoto  nvarchar(100) not null ,
dataNascimento	date not null,
provincia  nvarchar(100) not null ,
dataCriacao	date not null 
) default charset = utf8;

#============= Tabela Data Votação ============= #

drop table if exists `ConfigVotacao`;

create table if not exists ConfigVotacao(
id 	        int not null primary key auto_increment ,
dataComeco date not null,
horaInicio 	time not null,
horaTermino time not null,
estado enum('On','OFF') not null default 'On' 
) default charset = utf8;

#============= Tabela Votação ============= #

drop table if exists `Votacao`;

create table if not exists Votacao(
id 	     int not null primary key auto_increment ,
idPartido int not null,
idEleitor int not null,
idConfig int not null,
dataCriacao date not null,
foreign key (idPartido) references Partidos (id),
foreign key (idEleitor) references Eleitores (id),
foreign key (idConfig) references ConfigVotacao (id)
) default charset = utf8;

select *from eleitores;

insert into usuario
(
nome, email, senha, papel, sessao
)
values
(
'Carlos Alister', 'carlosalister@gmail.com', '123', default, default
),
(
'Claudio Augusto', 'claudioaugusto@gmail.com', '123', default, default
);

Drop procedure if exists `GetDataPresidentes`;
Delimiter $$

Create Procedure GetDataPresidentes()

begin		
        select id as Id, nome as Nome, bi as Bi, genero as Genero, dataNascimento as DataNascimento from Presidentes;    
end $$

Delimiter ;

Drop procedure if exists `GetDataPartidos`;
Delimiter $$

Create Procedure GetDataPartidos()

begin		
        select partidos.id as Id, partidos.nome as Partido, presidentes.nome as Presidente , presidentes.genero as Genero  from partidos 
		inner join presidentes
		on partidos.idPresidente = presidentes.id;   
end $$

Delimiter ;

Drop procedure if exists `GetEleitores`;
Delimiter $$

Create Procedure GetEleitores()

begin		
        select id as Id, Nome as Eleitor, codVoto as CodVoto, dataNascimento as DataNascimento, provincia as Provincia, dataCriacao as DataRegistro from Eleitores;
end $$

Delimiter ;

Drop procedure if exists `GetConfigVotacao`;
Delimiter $$

Create Procedure GetConfigVotacao()

begin		
        select id as Id, datacomeco as DataComeco, horaInicio as HoraInicio, horaTermino as HoraTermino, estado as Estado from ConfigVotacao order by(id) desc;
end $$

Delimiter ;

Drop procedure if exists `GetVotaco`;
Delimiter $$

Create Procedure GetVotaco()

begin		
        select votacao.id as Id, partidos.nome as Partido, count(*) as Total, 
		configvotacao.dataComeco as DataComeco, configvotacao.horaInicio as HoraInicio, configvotacao.horaTermino as HoraTermino,
		votacao.dataCriacao as DataVotacao
		from votacao
		inner join partidos on votacao.idPartido = partidos.id
		inner join configvotacao on votacao.idConfig = configvotacao.id
		group by (votacao.idPartido);
end $$

Delimiter ;