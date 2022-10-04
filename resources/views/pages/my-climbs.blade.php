@extends('layouts.app')

@section('content')
    <div class="flex flex-col bg-slate-blue">
        {{-- {{dd($userClimbs)}} --}}
        {{-- @php
        echo $userClimbs->name;
        @endphp --}}
        <h1 class="text-orange text-3xl m-4">{{ $userClimbs->name }}'s Climbs:</h1>
        @foreach ($userClimbs->climbs as $climb)
            <div class="flex flex-row justify-between bg-gray m-4 p-3 w-2/3 border-2 border-orange text-xl">
                <a href="single-climb">
                    <h2>{{ $climb->climb_name }}</h2>
                </a>
                <h2>{{ $climb->climb_style }} / {{ $climb->climb_grade }}</h2>
                <label class="" for="climb-status">Select Your Climb-Status:</label>
                <select name="climb-status" id="climb-status" placeholder={{ $climb->climb_status }}>
                    <option value="to-do">To-Do</option>
                    <option value="in-progress">In-Progress</option>
                    <option value="completed">Completed</option>
                    <option value="none">None</option>
                </select>
                <input class="bg-slate-blue border-2 rounded-md p-1 w-28" type="submit" value="Update Status">
            </div>
        @endforeach
        <a href="/view-climbs" class="self-center border-2 bg-orange rounded-md w-32 p-3 m-2 text-xl text-center">Save A Climb</a>
    </div>
@endsection
