@extends('main.main')

@section('content')
    <div class="container">
        <a href="{{ route('niche.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
        <form  action="{{ route('niche.update', $niche->id) }}" method = "POST" enctype="multipart/form-data" class="mt-2">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" name="name" value = "{{ $niche->name }}" class="form-control">
            </div>
            <div class="form-group">
                <select name="shelf_id"  class="form-control">
                    @foreach ($shelves as $shelf)
                         <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-info btn-lg" value="Update">


        </form>
    </div>

@endsection
