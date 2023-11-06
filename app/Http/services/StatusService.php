<?php

namespace App\Http\Services;

use App\Models\Status;

class StatusService
{
    private Status $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    public function getAll()
    {
        return $this->status->all();
    }

    public function getById($id)
    {
        return $this->status->find($id);
    }

    public function create($request)
    {
        return $this->status->create([
            'name' => $request->name,
        ]);
    }
    public function update($id, $request)
    {
        $status = $this->status->find($id);
        $status->update([
            'name' => $request->name,
        ]);
        return $status;
    }
    public function delete($id)
    {
        $status = $this->status->find($id);
            $status->delete();
    }

}
