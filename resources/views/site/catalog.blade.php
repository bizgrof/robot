@extends('site.layouts.app')


@section('content')

    @include('site.parts._banner')

    <div class="container">
        @include('site.parts.catalog._sidebar')
        <div class="content">

            @include('site.parts.catalog._toolbar')

            @for($i = 0; $i < 10; $i++)
                @include('site.parts.catalog._product_item')
            @endfor

        </div>
    </div>

@endsection