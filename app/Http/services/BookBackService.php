<?php

namespace App\Http\Services;

use App\Models\Pay;

class BookBackService implements DAOInterface
{

    private Pay $pay;


    public function __construct(Pay $pay)
    {
        $this->pay = $pay;
    }
    function getAll()
    {
        return $this->pay->all();
    }

    function getById($id)
    {
        // TODO: Implement getById() method.
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($data)
    {
        // TODO: Implement create() method.
    }

    function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
