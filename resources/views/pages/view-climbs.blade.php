@extends('layouts.app')

@section('content')
    <div class="bg-slate-blue flex flex-col gap-2 px-24 items-center">
    {{-- {{dd($climbs)}} --}}
        <h1 class="pt-4 text-3xl text-orange">Find Your Climb!</h1>
        @foreach($climbs as $climb)
        <div class="flex flex-row w-full flex-initial border-4 mb-4 mt-0 pr-2  border-orange bg-gray gap-4 justify-start">
            <img src="{{URL::asset('images/mr.slate.png')}}" alt="rock climbing route mr.slate in flagstaff, az">
            <div class="flex flex-col md:flex-row flex-wrap gap-2 items-center">
                <div class="text-center w-80 md:text-left mt-1">
                    <h3 class="text-2xl md:mb-2 mr-4"><span class="text-orange underline underline-offset-2">Name:</span>  {{$climb->climb_name}}</h3>
                    <h3 class="text-2xl md:mb-2 mr-4"><span class="text-orange underline underline-offset-2">Location:</span>  {{$climb->climb_location}}</h3>
                    <h3 class="text-2xl md:mb-2 mr-4"><span class="text-orange underline underline-offset-2">Style/Grade: </span>  {{$climb->climb_style}} / {{$climb->climb_grade}}</h3>
                </div>
                <div class="text-center w-60 justify-self-end">
                    <a href="/single-climb/{{$climb->id}}"><h3 class="text-2xl md:mb-2 mr-4">Climb <br> Description</h3></a>
                    <a href="/single-climb/{{$climb->id}}"><h3 class="text-2xl md:mb-2 mr-4">Beta & Comments</h3></a>
                </div>
                <div class="sm:self-left text-center w-30 p-2">
                    <a><h3 class="text-2xl">Save Climb <span class="text-3xl text-orange text-end">&#9829</span></h3></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

      {{-- <div class="flex flex-row border-4 m-4 mt-0 pr-2 border-orange bg-gray gap-4 justify-between">
            <img src="{{URL::asset('images/mr.slate.png')}}" alt="rock climbing route mr.slate in flagstaff, az">
            <div class="flex flex-col md:flex-row gap-2 md:gap-11 justify-end items-center">
                <div class="text-center md:text-left mt-1">
                    <h3 class="md:mb-2 mr-4">Mr. Slate</h3>
                    <h3 class="md:mb-2 mr-4">The Pit / Flagstaff, AZ</h3>
                    <h3 class="md:mb-2 mr-4">Sport - 5.10b</h3>
                </div>
                <div class="text-center">
                    <a href="/single-climb"><h3 class="md:mb-2 mr-4">Climb <br> Description</h3></a>
                    <a href="/single-climb"><h3 class="md:mb-2 mr-4">Beta & Comments</h3></a>
                </div>
                <div class="sm:self-start p-2">
                    <h3 class="text-3xl">+</h3>
                </div>
            </div>
        </div> --}}