@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-9">
                                {{ __('Requests') }}
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('create')}}" class="btn btn-link float-right">Create</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse($requests as $request)
                            <div class="card">
                                <div class="card-header flex">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <h5 style="display: inline;">{{ strtoupper($request->type) }}: </h5>
                                                <a href="{{route('edit', ['id' => $request->id])}}">
                                                    <h5 style="display: inline;">{{$request->name}}</h5>
                                                </a>
                                            </div>
                                            <div class="col-sm">
                                                <p>{{ $request->status }}
                                                    : {{ Carbon\Carbon::parse($request->updated_at)->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <p>{{$request->description}}</p>
                                </div>
                            </div>

                            <br>
                        @empty
                            <div class="alert">
                                <p>No requests exist.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="m-auto">
                        {{$requests->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
