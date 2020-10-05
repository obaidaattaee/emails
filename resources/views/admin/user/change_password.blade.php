@extends("layouts.admin")
@section('title' , 'change password')
@section("content")
<div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" action="">
                @csrf
                @method("put")
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="password" class="form-control" id="form_control_1" name="current_password" value="">
                        <label for="form_control">Current Password</label>
                    </div>
                </div>
                
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="password" class="form-control" id="form_control_1" name="new_password" value="">
                        <label for="form_control">New Password</label>
                    </div>
                </div>
                
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="password" class="form-control" id="form_control_1" name="new_password_confirmation" value="">
                        <label for="form_control">Re-type New Password</label>
                    </div>
                </div>
                
                <div class="form-actions noborder">
                    <button type="submit" class="btn btn-success">Change Password</button>
                    <a type="reset" href="" class="btn default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
