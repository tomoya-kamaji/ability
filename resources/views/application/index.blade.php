@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-12">
            {{-- @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif --}}
            {{-- form --}}
            <form method="GET" action="{{ route('application.index') }}" class="form-control-lg form-inline">
                <div class="input-group input-group-lg col-md-8">
                    <input class="form-control" name="search" type="search" placeholder="例) Slack,Trelloなど" aria-label="Search" value={{ $search }}>
                </div>
                <div class="input-group input-group-lg col-md-2">
                    <select class="form-control" name="reviw" type="search" placeholder="例) Slack,Trelloなど" aria-label="Search" value={{ $search }}>
                        <option>☆4以上</option>
                        <option>☆3以上</option>
                        <option>☆2以上</option>
                        <option>☆1以上</option>
                    </select>
                </div>
                <div class="input-group input-group-lg col-md-2">
                    <button class="btn btn-outline-success" type="submit">検索</button>
                </div>
            </form>
            

                {{-- <form method="GET" action="{{ route('application.index') }}" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search" value={{ $search }}>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                </form> --}}
                <div class="row mt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">アプリ検索</div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        @foreach ($posts['results'] as $result)
                            <hr color="#797979">
                            @include('application.card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
