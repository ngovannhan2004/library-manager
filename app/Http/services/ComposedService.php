<?php

namespace App\Http\Services;

use App\Models\Composed;

class ComposedService
{
    private Composed $composed;

    public function __construct(Composed $composed)
    {
        $this->composed = $composed;
    }

function getAll()
{
    return $this->composed->all();
}

function getById($id)
{

    return $this->composed->find($id);
}

function getByName($name)
{
    // TODO: Implement getByName() method.
}

function create($request)
{
    return $this->composed->create([
        'author_id' => $request->author_id,
        'book_id' => $request->book_id,
    ]);
}
    function update($id, $request)
    {
        $composed = $this->composed->find($id);
        $composed->update([
            'author_id' => $request->author_id,
            'book_id' => $request->book_id,
        ]);
        return $composed;
    }

    function delete($id)
    {
        $composed = $this->composed->find($id);
        if ($composed) {
            $composed->delete();
        }
    }



}
