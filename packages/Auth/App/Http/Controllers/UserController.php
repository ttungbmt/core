<?php
namespace Lara\Auth\App\Http\Controllers;

use Auth;
use CMS\App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Lara\Auth\App\DataTables\UsersDataTable;
use Lara\Auth\App\Http\Requests\UserRequest;
use Lara\Auth\App\Models\User;
use Lara\Auth\App\Models\UserInfo;
use Lara\Auth\App\Notifications\UserLogined;

class UserController extends AdminController
{

    public function __construct()
    {

    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('auth::users.index');
    }

    public function create(User $user)
    {
        return [
            'title'   => 'Thêm mới người dùng ',
            'content' => view('auth::users.update', compact('user'))->render(),
            'footer'  => '<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button> <button data-action="reset" type="button" class="btn btn-default">Xóa</button> <button type="submit" class="btn btn-primary">Thêm mới</button>'
        ];
    }

    public function store(UserRequest $request, User $user)
    {
        $user = $user->create($request->all());
        $user->info()->create($request->all());

        return redirect()->route('users.show', $user->id);
    }

    public function show(User $user)
    {
        return [
            'title'   => 'Thông tin người dùng',
            'content' => view('auth::users.show', compact('user'))->render(),
            'footer'  => '<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button> <button id="resetFrm" type="button" class="btn btn-default">Xóa</button> <a class="btn btn-primary" href="/users/1/edit" role="modal-remote">Cập nhật</a>'
        ];
    }

    public function edit(User $user)
    {
        return [
            'title'   => 'Thông tin người dùng',
            'content' => view('auth::users.update', compact('user'))->render(),
            'footer'  => '<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button> <button data-action="reset" type="button" class="btn btn-default">Xóa</button> <button type="submit" class="btn btn-primary">Cập nhật</button>'
        ];
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all())->save();
        $user->info->fill($request->all())->save();

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
//        $user->forceDelete();
        return [
            'forceClose' => true,
//            'forceReload' => true
        ];
    }
}