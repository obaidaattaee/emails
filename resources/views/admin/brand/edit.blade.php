@extends("layouts.admin")

@section("title", "Edit Brand")

@section("content")
<div class="portlet light ">
        <div class="portlet-body form">
<form role="form" method="post" enctype="multipart/form-data" action="{{ route('brands.update', $brand->id) }}" role="form">
    @csrf
    @method("put")

               <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="text" class="form-control" id="form_control_1" name="title" value="{{ $brand->title }}">
                        <label for="form_control_1">Title</label>

                    </div>
                </div>
    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
        <a class='btn btn-default' href='{{ route("brands.index") }}'>Cancel</a>
    </div>

           </form>
        </div>
     </div>
@endsection
