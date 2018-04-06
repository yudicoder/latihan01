@extends('shared.layout')

@section('content')
{{--  <div class="container">  --}}
    {{--  <title>Laravel Ajax Request using X-editable bootstrap Plugin Example</title>

    <meta name="csrf-token" content={{ csrf_token() }}>  --}}
    <!-- Latest compiled and minified CSS -->
    {{--  <link rel="stylesheet" href="https//maxcdn.boostrapcdn.com/bootsrtrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudfare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>  --}}

    <div class="container">
        <h3>Laravel Ajax Request using X-editable bootstrap Plugin Example</h3>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td><a href="" class="update" data-column="name" data-type="text" 
                    data-url="{{route('update-user',['id'=>$user->id])}}" data-pk="{{$user->id}}" 
                    data-title="Enter name" data-name="name">{{ $user->name }}</a></td>
                <td><a href="" class="update" data-column="email" data-type="email"
                    data-url="{{route('update-user',['id'=>$user->id])}}" data-pk="{{$user->id}}" 
                    {{-- data-url="{{url('update-user/'.$user->id)}}" data-pk="{{ $user->id }}"  --}}
                    data-title="Enter email" data-name="email">{{ $user->email }}</a></td>
                <td>
                    {{ Form::open(['route' => ['delete-user', $user->id], 'method' => 'delete']) }}
                    <button type="submit">Delete</button>
                    {{ Form::close() }}
                    {{-- <button class="btn btn-danger btn-sm">Delete</button> --}}
                </td>
            </tr>
            @endforeach        
        </table>
    </div>


<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline'; //atau popup
    $.fn.editable.defaults.ajaxOptions = {type: "PUT"}
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.update').editable({
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
    

    

