@extends('generals.table', [
'title' => 'Categories',
'addbutton' => 'Add Category',
'action_link' => route('category.create'),
'fields' => ['#', 'Icon', 'Name'],
])

@section('tbody')
@foreach($data as $i => $category)
<tr>
    <td>{{ $i + 1 }}</td>
    <td scope="row">
        <div class="media align-items-center">
            <a href="#" class="avatar rounded-circle mr-3">
                <img alt="Image placeholder" src="{{ asset('uploads/categories/'.$category->icon) }}">
            </a>
        </div>
    </td>
    <td>
        <div class="media-body">
            <span class="name mb-0 text-sm">{{ $category->name }}</span>
        </div>
    </td>
    <td class="text-right">
        <div class="dropdown">
            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="{{ route('category.edit', $category) }}">Edit</a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button  class="dropdown-item" ><a onclick="return confirm('Are you sure?')">Delete</a>
                    </button>

               </form>
            </div>
        </div>
    </td>
</tr>
@endforeach

@endsection


