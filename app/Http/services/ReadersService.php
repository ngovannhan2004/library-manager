<?php

namespace App\Http\Services;

use App\Models\LoanSlip;
use App\Models\Reader;
use Illuminate\Support\Facades\DB;

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
            'reader_code' =>$request->reader_code
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
            'reader_code' =>$request->reader_code
        ]);
        return $readers;
    }
    public function delete($id)
    {
        $readers = $this->readers->find($id);
        $readers->delete();
    }




}
