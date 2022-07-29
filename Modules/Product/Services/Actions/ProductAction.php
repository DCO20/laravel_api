<?php

namespace Modules\Product\Services\Actions;

use Modules\Product\Entities\Product;

class ProductAction
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
            'slug' => $request['slug'],
            'active' => $request['active'],
            'price' => $request['price'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
        ];

        if (isset($request['image'])) {
            $data += ['image' => $request['image']->store('products')];
        }

        return Product::updateOrCreate(['id' => $id], $data);
    }
}
