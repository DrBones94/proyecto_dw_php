--- CREACION DE ESTRUCTURAS DE DB
-- create database proyecto_1;

-- use proyecto_1;

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

create table Retiro_Cuenta (
  id_retiro_cuenta int not null auto_increment primary key,
  id_retiro int not null,
  id_cuenta int not null,
  foreign key (id_retiro) references Retiro(id_retiro) on update cascade on delete restrict,
  foreign key (id_cuenta) references Cuenta(id_cuenta) on update cascade on delete restrict 
);

create table Deposito (
  id_deposito int not null auto_increment primary key,
  monto_deposito decimal(20, 4) not null,
  fecha_deposito timestamp not null default now()
);

create table Deposito_Cuenta (
  id_deposito_cuenta int not null auto_increment primary key,
  id_desposito int not null,
  id_cuenta int not null,
  foreign key (id_desposito) references Deposito(id_deposito) on update cascade on delete restrict,
  foreign key (id_cuenta) references Cuenta(id_cuenta) on update cascade on delete restrict 
);

create table Tipo_Transaccion (
  id_tipo_transaccion varchar(3) not null primary key,
  descripcion varchar(25) not null
);

create table Transaccion (
  id_transaccion int not null auto_increment primary key,
  monto_transaccion decimal(20,4) not null,
  fecha_transaccion timestamp not null default now(),
  id_tipo_transaccion varchar(3) not null,
  id_cuenta_origen int not null,
  id_cuenta_destino int not null,
  foreign key (id_tipo_transaccion) references Tipo_Transaccion(id_tipo_transaccion) on update cascade on delete restrict,
  foreign key (id_cuenta_origen) references Cuenta(id_cuenta) on update cascade on delete restrict,
  foreign key (id_cuenta_destino) references Cuenta(id_cuenta) on update cascade on delete restrict
);

-- CREACION DE SP
DELIMITER //
create procedure sp_agregar_usuario(in nombre_ varchar(), in usuario_ varchar(), in password_ varchar(), in tipo_ varchar())
begin
  insert into Usuario(nombre, usuario, password, id_tipo_usuario) values (nombre_, usuario_, password_, tipo_);
end //
DELIMITER ;

DELIMITER //
create procedure sp_obtener_usuario(in tipo_)
begin
  select id_usuario, nombre, activo, id_tipo_usuario from Usuario where id_tipo_usuario = tipo_;
end //
DELIMITER ;

DELIMITER //
create procedure sp_bloquear_usuario(in id_usuario_)
begin
  update Usuario set activo = !activo where id_usuario = id_usuario_;
end //
DELIMITER ;

DELIMITER //
create procedure sp_obtener_cantidad_cuentas_creadas()
begin
  select count(1) from Cuenta where fecha_creacion between (dateadd(yyyy, -2, getdate())) and (getdate());
end //
DELIMITER ;

DELIMITER //
create procedure sp_obtener_cantidad_clientes_registrados()
begin
  select count(1) from Cliente where fecha_creacion between (dateadd(yyyy, -2, getdate())) and (getdate());
end //
DELIMITER ;

DELIMITER //
create procedure sp_obtener_cantidad_transacciones()
begin
  select count(1) from Transaccion where fecha_transaccion between (dateadd(yyyy, -2, getdate())) and (getdate());
end //
DELIMITER ;

DELIMITER //
create procedure sp_obtener_cantidad_retiros()
begin
  select count(1) from Retiro where fecha_retiro between (dateadd(yyyy, -2, getdate())) and (getdate());
end //
DELIMITER ;

DELIMITER //
create procedure sp_obtener_cantidad_depositos()
begin
  select count(1) from Deposito fecha_deposito between (dateadd(yyyy, -2, getdate())) and (getdate());
end //
DELIMITER ;


