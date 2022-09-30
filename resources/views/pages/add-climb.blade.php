@extends('layouts.app')

@section('content')
    <div class=" flex flex-col bg-slate-blue">
        <h1 class="p-2 text-3xl text-orange">Complete this form to submit a new climb to the site:</h1>
        <form class="flex flex-col gap-2 bg-orange p-2 m-2 w-1/2 border-2">
            <div>
                <label for="climb-name">Climb Name:</label>
                <input type="text" id="climb-name" name="climb-name" value="Climb Name">
            </div>
            <div class="flex flex-row">
                <label for="crag-name">Crag Name:</label>
                <input type="text" id="crag-name" name="crag-name" value="Crag Name">
                <label for="crag-location">Crag Location:</label>
                <input type="text" id="crag-location" name="crag-location" value="City, State OR City, Country">
            </div>
            <div class="flex flex-row">
                <label for="climb-style">Climb Style:</label>
                <select id="climb-style" name="climb-style">
                    <option value="Sport">Sport</option>
                    <option value="Trad">Trad</option>
                    <option value="Boulder">Boulder</option>
                    <option value="Mix">Mix</option>
                    <option value="Ice">Ice</option>
                    <option value="Aid">Aid</option>
                </select>
                <label for="climb-grade">Climb Grade:</label>
                <input type="text" id="climb-grade" name="climb-grade" value="5.10a / V4 / A3">
            </div>
            <div>
                <label for="climb-description">Climb Description:</label>
                <textarea type="text" id="climb-description" name="climb-description">What is this climb all about?</textarea>
            </div>
            <div>
                <label for="climb-image">Upload A Climb Picture:</label>
                <input type="file" id="climb-image" name="climb-image" value="Climb Pic!">
            </div>
            <input class="bg-slate-blue border-2 rounded-md w-28" type="submit" value="Submit climb">
        </form>
    </div>
@endsection
