<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc');

    /**
     * @param int $id
     */
    public function show($id);

    /**
     * @param \App\Http\Requests\User\StoreRequest $request
     */
    public function store(\App\Http\Requests\User\StoreRequest $request);

    /**
     * @param \App\Http\Requests\User\UpdateRequest $request
     */
    public function update(\App\Http\Requests\User\UpdateRequest $request);

    /**
     * @param \App\Models\User $user
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function save(\App\Models\User $user, string $name, string $email, string $password);

    /**
     * @param int $id
     */
    public function destroy($id);
}
