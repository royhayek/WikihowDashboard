<div class="card-body" style="margin: 25px 25px">
    <form method="post" action="" autocomplete="off">
        @csrf
        @method('put')

        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <?php $y = 0; ?>
        @foreach($articleMethods as $method)
        <div class="row" style="display: flex;justify-content: space-between;">
            <div class="row" style="margin-left: 10px; margin-right: 20px">
                <div class="row">
                    <div class="col">
                        <h3 style="font-size: 20px;">{{ $method->number }} </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="editArticleMethod({{ $method }})" style="background-color: #2dce89; color: white; border-radius: 5px;">Edit</a>
                </div>
                <div class="row" style="margin-left: 20px; margin-right: 20px">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="removeQuestion({{ $method->id }});" style="background-color: #2dce89; color: white; border-radius: 5px;">Delete</a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            @if($method->image != null)<img src="/uploads/articles/methods/{{ $method->image }}" alt="...">@endif
        </div>
        <br>
        <div class="row">
            <div class="col">
                <h3>{!! $method->description !!}</h3>
            </div>
        </div>

        <hr>

        {{-- <table style="table-layout:fixed;border: 0px;" class="table table-bordered table-flush">
            <tbody>
                @if(count($groups['questions'][$y]) > 0)
                @foreach($groups['questions'][$y] as $i => $row)
                <tr>
                    <td style="border: 0px;font-weight: bold;font-size: 15px;padding: 0.7rem;">{{ $i + 1}}.</td>
        <td style="text-align: end;border: 0px;font-size: 15px;padding: 0.7rem;">
            {{ $row->question->mark == 1 ? $row->question->mark .' Mark' : $row->question->mark .' Marks'}}
        </td>
        </tr>
        <tr>
            <td colspan="2" style="white-space: inherit;border: 0px;padding: 0.7rem;">{!!
                $row->question->question !!}
            </td>
        </tr>
        @if($row->question->type->type == 'Fill In The Blanks')
        @foreach($row->question->options->chunk(2) as $options)
        <tr style="white-space: inherit;padding: 0.7rem;">
            @foreach($options as $option)
            <td style="border: 0px;padding: 0.7rem;"><input type="checkbox" disabled {{ $option->correct == 1 ?
                        'checked' : '' }}>&nbsp;&nbsp;&nbsp;<input type="text" value="{{ $option->value }}" disabled>
            </td>
            @endforeach
        </tr>
        @endforeach
        @elseif($row->question->type->type == 'Single Answer')
        @foreach($row->question->options->chunk(2) as $options)
        <tr style="white-space: inherit;">
            @foreach($options as $option)
            <td style="border: 0px;padding: 0.7rem;">
                <input type="radio" disabled {{ $option->correct == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;
                @if($option->value != null)<input type="text" value="{{ $option->value }}" disabled>&nbsp;&nbsp;&nbsp;@endif
                @if($option->image != null)<img width="50" height="50" src="/uploads/bankoptions/{{ $option->image }}" alt="...">@endif
            </td>
            @endforeach
        </tr>
        @endforeach
        @else($row->question->type->type == 'Multi Answer')
        @foreach($row->question->options->chunk(2) as $options)
        <tr style="white-space: inherit;">
            @foreach($options as $option)
            <td style="border: 0px;padding: 0.7rem;">
                <input type="checkbox" disabled {{ $option->correct == 1 ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;
                @if($option->value != null)<input type="text" value="{{ $option->value }}" disabled>&nbsp;&nbsp;&nbsp;@endif
                @if($option->image != null)<img width="50" height="50" src="/uploads/bankoptions/{{ $option->image }}" alt="...">@endif
            </td>
            @endforeach
        </tr>
        @endforeach
        @endif
        <tr>
            <td style="border: 0px;">
                <a class="btn btn-sm btn-icon text-red" href="" onclick="removeQuestion({{ $row->question->id }},{{ $data->id }});">
                    <i class="fas fa-trash text-red"></i> Remove Question {{ $i + 1}}
                </a>
                <a style="margin-left: 50%" class="btn btn-sm btn-icon text-blue" href="{{ route('questionbanks.edit', $row->question->id) }}">
                    <i class="fas fa-pen text-blue"></i> Edit Question {{ $i + 1}}
                </a>
            </td>
        </tr>
        @if($i != count($groups['questions'][$y]) - 1)
        <tr>
            <td colspan="2" style="border: 0px;">
                <hr class="my-1" />
            </td>
        </tr>
        @endif
        @endforeach
        @else
        <tr>
            <td colspan="4" style="text-align:center;">No questions added yet, start adding some!</td>
        </tr>
        @endif
        </tbody>
        </table> --}}
        <br>
        <?php $y++; ?>
        @endforeach

    </form>
</div>
