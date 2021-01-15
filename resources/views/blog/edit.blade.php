@extends('layouts.app')
@section('title', 'Update Post')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Post</div>

                <div class="card-body">
                    <form method="POST" action="/blog/{{ $blog->slug }}/edit" novalidate>
                        @method('patch')
                        @csrf
                        @include('blog.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection