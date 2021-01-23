@extends('layouts.app')
@section('title', 'New Post')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post</div>

                <div class="card-body">
                    <form method="POST" action="{{route('blog.store')}}" novalidate enctype="multipart/form-data">
                        @csrf
                        @include('blog.form', ['submit' => 'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection