@extends("layouts.admin")

@section("title","Show Order Details")


@section("content")
    <div class="col-2">

        <a href="{{ route('orders.index') }}" class="btn btn-success">Back Orders Manege</a>
    </div>
    <div class="portlet grey-cascade box">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Order Details </div>

        </div>
        <div class="portlet-body">
            <div class="row static-info">
                <div class="col-md-5 name"> Order #: </div>
                <div class="col-md-7 value"> {{$order->id}}
                </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> Order Date &amp; Time: </div>
                <div class="col-md-7 value"> {{$order->product->title}} </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> Order Date &amp; Time: </div>
                <div class="col-md-7 value"> {{$order->created_at}} </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> Order Status: </div>
                <div class="col-md-7 value">
                    <span class="label label-success"> {{--{{$order->orderStatus->title}}--}} </span>
                </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name">  Total: </div>
                <div class="col-md-7 value">{{$order->total_price}} $</div>
            </div>


            <div class="row static-info">
                <div class="col-md-5 name"> Customer Name: </div>
                <div class="col-md-7 value"> {{$order->user->name}} </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> Email: </div>
                <div class="col-md-7 value"> jhon@doe.com </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> State: </div>
                <div class="col-md-7 value"> New York </div>
            </div>
            <div class="row static-info">
                <div class="col-md-5 name"> Phone Number: </div>
                <div class="col-md-7 value"> 12234389 </div>
            </div>
        </div>
    </div>



@endsection
