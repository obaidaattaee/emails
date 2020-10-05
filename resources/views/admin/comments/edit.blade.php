@extends("layouts.admin")

@section("title","Edit New Comment")

@section("content")


    <form method="post" action="{{ route('comments.update' , $comments->id) }}" role="form">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="name">name</label>
                <input  type="text"  readonly  class="form-control" id="name" name="name" value="{{$comments->name??''}}">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input  type="email" readonly  class="form-control" id="email" name="email" value="{{$comments->email??''}}">
            </div>
            <div class="form-group">
                <label for="website">website</label>
                <input  type="text"  readonly  class="form-control" id="website" name="website" value="{{$comments->website??''}}">
            </div>
            <div class="form-group">
                <label for="comment">comment</label>
                <textarea  readonly  class="form-control" id="comment" name="comment" placeholder="Enter comment">{{$comments->comment??''}}</textarea>
            </div>
            <div class="form-group">
                <label for="blog">blog id</label>
                <input  type="number"  class="form-control" id="blog" name="blog_id" value="{{$comments->blog_id??''}}">
            </div>
            <div class="form-group">
                <input  type="checkbox"   id="published" name="published" {{$comments->published?'checked':''}} >
                <label for="published">published</label>

            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-danger' href='{{route('comments.index')}}'>Cancel</a>
            </div>
        </div>
    </form>
@endsection
