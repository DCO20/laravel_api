<?php

namespace Modules\Category\Services\Actions;

use Modules\Category\Entities\Category;

class CategoryAction
{
    /**
     * Cria e/ou atualiza o registro
     *
     * @param  array  $request
     * @param  int|null  $id
     * @return mixed
     */
    public function handle($request, $id)
    {
        $data = [
            'name' => $request['name'],
            'active' => $request['active'],
        ];

        return Category::updateOrCreate(['id' => $id], $data);
    }
}
