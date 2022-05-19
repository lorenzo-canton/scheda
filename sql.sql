/*create table giorno (
    id int auto_increment primary key,
    titolo varchar(255),
    descrizione varchar(500)
);*/
create table esercizio (
    id int auto_increment primary key,
    /*giorno int not null,*/
    muscolo varchar(100) not null,
    nome varchar(255) not null,
    serie varchar(100) not null/*,
    foreign key (giorno) references giorno(id)*/
);
create table cedimento (
    id int auto_increment primary key,
    esercizio int not null,
    peso int not null,
    serie varchar(100) not null,
    giorno date,
    foreign key (esercizio) references esercizio(id)
        ondelete cuscade;
);
delimiter /
create procedure cedimenti (es int)
begin
    select giorno, serie, peso from cedimento
    where esercizio = es
    order by giorno
    desc; 
end/
delimiter ;