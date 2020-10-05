@extends("layouts.admin")

@section("title", "Create user")

@section("content")
<form method="post" enctype="multipart/form-data" action="{{ route('users.store') }}" role="form">
    @csrf

    <div class="card-body">

            <div class="form-group">
                <label for="name">name</label>
                <input  type="text" value="{{old('name')}}" autofocus class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>



            <div class="form-group">
                <label for="email">email</label>
                <input  type="email" value="{{old('email')}}" class="form-control"  id="email" name="email" placeholder="Enter email">
            </div>

        <div class="form-group">
            <label for="password">password</label>
            <input  type="password" value="{{old('password')}}" autofocus class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>




        <div class="card-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a class='btn btn-default' href='{{ route("users.index") }}'>Cancel</a>
    </div>
    </div>
</form>
@endsection

@section("js")



@endsection
