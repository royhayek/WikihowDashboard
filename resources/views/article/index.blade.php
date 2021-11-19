@extends('generals.table', [
'title' => 'Articles',
'addbutton' => 'Add Article',
'action_link' => route('article.create'),
'fields' => ['#', 'Author', 'Title', 'Views', 'Created at', 'Updated At'],
])

@section('tbody')
@foreach($data as $i => $article)
<tr>
    <td style="white-space: inherit;width: 10%">{{ $i + 1 }}</td>
    <td style="white-space: inherit>
        <div class=" media-body">
        <span class="name mb-0 text-sm">{{ $article->author->name }}</span>
        </div>
    </td>
    <td style="white-space: inherit;width: 50%">
        <div class="media-body">
            <span class="name mb-0 text-sm">{{ $article->title
                }}</span>
        </div>
    </td>
    <td style="white-space: inherit">
        <div class=" media-body">
            <span class="name mb-0 text-sm">{{ $article->views }}</span>
        </div>
    </td>
    <td style="white-space: inherit">
        <div class=" media-body">
            <span class="name mb-0 text-sm">{{ $article->created_at }}</span>
        </div>
    </td>
    <td style="white-space: inherit">
        <div class=" media-body">
            <span class="name mb-0 text-sm">{{ $article->updated_at }}</span>
        </div>
    </td>
    <td class="text-right" style="white-space: inherit">
        <a class=" btn btn-sm btn-icon-only text-light" href="{{ route('article.show', $article) }}" role="button">
            <i class="fas fa-plus-square text-green"></i>
        </a>
        <div class="dropdown">
            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="{{ route('article.edit', $article) }}">Edit</a>
                <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="dropdown-item"><a onclick="return confirm('Are you sure?')">Delete</a>
                    </button>

                </form>
            </div>
        </div>
    </td>
</tr>
@endforeach

@endsection
