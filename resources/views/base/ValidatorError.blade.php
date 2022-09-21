@if($errors AND count($errors))
<div class="" style="color:red" >Error:<br>
    <ul class="list-group list-group-flush" style=''>
        @foreach($errors->all() as $err)
            <li class="list-group-item" style="color:red"> {{ $err }} </li>
        @endforeach
    </ul>
</div>  
@endif