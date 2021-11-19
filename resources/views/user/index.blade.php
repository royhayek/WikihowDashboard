@extends('generals.table', [
'title' => 'Users',
'addbutton' => 'Add User',
'action_link' => route('user.create'),
'fields' => ['#', 'Avatar', 'Name', 'Email', 'Creation Date'],
])

@section('tbody')
@foreach($data as $i => $user)
<tr>
    <td>{{ $i + 1 }}</td>
    <td scope="row">
        <div class="media align-items-center">
            <a href="#" class="avatar rounded-circle mr-3">
                <img alt="Image placeholder" src="{{ asset('uploads/users/'.$user->avatar) }}">
            </a>
        </div>
    </td>
    <td>{{ $user->name }}</td>
    <td>
        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
    </td>
    <td>{{ $user->created_at }}</td>
    <td class="text-right">
        <div class="dropdown">
            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="{{ route('user.edit', $user) }}">Edit</a>
            </div>
        </div>
    </td>
</tr>
@endforeach

@endsection
