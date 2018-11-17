<?php

namespace App\Repositories;

use App\Models\VoteCategory;

class VoteCategoryRepository
{
    use BaseRepository;
    protected $model;
    
    public function __construct(VoteCategory $VoteCategory)
    {
        $this->model = $VoteCategory;
    }

    /**
     * return  paginate list
     *
     * @param int $pagesize
     * @param string $sort
     * @param string $sortColumn
     * @return mixed
     */
    public function page($where = false, $pagesize = 20, $sortColumn = 'created_at', $sort = 'desc')
    {
        if ($where) {
            return $this->model->where($where['k1'])->orderBy($sortColumn, $sort)->paginate($pagesize);
        } else {
            return $this->model->orderBy($sortColumn, $sort)->paginate($pagesize);
        }
    }

    

   
}