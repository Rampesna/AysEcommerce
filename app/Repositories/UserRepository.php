<?php

namespace App\Repositories;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Traits\Response;

class UserRepository implements UserRepositoryInterface
{
    use Response;

    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc')
    {
        $users = User::skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get();
        return $this->success($users->count() > 0 ? 'Users skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $users);
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return $this->error('User not found', 404);
        return $this->success('User informations', $user);
    }

    /**
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        return $this->success('User saved successfully', $this->save(
            new User,
            $request->name,
            $request->email,
            $request->password
        ));
    }

    /**
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$user = User::find($request->id)) return $this->error('User not found', 404);
        return $this->success('User saved successfully', $this->save(
            $user,
            $request->name,
            $request->email,
            $request->password
        ));
    }

    /**
     * @param User $user
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function save(
        User   $user,
        string $name,
        string $email,
        string $password = null
    )
    {
        $user->name = $name;
        $user->email = $email;
        if ($password) $user->password = bcrypt($password);
        $user->save();

        return $user;
    }

    /**
     * @param int $id
     */
    public function destroy($id)
    {
        if (!$user = User::find($id)) return $this->error('User not found', 404);
        $user->delete();
        return $this->success('User deleted', null);
    }
}
