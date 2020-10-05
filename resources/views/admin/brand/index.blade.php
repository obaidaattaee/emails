@extends("layouts.admin")
@section("title", "Manage Brand")
@section("content")
    <div class="portlet light ">

        <form class="portlet-body">
            <div class='row'>
                <div class="col-sm-8">
                    <input name="q" autofocus type="text" placeholder="Enter your search"
                           value='{{ request()->get("q") }}' class="form-control"/>
                </div>


                <div class="col-sm-3">
                    <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                    <a href="{{ route('brands.create') }}" class='btn btn-success'><i class='fa fa-plus'></i> Add New
                        Brand</a>
                </div>
            </div>
        </form>
        <hr>
        @if($brands->count()>0)
            <div class="table-scrollable">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> Title</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->title }}</td>


                            <td width="20%">
                                <form method="post" action="{{ route('brands.destroy', $brand->id) }}">
                                    <a href="{{ route("brands.show", $brand->id) }}" class="btn btn-info btn-sm"><i
                                            class='fa fa-eye'></i></a>

                                    <a href="{{ route("brands.edit", $brand->id) }}" class="btn btn-primary btn-sm"><i
                                            class='fa fa-edit'></i></a>

                                    <button onclick='return confirm("Are you sure ?")' type="submit"
                                            class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $brands->links() }}
        @else
            <div class='alert alert-warning'>Sorry, there is no results to your search</div>
        @endif
    </div>

    </div>

@endsection
