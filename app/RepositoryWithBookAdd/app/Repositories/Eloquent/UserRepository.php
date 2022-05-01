<?php

namespace App\Repositories\Eloquent;
use App\Repositories\UserRepositoryInterface;
use App\User;

/**
 * 
 */
class UserRepository implements UserRepositoryInterface
{
	private $model;

	function __construct(User $model)
	{
		$this->model = $model;	
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

    public function getAll()
    {
        return $this->model->all();
    }

	public function getModel()
    {
        return $this->model;
    }

}