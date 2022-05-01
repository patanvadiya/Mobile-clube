<?php

	namespace App\Repositories;

	interface AddCartInterface
	{
		public function create(array $data);
		public function AddCartShowData();
		public function delete($id);
	} 