@extends('main.main')

@section('content')
    <div class="container">

        <form method = "POST" action="{{ route('shelves.update', $shelf->id)  }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Name" value="{{ $shelf->name }}">
            </div>

            <input type="submit" class="btn btn-success" value="Update">

        </form>
    </div>



@endsection

