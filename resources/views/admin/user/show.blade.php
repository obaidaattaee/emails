@extends("layouts.admin")

@section("title",  "show")

@section("content")




    <div class="form-group">
        <label for="name">name</label>
        <input  type="text" value="{{ $user->name}}" readonly class="form-control" id="name" name="name" placeholder="Enter your name">
    </div>



    <div class="form-group">
        <label for="email">email</label>
        <input  type="email" value="{{ $user->email }}" readonly class="form-control"  id="email" name="email" placeholder="Enter email">
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input  type="text" value="{{ $user->password }}" readonly autofocus class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>



    <div class="card-footer mt-3">

        <a class='btn btn-default' href='{{ route("users.index") }}'>Cancel</a>
    </div>
    </form>
</form>
@endsection
