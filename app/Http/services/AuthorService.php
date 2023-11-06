<?php

namespace App\Http\Services;

use App\Models\Author;

class AuthorService
{
    private Author $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function getAll()
    {
        return $this->author->all();
    }

    public function getById($id)
    {
        return $this->author->find($id);
    }

    public function create($request)
    {
        return $this->author->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ]);
    }

    public function update($id, $request)
    {
        $author = $this->author->find($id);
        $author->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ]);
        return $author;
    }
    public function delete($id)
    {
        $author = $this->author->find($id);
            $author->delete();

    }
}
