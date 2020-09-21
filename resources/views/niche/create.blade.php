@extends('main.main')

@section('content')
<div class="container">
    <form method = "POST" action="{{ route('niche.store') }}" >
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Name:" class="form-control">
        </div>
        <div class="form-group">
            <select name = "shelf_id" id = "shelf_id" class="form-control">
                @foreach ($shelf as $index )
                    <option value="{{ $index->id }}">{{ $index->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Save">
    </form>
</div>

@endsection
