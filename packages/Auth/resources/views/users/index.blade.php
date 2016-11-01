@extends('cms::layouts.app')

@section('content')
        {!! $dataTable->table() !!}

        <button type="button"
                data-url="/users/3"
                role="modal-remote"
                data-confirm-title="Xác nhận thao tác?"
                data-confirm-message="Bạn chắc chắn xóa các đối tượng đã chọn?"
                data-request-method="delete"
                class="btn btn-info btn-lg">Delete
        </button>
        <a href="/users/create" title="Thêm mới" role="modal-remote">Thêm mới</a>
        <a href="/users/1/edit" title="Xem chi tiết" role="modal-remote">Chỉnh sửa</a>
        <div id="ajaxCrubModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông tin người dùng</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <script>
            //                $('#frmUser').trigger('reset');
        </script>
    @stop

    @push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
    @endpush