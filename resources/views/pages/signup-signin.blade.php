@extends('layouts.app')

@section('content')
    <div class="p-4 flex flex-col gap-1 text-xl bg-slate-blue">
        <h1>Complete the form below to sign-up</h1>
        <form class="flex flex-col gap-6 bg-orange p-2 m-2 w-2/3 border-2" action="/signup" method="POST">
            <label for="username">Create A Username:</label>
            <input type="text" id="username" name="username">

            <label for="email">Enter Email:</label>
            <input type="text" id="email" name="email">

            <label for="password">Create A Password:</label>
            <input type="password" id="password" name="password">

            <input class="self-center bg-slate-blue border-2 rounded-md w-28" type="submit" value="Sign-Up">
        </form>
    </div>
    <div class="p-4 flex flex-col gap-1 text-xl bg-slate-blue">
        <h1>Complete the form below to sign-in</h1>
        <form class="flex flex-col gap-6 bg-orange p-2 m-2 w-2/3 border-2" action="/signup" method="POST">
            <label for="username">Enter Username:</label>
            <input type="text" id="username" name="username">

            <label for="email">Enter Email:</label>
            <input type="text" id="email" name="email">

            <label for="password">Enter Password:</label>
            <input type="password" id="password" name="password">

            <input class="self-center bg-slate-blue border-2 rounded-md w-28" type="submit" value="Sign-In">
        </form>
    </div>
@endsection
