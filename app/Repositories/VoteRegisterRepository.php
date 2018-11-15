<?php

namespace App\Repositories;

use App\Models\VoteRegister;
class VoteRegisterRepository
{
    use BaseRepository;
    protected $model;

    public function __construct(VoteRegister $VoteRegister)
    {
        $this->model = $VoteRegister;
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
            return $this->model->where($where['k1'])->orWhere($where['k2'])->orwhere($where['k3'])->orWhere($where['k4'])->orderBy($sortColumn, $sort)->paginate($pagesize);
        } else {
            return $this->model->orderBy($sortColumn, $sort)->paginate($pagesize);
        }
    }

    
}