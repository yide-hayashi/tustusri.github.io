@extends("base.SettingPopuplayout")

@section('PopupName',$PopNameTag[1])

@section("PopupBody")
<h2 class="text-uppercase">{{$SettingName}}</h2>

<form action="managerpage/upload" method="put" enctype="multipart/form-data">
    <ul class="list-inline">
        <li>
                {!! csrf_field() !!}
        
        </li>
        <li>
            <br>
            <button class="btn btn-success btn text-uppercase active" data-bs-dismiss="modal" type="submit">
                <i class="fa fa-file"></i>
                上傳
            </button>
        </li>
    </ul>
</form>
@endsection