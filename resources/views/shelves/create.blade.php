@extends('main.main')

@section('content')
    <div class="container">

        <form method = "POST" action="{{ route('shelves.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Name">
            </div>

            <input type="submit" class="btn btn-success" value="Save">

        </form>
    </div>



@endsection

