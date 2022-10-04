@extends('layouts.app')

@section('content')
    <div class="bg-slate-blue">
        <h1 class="text-3xl p-4 text-orange">{{ $climb_name }} has successfully been deleted!</h1>
        <div class="p-2">
            <a class="text-2xl p-1 m-4 border-2 bg-orange w-1/2" href="/view-climbs">Return to All Climbs</a>
        </div>
    </div>
@endsection
