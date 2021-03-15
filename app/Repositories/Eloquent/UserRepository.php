<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\UserRepositoryInterface;
use App\User;

Class UserRepository implements UserRepositoryInterface{

    private $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function getAll(){
       return $this->model->all();
    }
    public function getWhere(){
       return $this->model->where('id', '!=', auth()->user()->id)->paginate(5);
    }
    public function getById($id){
        return $this->model->findById($id);
    }
    public function store(array $attributes){
        return $this->model->create($attributes);
    }
    public function update($id, array $attributes){
        $this->model->findOrFail($id)->update($attributes);
    }
    public function delete($id){
        return $this->model->delete($id);
    }
}