<?php

namespace App\Http\Services;

use App\Models\Condition;

class ConditionService
{
    private Condition $condition;

    public function __construct(Condition $condition)
    {
        $this->condition = $condition;
    }

    public function getAll()
    {
        return $this->condition->all();
    }

    public function getById($id)
    {
        return $this->condition->find($id);
    }

    public function create($request)
    {
        return $this->condition->create([
            'name' => $request->name,
        ]);
    }

    public function update($id, $request)
    {
        $condition = $this->condition->find($id);
        $condition->update([
            'name' => $request->name,
        ]);
        return $condition;
    }

    public function delete($id)
    {
        $condition = $this->condition->find($id);
        $condition->delete();
    }

}
