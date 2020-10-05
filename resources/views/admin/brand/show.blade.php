@extends("layouts.admin")

@section("title","Show Brand")


@section("content")


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input  type="string"  readonly class="form-control" id="title" name="title" value="{{$brands->title}}">
            </div>



            <div>

                <a class='btn btn-danger' href='{{route('brands.index')}}'>Back</a>
            </div>
        </div>
    </form>
@endsection
