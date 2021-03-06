@extends('layouts.app')

@section('content')
    
    <div class="container con-css">
        <form action="{{ url('/') }}" >
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><p class="text-justify">Title</p></th>
                        <th scope="col"><input class="form-control" type="text" name="title" id="title" value="{{$post->title}}"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col"><p class="text-justify">Description</p></th>
                        <th scope="col"><input class="form-control" type="text" name="description" id="description" value="{{$post->description}}"></th>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"><input class="btn btn-primary form-control" type="submit" value="Update"></th>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection