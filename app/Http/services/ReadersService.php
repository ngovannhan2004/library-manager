<?php

namespace App\Http\Services;

use App\Models\Reader;

class ReadersService
{
    private Reader $readers;

    public function __construct(Reader $readers)
    {
        $this->readers = $readers;
    }

    public function getAll()
    {
        return $this->readers->all();
    }
    public function getById($id)
    {
        return $this->readers->find($id);
    }
    public function create($request)
    {
        return $this->readers->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'year_birth' => $request->year_birth,
            'reader_code' => strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6)),
        ]);

    }
    public function update($id, $request)
    {
        $readers = $this->readers->find($id);
        $readers->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'year_birth' => $request->year_birth,
            'reader_code' => strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6)),
        ]);
        return $readers;
    }
    public function delete($id)
    {
        $readers = $this->readers->find($id);
        $readers->delete();
    }
}
