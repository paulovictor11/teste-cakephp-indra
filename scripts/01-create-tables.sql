create table if not exists users (
	id serial primary key,
	name varchar(50),
	email varchar(50),
	password varchar(255),
	createdAt timestamp default now()
);

create table if not exists products (
	id serial primary key,
	name varchar(50),
	description text,
	price numeric(11, 2),
	createdAt timestamp default now(),
	user_id int
);

alter table products
add constraint user_id
foreign key (user_id)
references users(id)