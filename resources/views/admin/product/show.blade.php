@extends("layouts.admin")
@section("title", "Show Product")
@section("content")


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" disabled class="form-control" id="title" name="title" value="{{$products->title}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea  class="form-control" disabled id="description" name="description" >{{$products->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="old_price">Old Price</label>
                <input  type="text" disabled class="form-control" id="old_price" name="old_price" value="{{$products->old_price}}">
            </div>
            <div class="form-group">
                <label for="comment">New Price</label>
                <input  type="text" disabled class="form-control" id="new_price" name="new_price" value="{{$products->new_price}}">            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input  type="number"  class="form-control" disabled id="size" name="size" value="{{$products->size}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                @if($products->image)
                    <img src='{{ asset("storage/".$products->image) }}' width='280' class='img-thumbnail' />
                @endif
            </div>
            <div class="form-group">
                <select class="form-control {{$errors->has('category_id')?'is-invalid':''}}" id="exampleFormControlSelect1" name="category_id" id="category_id"  >
                    <option value="">Select The Category..</option>
                    @foreach($categories as $category )
                        <option {{old('category_id')?"selected":""}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input  type="checkbox" disabled  id="active" name="active" {{$products->active?'checked' : ''}} >
                <label for="published">Active</label>

            </div>
            <div>

                <a class='btn btn-danger' href=''>Back</a>
            </div>
        </div>
    </form>
@endsection
