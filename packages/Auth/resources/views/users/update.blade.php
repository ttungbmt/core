@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php
?>


{!! Form::model($user, [
    'method' => $user->exists ? 'PUT' : 'POST',
    'route' => $user->exists ? ['users.update', $user->id] : ['users.store'],
]) !!}

    {!! Form::label('name', 'Tên hiển thị') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

    {!! Form::label('password', 'Mật khẩu') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}

    {!! Form::label('fullname', 'Họ tên') !!}
    {!! Form::text('fullname', $user->infoRepo()->fullname, ['class' => 'form-control']) !!}

{!! Form::close() !!}

