@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 offset-2">
                <router-view name="codesIndex"></router-view>
                <router-view></router-view>
            </div>
        </div>
    </div>
@endsection
