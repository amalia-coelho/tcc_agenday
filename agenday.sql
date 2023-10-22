create database db_agenday;
use db_agenday;

create table tb_evento(
	cd_evento int primary key auto_increment,
  	nm_titulo varchar(100) not null,
  	dt_inicio date not null,
  	hr_inicio time,
  	dt_final date,
  	hr_final time,
  	ds_anotacoes varchar(255)
);

create table tb_turma(
	cd_turma int primary key auto_increment,
  	nm_turma varchar(5) not null
);

create table tb_usuario(
	cd_usuario int primary key auto_increment,
  	nm_usuario varchar(100) not null,
  	ds_email varchar(100) not null,
  	ds_senha varchar(50) not null,
  	nr_rm char(5) not null,
 	nr_verificacao char(6),
  	id_nivel int,
  	id_turma int
);

create table tb_comunicado(
    cd_comunicado int primary key auto_increment,
  	nm_titulo varchar(100) not null,
  	ds_descricao varchar(255) not null,
  	ds_imagem varchar(255),
  	dt_postagem date,
    dt_comunicado date,
    id_usuario int not null
);

create table tb_comunicado_turma(
	cd_comunicado_turma int primary key auto_increment,
    id_comunicado int,
    id_turma int
);

create table tb_evento_turma(
	tb_evento_turma int primary key auto_increment,
    id_evento int,
    id_turma int
);

create table tb_apm(
	cd_apm int primary key auto_increment,
  	nm_produto varchar(50) not null,
  	ds_descricao varchar(100),
  	nr_valor varchar(100) not null,
  	ds_imagem varchar(255) not null,
  	id_nivel int
);

create table tb_gestao(
	cd_membro int primary key auto_increment,
  	nm_membro varchar(100) not null,
  	ds_cargo varchar(50) not null,
  	ds_imagem varchar(255) not null,
  	dt_modificacao date not null,
  	id_nivel int
);

create table tb_saude(
	cd_sindrome int primary key auto_increment,
  	nm_sindrome varchar(150) not null,
  	id_grausindrome int
);

create table tb_nivel(
  	cd_nivel int primary key auto_increment,
	nm_nivel varchar(20) not null
);

create table tb_grausindrome(
	cd_grausindrome int primary key auto_increment,
    nm_grausindrome varchar(150) not null
);

create table tb_usuario_saude(
	cd_usuario_saude int primary key auto_increment,
    ds_sindrome varchar(100) not null,
    id_saude int,
    id_usuario int
);

alter table tb_usuario add foreign key fk_usuario_nivel(id_nivel) references tb_nivel(cd_nivel);

alter table tb_usuario add foreign key fk_usuario_turma(id_turma) references tb_turma(cd_turma);

alter table tb_apm add foreign key fk_apm_nivel(id_nivel) references tb_nivel(cd_nivel);

alter table tb_gestao add foreign key fk_gestao_nivel(id_nivel) references tb_nivel(cd_nivel);

alter table tb_saude add foreign key fk_saude_grausindrome(id_grausindrome) references tb_grausindrome(cd_grausindrome);

alter table tb_usuario_saude add foreign key fk_usuario_saude_saude(id_saude) references tb_saude(cd_sindrome);

alter table tb_usuario_saude add foreign key fk_usuario_saude_usuario(id_usuario) references tb_usuario(cd_usuario);

alter table tb_comunicado add foreign key fk_comunicado_usuario(id_usuario) references tb_usuario(cd_usuario);

alter table tb_comunicado_turma add foreign key fk_comunicado_turma_comunicado(id_comunicado) references tb_comunicado(cd_comunicado);

alter table tb_comunicado_turma add foreign key fk_comunicado_turma_turma(id_turma) references tb_turma(cd_turma);

alter table tb_evento_turma add foreign key fk_evento_turma_evento(id_evento) references tb_evento(cd_evento);

alter table tb_evento_turma add foreign key fk_evento_turma_turma(id_turma) references tb_turma(cd_turma);
-- Valores iniciais

-- Niveis
INSERT INTO tb_nivel (nm_nivel) VALUES ('Administrador');
INSERT INTO tb_nivel (nm_nivel) VALUES ('Estudante');

-- Turmas
INSERT INTO tb_turma (nm_turma) VALUES ('3MIN');
INSERT INTO tb_turma (nm_turma) VALUES ('3MAD');
INSERT INTO tb_turma (nm_turma) VALUES ('3MAM');