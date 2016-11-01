<?php
namespace Lara\Auth\App\Http\Controllers;

use CMS\App\Http\Controllers\AdminController;
use Lara\Auth\App\DataTables\UsersDataTable;
use Lara\Auth\App\Http\Requests\UserRequest;
use Lara\Auth\App\Models\User;
use Lara\Auth\App\Notifications\UserLogined;
use PHPExcel_Cell;

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


    /**
     * Xuất file Excel
     * @param string $type
     * @return mixed
     */
    public function exportTo($type = 'xlsx'){
        $data = collect(User::all()->toArray())->map(function ($item) {
            return array_dot($item);
        });

        // Xử lý định dạng
        $format = in_array($type, ['xls', 'xlsx', 'csv', 'pdf']) ? $type : 'csv';
        $excel = \Excel::create('user_excel', function($excel) use ($data) {

            $excel->sheet('userSheet', function($sheet) use ($data) {
                // Xử lý Range
                $num = count(array_dot(array_first($data)))-1;
                $end = PHPExcel_Cell::stringFromColumnIndex($num);

                $range = "A1:{$end}1";
                $sheet->setAutoFilter($range);
                $sheet->setAutoSize(true);
                $sheet->cells($range, function($cells) {
                    $cells->setFont(['size' => '11', 'bold' => true]);
                    $cells->setAlignment('center');
                    $cells->setFontColor('#ffffff');
                    $cells->setBackground('#00b050');
                });

                $sheet->with($data);
            });
        })->download($type);

        return $excel;
    }
}