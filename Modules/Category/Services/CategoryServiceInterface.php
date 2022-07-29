<?php

namespace Modules\Category\Services;

use Modules\Category\Entities\Category;

interface CategoryServiceInterface
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
     * @param  \Modules\Category\Entities\Category  $category
     * @return void
     */
    public function delete(Category $category);
}
