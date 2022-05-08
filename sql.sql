create table esercizio (
    id int auto_increment primary key,
    muscolo varchar(100) not null,
    nome varchar(255) not null,
    serie varchar(100) not null
);
create table cedimento (
    id int auto_increment primary key,
    esercizio int not null,
    peso int not null,
    serie varchar(100) not null,
    giorno date,
    foreign key (esercizio) references esercizio(id)
);