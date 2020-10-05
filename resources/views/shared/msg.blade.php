<?php
    $msg = \Session::get("msg");
    $msgClass = 'alert-info';
?>
@if($msg)
    <?php
    //اول حرفين من الرسالة وتحويلهم الى حروف صغيرة
    $first2Letters = strtolower(substr($msg,0,2));
    if($first2Letters == 's:'){
        $msgClass = 'alert-success';
        $msg = substr($msg,2);//قص اول حرفين
    }
    else if($first2Letters == 'w:'){
        $msgClass = 'alert-warning';
        $msg = substr($msg,2);//قص اول حرفين
    }
    else if($first2Letters == 'i:'){
        $msgClass = 'alert-info';
        $msg = substr($msg,2);//قص اول حرفين
    }
    else if($first2Letters == 'e:'){
        $msgClass = 'alert-danger';
        $msg = substr($msg,2);//قص اول حرفين
    }
    ?>
    <div class='alert {{$msgClass}} alert-dismissible'>
        {{$msg}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger  alert-dismissible show">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
