@extends("layouts.admin")

@section("title", "Create Brand")



@section("content")
<div class="portlet light ">
        <div class="portlet-body form">
<form method="post" enctype="multipart/form-data" action="{{ route('brands.store') }}" role="form">

    @csrf
               <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title" value="{{old('title')}}" placeholder="Enter your Brand Title">

                    </div>
                </div>

    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("brands.index") }}'>Cancel</a>
    </div>
</form>
</div>
    </div>
@endsection

