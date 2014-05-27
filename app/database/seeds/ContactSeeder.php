<?php

class ContactSeeder extends Seeder {

	public function run()
	{
		Contact::create(array(
			'firstname' => 'Juan',
			'lastname'  => 'Puicon',
			'email_address' => 'negro@amiguitosjijij.com',
			'description' => 'My best friend'
		));
		Contact::create(array(
			'firstname' => 'Manuel',
			'lastname'  => 'Vela',
			'email_address' => 'manuel@amiguitosjijij.com',
			'description' => 'My best friend'
		));
		Contact::create(array(
			'firstname' => 'Jose',
			'lastname'  => 'Zegarra',
			'email_address' => 'pepe@amiguitosjijij.com',
			'description' => 'My best friend'
		));
	}
}
