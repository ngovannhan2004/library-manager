<?php

namespace App\Http\Services;

interface DAOInterface
{
    function getAll();
    function getById($id);
    function getByName($name);
    function create($data);
    function update($data, $id);
    function delete($id);
    function search($value);

}
