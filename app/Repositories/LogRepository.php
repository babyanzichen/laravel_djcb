<?php

namespace App\Repositories;
use App\Models\log;

class LogRepository
{
    use BaseRepository;
    protected $model;

    public function __construct(Log $log)
    {
        $this->model = $log;
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
            return $this->model->where($where['k1'])->orWhere($where['k2'])->orderBy($sortColumn, $sort)->paginate($pagesize);
        } else {
            return $this->model->orderBy($sortColumn, $sort)->paginate($pagesize);
        }
    }
}