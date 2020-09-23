@extends('main.main')

@section('content')
    <div class="container">
        <a href="{{ route('shelves.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
        <form method = "POST" action="{{ route('shelves.update', $shelf->id)  }}" enctype="multipart/form-data" class="mt-2">
            @csrf
            @method('put')
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Name" value="{{ $shelf->name }}">
            </div>

            <input type="submit" class="btn btn-success" value="Update">

        </form>
    </div>



@endsection

