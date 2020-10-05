@extends("layouts.admin")

@section("title","Create New Comment")


@section("content")


    <form method="post" action="{{ route('comments.store') }}" role="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">name</label>
                <input  type="text"  class="form-control" id="name" name="name" placeholder="Enter comment Name">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input  type="email"  class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="website">website</label>
                <input  type="text"  class="form-control" id="website" name="website" placeholder="Enter website">
            </div>
            <div class="form-group">
                <label for="comment">comment</label>
                <textarea  class="form-control" id="comment" name="comment" placeholder="Enter comment"></textarea>
            </div>
            <div class="form-group">
                <label for="blog">blog id</label>
                <input  type="number"  class="form-control" id="blog" name="blog_id" placeholder="Enter blog">
            </div>
            <div class="form-group">
                <input  type="checkbox"   id="published" name="published" >
                <label for="published">published</label>

            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class='btn btn-danger' href='{{route('comments.index')}}'>Cancel</a>
            </div>
        </div>
    </form>
@endsection
