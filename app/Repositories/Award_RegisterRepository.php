<?php

namespace App\Repositories;

use App\Models\award_register;

class Award_RegisterRepository
{
    use BaseRepository;
    protected $model;

    public function __construct(Award_Register $award_register)
    {
        $this->model = $award_register;
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

    /**
     * Sync the tags for the article.
     * @param array $roleIds
     * @param int $Award_RegisterId
     */
    public function syncRole($roleIds = [], $Award_RegisterId = 0)
    {
        $this->getById($Award_RegisterId)->roles()->sync($roleIds);
    }

    /**
     * @param $Award_Register
     * @param $password
     * @return mixed
     */
    public function changePassword($Award_Register,$password)
    {
        return $Award_Register->update(['password'=>bcrypt($password)]);
    }

    /**
     * Get the Award_Register by name.
     *
     * @param  string $name
     * @return mixed
     */
    public function getByName($Award_Register_name)
    {
        return $this->model
            ->where('Award_Register_name', $Award_Register_name)
            ->first();
    }
}