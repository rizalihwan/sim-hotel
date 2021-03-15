<?php

namespace App\Repositories;

interface UserRepositoryInterface{
    public function getAll();
    public function getWhere();
    public function getById($id);
    public function store(array $attributes);
    public function update($id, array $attributes);
    public function delete($id);
}
