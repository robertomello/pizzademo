<?php

return array(
	array(
		'email'			=> 'test@test.com',
		'password'		=> Hash::make('test'),
		'first_name'	=> 'John',
		'last_name'		=> 'Doe',
		'address'		=> '7055 ASdASDASDdsada, Smalll str. 21.',
		'phone_number'	=> '+36 70 / 123 4567',
		'created_at'	=> new DateTime,
		'updated_at'	=> new DateTime
	),
	array(
		'email'			=> 'mj@test.com',
		'password'		=> Hash::make('1234'),
		'first_name'	=> 'Márton',
		'last_name'		=> 'Teszt',
		'address'		=> '1470 Keresdszented, Mártír út 1.',
		'phone_number'	=> '+36 30 / 541 5522',
		'created_at'	=> new DateTime,
		'updated_at'	=> new DateTime
	),
	array(
		'email'			=> 'ekiss@test.com',
		'password'		=> Hash::make('1234'),
		'first_name'	=> 'Elemér',
		'last_name'		=> 'Kiss',
		'address'		=> '6711 Keserűbbégy, Lehel tér 184.',
		'phone_number'	=> '+36 70 / 123 4567',
		'created_at'	=> new DateTime,
		'updated_at'	=> new DateTime
	),
);