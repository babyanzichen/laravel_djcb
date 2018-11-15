<?php

namespace App\Repositories;

use App\Models\VoteRule;

class VoteRuleRepository
{
    use BaseRepository;
    protected $model;

    public function __construct(Rule $rule)
    {
        $this->model = $rule;
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
            return $this->model->where($where['k'])->orWhere($where['k2'])->orderBy($sortColumn, $sort)->paginate($pagesize);
        } else {
            return $this->model->orderBy($sortColumn, $sort)->paginate($pagesize);
        }
    }

    

   
}