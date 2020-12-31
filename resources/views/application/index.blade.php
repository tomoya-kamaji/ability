@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="GET" action="{{ route('application.create') }}">
                        <button type="submit" class="btn btn-primary">
                            新規登録
                        </button>
                    </form>

                    @foreach ($applications as $application)
                    @if(($loop->iteration - 1) % 3 == 0 || $loop->first)
                    <div class="card-deck p-2">
                        @endif
                        <div class="card">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                                <title>{{ $application -> application_name }}</title>
                                <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text>
                            </svg>
                            <div class="card-body">
                                <h5 class="card-title">{{ $application -> application_name }}</h5>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">ユーザ</small>
                                <a href="" class="btn btn-success btn-sm">♡<span class="badge">3</span></a>
                                <a href="" class="btn btn-success btn-sm">コメント<span class="badge">3</span></a>
                            </div>
                        </div>



                        @if($loop->iteration % 3 == 0 || $loop->last)
                    </div>
                    @endif


                    @endforeach

                    {{ $user -> name }}


                    <button type="button" class="btn btn-info rounded-circle p-0" style="width:4rem;height:4rem; position: fixed; bottom: 100px; right: 100px; ">＋</button>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
