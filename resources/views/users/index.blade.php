@extends('layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ユーザ編集</div>
                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('users.profile') }}" enctype="multipart/form-data"> --}}
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="photo">
                        <input type="submit">
                    </form>
                    @if ($is_image)

                    <figure>
                        <img src="/storage/profile_images/{{ Auth::id() }}.jpg" class="rounded-circle" width="150px" height="150px">
                        <figcaption>現在のプロフィール画像</figcaption>
                    </figure>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
