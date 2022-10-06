@extends('layouts.app')

@section('content')
       @php
                $cragName = explode("/", $climb->climb_location)[0];
                $cragLocation = trim(explode("/", $climb->climb_location)[1]);
        @endphp
    <div class=" flex flex-col gap-1 text-xl bg-slate-blue">
        <h1 class="p-2 text-3xl text-orange">Edit the climb in the form below:</h1>
        <form class="flex flex-col gap-6 bg-orange p-2 m-2 w-2/3 border-2" method='POST' action='/update-climb/{{$climb->id}}' enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="climb-name">Climb Name:</label>
                <input type="text" id="climb-name" name="climb_name" value="{{ $climb->climb_name }}">
            </div>
            <div class="flex flex-row gap-6">
                <div>
                    <label for="crag-name">Crag Name:</label>
                    <input type="text" id="crag-name" name="crag_name" value="{{$cragName}}">
                </div>
                <div>
                    <label for="crag-location">Crag Location:</label>
                    <input class="w-5/6" type="text" id="crag-location" name="crag_location"
                        value="{{$cragLocation}}">
                </div>
            </div>
            <div class="flex flex-row gap-6">
                <div>
                    <label for="climb-style">Climb Style:</label>
                    <select id="climb-style" name="climb_style" value="{{ $climb->climb_style }}">
                        <option value="Sport">Sport</option>
                        <option value="Trad">Trad</option>
                        <option value="Boulder">Boulder</option>
                        <option value="Mix">Mix</option>
                        <option value="Ice">Ice</option>
                        <option value="Aid">Aid</option>
                    </select>
                </div>
                <div>
                    <label for="climb-grade">Climb Grade:</label>
                    <input type="text" id="climb-grade" name="climb_grade" value="{{ $climb->climb_grade }}">
                </div>
            </div>
            <div class="flex flex-row">
                <label for="climb-description">Climb Description:</label>
                <textarea class="m-2 w-2/3 h-2/3" type="text" id="climb-description" name="climb_description">{{ $climb->climb_description }}</textarea>
            </div>
            <div>
                <label for="climb-image">Upload A Climb Picture:</label>
                <input type="file" id="climb-image" name="climb_image">
            </div>
            <input class="self-center bg-slate-blue border-2 rounded-md w-28" type="submit" value="Update Climb">
        </form>
    </div>
@endsection
