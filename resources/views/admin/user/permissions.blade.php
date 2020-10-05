@extends("layouts.admin")

@section("title",  $user->name . " - Permissions")

@section("content")


<form method="post" action='{{ route("permissions-post",$user->id) }}'>
    @csrf
    <div class="card-body">
        <div>
            <ul class='list-unstyled'>
                @foreach($links->where('parent_id',0) as $link)
                    <li>
                        <label>
                            <input {{ $link->users->contains($user)?"checked":"" }} name='permissions[]' type='checkbox' value='{{$link->id}}' />
                            <b>{{$link->title}}</b>
                        </label>
                        @if($link->subMenus->count()>0)
                            <ul class='list-unstyled'>
                            @foreach($link->subMenus as $subLink)
                                <li>
                                    <label>
                                        <input name='permissions[]'{{ $subLink->users->contains($user)?"checked":"" }}  type='checkbox' value='{{$subLink->id}}' />
                                        {{$subLink->title}}
                                    </label>
                                </li>
                            @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer mt-4">
            <button type="submit" class="btn btn-primary">Save Permissions</button>

            <a class='btn btn-default' href='{{ route("users.index") }}'>Cancel</a>
        </div>
    </div>
</form>

@endsection
