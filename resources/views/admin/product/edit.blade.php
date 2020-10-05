@extends("layouts.admin")

@section("title","Create New Product")


@section("content")

    <div class="portlet light ">
        <div class="portlet-body form">

            <form method="post" enctype="multipart/form-data" action="{{ route('products.update',$product->id) }}"
                  role="form">
                @csrf
                @method("PATCH")
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title"
                               value='{{old('title',$product->title)}}' placeholder="Enter your Title">
                    </div>
                </div>
                <div class="form-group has-success">
                    <label for="form_control_1">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option
                                {{old('category_id',$product->category_id)== $category->id?"selected":""}} value='{{$category->id}}'>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-success">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($brands as $brand)
                            <option
                                {{old('brand_id',$product->brand_id)== $brand->id?"selected":""}} value='{{$brand->id}}'>{{$brand->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <div class='col-sm-6'>
                        <label for="imageFile">Image</label>
                        <div class="custom-file">
                            <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                        </div>
                    </div>
                </div>

                <div class="form-body ">
                    <div class="form-group has-success">
                        <label for="old_price">old price</label>
                        <input type="number" class="form-control" value="{{old('old_price',$product->old_price)}}"
                               id="old_price" name="old_price">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="new_price">new price</label>
                    <input type="number" class="form-control" value="{{old('new_price')??$product->new_price}}"
                           id="new_price" name="new_price">
                </div>
                <div class="form-group ">
                    <label for="size">Size</label>
                    <input type="number" class="form-control" value="{{old('size')??$product->size}}" id="size"
                           name="size">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{old('description',$product->description)}}
                    </textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" name='active' class="form-check-input"  {{old('active',$product->active)?"checked":"" }} value='1'  id="active">
                    <label class="form-check-label" for='active'>Active</label>

                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class='btn btn-default' href='{{ route("products.index") }}'>Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
