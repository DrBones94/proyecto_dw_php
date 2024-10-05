create database proyecto_1;

use proyecto_1;

create table Tipo_Usuario (
  id_tipo_usuario varchar(3) not null primary key,
  descripcion varchar(50) not null
);

create table Usuario (
  id_usuario int not null auto_increment primary key,
  nombre varchar(100) not null,
  usuario varchar(100) not null,
  password varchar(100) not null,
  activo boolean not null default 1,
  fecha_creacion timestamp not null default now(),
  id_tipo_usuario varchar(3) not null,
  foreign key (id_tipo_usuario) references Tipo_Usuario(id_tipo_usuario) on update cascade on delete restrict
);

create table Cuenta (
  id_cuenta int not null auto_increment primary key,
  no_cuenta varchar(25) not null,
  nombre_cuenta varchar(50) not null,
  dpi varchar(25) not null,
  monto_inicial decimal(14, 4) not null,
  monto_actual decimal(20, 4) not null,
  activo boolean not null default 1,
  fecha_creacion timestamp not null default now()
);

create table Cliente (
  id_cliente int not null auto_increment primary key,
  correo_electronico varchar(50) not null,
  dpi varchar(25) not null,
  password varchar(100) not null,
  activo boolean not null default 1,
  fecha_creacion timestamp not null default now()
);

create table Cliente_Cuenta (
  id_cliente_cuenta int not null auto_increment primary key,
  id_cliente int not null,
  id_cuenta int not null,
  foreign key (id_cliente) references Cliente(id_cliente) on update cascade on delete restrict,
  foreign key (id_cuenta) references Cuenta(id_cuenta) on update cascade on delete restrict
);

create table Cuenta_Tercero (
  id_cuenta_tercero int not null auto_increment primary key,
  alias varchar(100) not null,
  monto_maximo decimal(20,4) not null,
  cantidad_maxima int not null,
  fecha_creacion timestamp not null default now(),
  id_cliente int not null,
  id_cuenta int not null,
  foreign key (id_cliente) references Cliente(id_cliente) on update cascade on delete restrict,
  foreign key (id_cuenta) references Cuenta(id_cuenta) on update cascade on delete restrict
);

create table Retiro (
  id_retiro int not null auto_increment primary key,
  monto_retiro decimal(20, 4) not null,
  fecha_retiro timestamp not null default now()
);






