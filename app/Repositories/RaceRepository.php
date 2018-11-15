<?php

namespace App\Repositories;

use App\Models\Race;

class RaceRepository
{
    use BaseRepository;
    protected $model;

    public function __construct(Race $race)
    {
        $this->model = $race;
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
            return $this->model->where($where['k1'])->orWhere($where['k2'])->orWhere($where['k3'])->orderBy($sortColumn, $sort)->paginate($pagesize);
        } else {
            return $this->model->orderBy($sortColumn, $sort)->paginate($pagesize);
        }
    }

    

    /**
     * Get the user by name.
     *
     * @param  string $name
     * @return mixed
     */
    public function getByName($username)
    {
        return $this->model
            ->where('username', $username)
            ->first();
    }
}