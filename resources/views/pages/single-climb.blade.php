@extends('layouts.app')

@section('content')
    @if ($climb)
        <div class="flex flex-col bg-slate-blue">
            @if ($climb->climb_image)
                <img class="m-4 w-1/2" src="{{ asset('storage/' . $climb->climb_image) }}"
                    alt="{{ $climb->climb_name }} rock climbing route at {{ $climb->climb_location }}">
            @else
            <div class="relative w-1/2 self-center">
                <img class="m-4" src="{{ asset('images/placeholder.png') }}" alt="placeholder image">
                <h2 class="absolute text-3xl text-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">Click Edit Climb To Add An Image</h2>
            </div>
            @endif
            <div class="flex flex-row justify-around text-gray text-2xl">
                <h3>{{ $climb->climb_name }}</h3>
                <h3>{{ $climb->climb_location }}</h3>
                <h3>{{ $climb->climb_grade }}</h3>
            </div>
            <p class="text-center text-gray text-2xl p-2 mt-4">
                {{ $climb->climb_description }}
            </p>
            <a href="/edit-climb/{{ $climb->id }}" class="self-center text-orange border-2 rounded-sm bg-blue p-2 mt-4">
                <i class="fa-solid fa-pen mr-2"></i>EDIT ClIMB!
            </a>
            <div class="flex flex-col m-2">
                <h2 class="m-2 p-1 text-2xl text-gray">Comments & Beta</h2>
                <p class="m-2 border-2 bg-orange rounded-md p-2 w-1/2">Comment one about the climb. Extra text for viewing
                    purposes!</p>
                <p class="m-2 border-2 bg-orange rounded-md p-2 w-1/2">Comment two about the climb. Extra text for viewing
                    purposes!</p>
                <p class="m-2 border-2 bg-orange rounded-md p-2 w-1/2">Comment three about the climb. Extra text for viewing
                    purposes!</p>
            </div>
            <form class="self-center p-2 m-4" method="POST"
                action="/delete-climb/{{ $climb->id }}/{{ $climb->climb_name }}">
                @method('delete')
                @csrf
                <button type="submit" class="text-orange border-2 rounded-sm bg-blue p-2">
                    <i class="fa-solid fa-trash-can mr-2"></i>DELETE ClIMB!
                </button>
            </form>
        </div>
    @else
        <div class="flex flex-col text-3xl text-center bg-slate-blue">
            <h2>This Climb No Longer Exists</h2>
            <a class="text-2xl self-center m-2 w-1/3 border-2 bg-orange w-1/2" href="/view-climbs">Return to All Climbs</a>
        </div>
    @endif
@endsection

{{-- <div class="flex flex-row w-full flex-initial border-4 mb-4 mt-0 pr-2  border-orange bg-gray gap-4 justify-start">
            <img src="{{ URL::asset('images/mr.slate.png') }}" alt="rock climbing route mr.slate in flagstaff, az">
            <div class="flex flex-col md:flex-row flex-wrap gap-2 items-center">
                <div class="text-center w-80 md:text-left mt-1">
                    <h3 class="text-2xl md:mb-2 mr-4"><span class="text-orange underline underline-offset-2">Name:</span>
                        {{ $climb->climb_name }}</h3>
                    <h3 class="text-2xl md:mb-2 mr-4"><span class="text-orange underline underline-offset-2">Location:</span>
                        {{ $climb->climb_location }}</h3>
                    <h3 class="text-2xl md:mb-2 mr-4"><span class="text-orange underline underline-offset-2">Style/Grade:
                        </span> {{ $climb->climb_style }} / {{ $climb->climb_grade }}</h3>
                </div>
                <div class="text-center w-60 justify-self-end">
                        <h3 class="text-2xl md:mb-2 mr-4">Climb <br> Description:</h3>
                        <p>{{$climb->climb_description}}</p>
                        <h3 class="text-2xl md:mb-2 mr-4">Beta & Comments:</h3>
                </div>
                <div class="sm:self-left text-center w-30 p-2">
                    <a>
                        <h3 class="text-2xl">Save Climb <span class="text-3xl text-orange text-end">&#9829</span></h3>
                    </a>
                </div>
            </div>
        </div> --}}
