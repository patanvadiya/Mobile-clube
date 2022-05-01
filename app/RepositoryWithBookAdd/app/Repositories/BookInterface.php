<?php

	namespace App\Repositories;

	interface BookInterface
	{
		public function create(array $data);
		public function getAll();
		public function showBook($id);
		public function delete($id);

	} 
