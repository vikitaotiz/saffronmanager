@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 panel">
            <div class="card">
                <div class="card-header">Messenger</div>

                <div class="card-body" id="app">
                    <chat-app :user="{{ auth()->user() }}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection