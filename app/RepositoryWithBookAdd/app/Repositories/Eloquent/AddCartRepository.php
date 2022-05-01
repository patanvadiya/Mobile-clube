<?php 
	
	namespace App\Repositories\Eloquent;
	
	//use App\Eloquent\AddCartRepository;
	use App\Repositories\AddCartInterface;
	use App\AddCart;

	/**
	 * 
	 */
	class AddCartRepository implements AddCartInterface
	{
		private $model;
		function __construct(AddCart $model)
		{
			$this->model = $model;
		}

		public function create(array $data)
		{
			return $this->model->create($data);
		}

		public function AddCartShowData()
		{
			return $this->model->all();
		}

		public function delete($id)
		{
			return $this->model->destroy($id);
		} 
	}