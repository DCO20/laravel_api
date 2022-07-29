<?php

namespace Modules\Category\Services;

use Illuminate\Support\Facades\DB;
use Modules\Category\Services\Actions\CategoryAction;
use Modules\Category\Services\Actions\CategoryDeleteAction;

class CategoryService implements CategoryServiceInterface
{
    protected $category;

    protected $category_delete;

    public function __construct(
        CategoryAction $category,
        CategoryDeleteAction $category_delete
    ) {
        $this->category = $category;
        $this->category_delete = $category_delete;
    }

    /**
     * Cria e/ou atualiza o registro
     *
     * @param  array  $request
     * @param  null|int  $id
     * @return mixed
     */
    public function updateOrCreate($request, $id = null)
    {
        DB::beginTransaction();

        try {
            $category = $this->category->handle($request, $id);

            DB::commit();

            return $category;
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     *
     * @param  \Modules\Category\Entities\Category  $category
     * @return void
     */
    public function delete($category)
    {
        DB::beginTransaction();

        try {
            $this->category_delete->handle($category);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
