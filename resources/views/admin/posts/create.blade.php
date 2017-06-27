@extends('layouts.back.master')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-2"><a href="{{route('dashboard')}}">Articles</a></h1>

        <h2 class="title is-4">Nouvel article</h2>

        @include('admin.posts._post_form')

    </div>
</div>
@endsection