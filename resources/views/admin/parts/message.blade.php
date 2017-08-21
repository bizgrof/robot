@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red">{{ $error }}</li>
        @endforeach
    </ul>
@endif
@if(session('success'))
    <p class="text-green">{{session('success')}}</p>
@endif