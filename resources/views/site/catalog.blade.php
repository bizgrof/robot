@extends('site.layouts.app')


@section('content')

    @include('site.parts._banner')

    <div class="container">
        @include('site.parts.catalog._sidebar')
        <div class="content">

            @include('site.parts.catalog._toolbar')

            @each('site.parts.catalog._product_item',$products,'product')

        </div>
        {{ $products->links() }}
    </div>

@endsectiongit