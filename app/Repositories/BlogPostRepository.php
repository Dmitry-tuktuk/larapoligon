<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository.
 *
 * @package App\Repositories
 */
class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     * (Админка)
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $relust = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            /*жадная загрузка*/
            ->with([
                    'category' => function ($query) {
                    $query->select(['id','title']);
                    },
                    'user:id,name'
                  ])
            ->paginate(25);

        return $relust;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

}
