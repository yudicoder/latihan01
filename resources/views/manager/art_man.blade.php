@extends('shared.layout')

@section('content')
    <div class="container">
        <h3>Article Manager</h3>
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td><a href="" class="update" data-column="title" data-type="text" 
                    data-url="{{route('status.update',['id'=>$article->id])}}" data-pk="{{$article->id}}" 
                    data-title="Title" data-name="title">{{ $article->title }}</a></td>
                <td><a href="" class="update" data-column="content" data-type="textarea"
                    data-url="{{route('status.update',['id'=>$article->id])}}" data-pk="{{$article->id}}" 
                    data-title="Content" data-name="Content">{{ $article->content }}</a></td>
                <td><a href="#" class="update" data-column="status" data-type="select" data-value="{{$article->status}}"
                    data-url="{{route('status.update',['id'=>$article->id])}}" data-pk="{{$article->id}}" style="display: Show"
                    data-title="Status" data-name="status">{{ $article->status }}</a></td>
                <td>
                        {{-- <a href="{{route('article.destroy',['id'=>$article->id])}}">Delete</a> |  --}}
                        {{ Form::open(['route' => ['article.destroy', $article->id], 'method' => 'delete']) }}
                        <button type="submit">Delete</button>
                        {{ Form::close() }}
                    {{-- <button class="btn btn-danger btn-sm" data-url="{{route('article.destroy',['id'=>$article->id])}}">Delete</button> --}}
                </td>
            </tr>
            @endforeach        
        </table>
    </div>


<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline'; //atau popup
    // $.fn.editable.defaults.ajaxOptions = {type: "PUT"}
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.update').editable({
            source: [
                {value: 'Show', text: 'Show'},
                {value: 'Hide', text: 'Hide'},
            ],
            ajaxOptions:{
                type:'put'
            },
            params:function(params) {
                // add additional params from data-attributes of trigger element
                params.name = $(this).editable().data('name');
                return params;
            },
            error:function(response, newValue) {
                if(response.status === 500) {
                    return 'Server error. Check entered data.';
                } else {
                    return response.responseText;
                    //return "Error.";
                }
            }
            // url: '/update-user',
            // type: 'text',
            // pk: 1,
            // name: 'name',
            // title: 'Enter name'
        });
    })
</script>
@endsection
    

    

