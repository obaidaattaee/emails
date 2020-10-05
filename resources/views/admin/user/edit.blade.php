@extends("layouts.admin")
@section("title", "Edit User")

@section("content")
<form role="form" enctype="multipart/form-data" method="post" action="{{ route("users.update", $users->id)  }}">

        @method('PATCH')
        @csrf


    <div class="form-group">
        <label for="name">name</label>
        <input  type="text" value="{{ $users->name}}" autofocus class="form-control" id="name" name="name" placeholder="Enter your name">
    </div>



    <div class="form-group">
        <label for="email">email</label>
        <input  type="email" value="{{ $users->email }}" class="form-control"  id="email" name="email" placeholder="Enter email">
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input  type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>




    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
        <a class='btn btn-default' href='{{ route("users.index") }}'>Cancel</a>
    </div>
</form>

@endsection
@section("js")



@endsection
