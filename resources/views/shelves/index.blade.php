@extends('main.main')

@section('content')
<div class="container">

    <a href="{{ route('niche.index') }}" class="btn btn-secondary">List Niche</a>
    <a href="{{ route('folder.index') }}" class="btn btn-secondary">List Folder</a>
    <a href="{{ route('document.index') }}" class="btn btn-secondary">List Document</a>


    <a href="{{ route('shelves.create') }}" class="btn btn-secondary  float-md-right mb-2">Create Shelf</a>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Show</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach($shelves as $counter => $index )
                <tr>
                    <td>{{ ++$counter }}</td>
                    <td>{{ $index->name }}</td>
                    <td><a href="{{ route('shelves.show', $index->id) }}" class="btn btn-outline-info"><i class="fa fa-eye"></i> Show</a></td>
                    <td><a href="{{ route('shelves.edit', $index->id) }}" class="btn btn-outline-success"><i class="fa fa-pencil"></i> Edit</a></td>
                    <td>
                        <form action="{{ route('shelves.destroy', $index->id) }}" method = "POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-outline-danger "
                                onclick="return confirm('Are you sure?')">
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>


</div>

@endsection

