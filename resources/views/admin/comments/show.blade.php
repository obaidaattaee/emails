@extends("layouts.admin")

@section("title","Show Comment")


@section("content")


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="name">name</label>
                <input  type="text" disabled class="form-control" id="name" name="name" value="{{$comments->name}}">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input  type="email" disabled class="form-control" id="email" name="email" value="{{$comments->email}}">
            </div>
            <div class="form-group">
                <label for="website">website</label>
                <input  type="text" disabled class="form-control" id="website" name="website" value="{{$comments->website}}">
            </div>
            <div class="form-group">
                <label for="comment">comment</label>
                <textarea  class="form-control" disabled id="comment" name="comment" >{{$comments->comment}}</textarea>
            </div>
            <div class="form-group">
                <label for="blog">blog id</label>
                <input  type="number"  class="form-control" disabled id="blog" name="blog_id" value="{{$comments->blog_id}}">
            </div>
            <div class="form-group">
                <input  type="checkbox" disabled  id="published" name="published" {{$comments->published?'checked' : ''}} >
                <label for="published">published</label>

            </div>
            <div>

                <a class='btn btn-danger' href='{{route('comments.index')}}'>Back</a>
            </div>
        </div>
    </form>
@endsection
