<?php

namespace Modules\Product\Services;

use Modules\Product\Entities\Product;

interface ProductServiceInterface
{
    /**
     * Cria e/ou atualiza o registro
     *
     * @codeCoverageIgnore
     *
     * @param  array  $request
     * @param  int|null  $id
     * @return void
     */
    public function updateOrCreate($request, $id = null);

    /**
     * Exclui o registro
     *
     * @codeCoverageIgnore
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function delete(Product $product);
}
