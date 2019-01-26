@if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
       <b> {{$error}}</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
        @endforeach

    @endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif