<?php

namespace App\Http\services;



use App\Models\PublishingCompany;
use Illuminate\Support\Str;

class PublishingCompanyService implements DAOInterface
{
    private PublishingCompany $publishingCompany;


    public function __construct(PublishingCompany $publishingCompany)
    {
        $this->publishingCompany = $publishingCompany;
    }

    function getAll()
    {
        return $this->publishingCompany->all();

    }

    function getById($id)
    {
        return $this->publishingCompany->find($id);
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($request)
    {
        return$this->publishingCompany->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'address' => $request->address ?? null,
            'phone' => $request->phone ?? null,
            'email' => $request->email ?? null,
            'gender' => $request->gender ?? null,
        ]);
    }

    function update($id, $request)
    {
        $publishingCompany = $this->publishingCompany->find($id);
        $publishingCompany->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'address' => $request->address ?? null,
            'phone' => $request->phone ?? null,
            'email' => $request->email ?? null,
            'gender' => $request->gender ?? null,
        ]);
        return $publishingCompany;
    }

    function delete($id)
    {
        $publishingCompany = $this->publishingCompany->find($id);
        $publishingCompany->delete();
    }

    function search($value)
    {
        // TODO: Implement search() method.
    }
}
