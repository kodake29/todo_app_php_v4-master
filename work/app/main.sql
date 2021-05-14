create TABLE todos (
id int not null AUTO_INCREMENT,
is_do BOOLEAN DEFAULT false,
title TEXT,
primary key(id)
);

insert into todos(title) values ('aaa');
insert into todos(title,is_do) values ('bbb',true);
insert into todos(title) values ('ccc');

SELECT * from todos;