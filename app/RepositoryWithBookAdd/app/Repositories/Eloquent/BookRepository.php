<?php 

	namespace App\Repositories\Eloquent;

	use App\Repositories\BookInterface;
	use App\Book;

	class BookRepository implements BookInterface
	{
		private $model;
		function __construct(Book $model)
		{
			$this->model = $model;
		}

		public function create(array $data)
		{
			return $this->model->create($data);
		}

		public function getAll()
		{
			return $this->model->all();
		}

		public function showBook($id)
	    {
	        return $this->model->findOrFail($id);
	    }

	    public function delete($id)
	    {
	    	return $this->model->destroy($id);
	    }

	}