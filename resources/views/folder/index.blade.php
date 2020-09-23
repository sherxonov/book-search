@extends('main.main')


@section('content')
    <div class = "container">

        <a href="{{ route('shelves.index') }}" class="btn btn-secondary">List Shelf</a>
        <a href="{{ route('niche.index') }}" class="btn btn-secondary">List Niche</a>
        <a href="{{ route('document.index') }}" class="btn btn-secondary">List Document</a>


        <a href="{{ route('folder.create') }}" class="btn btn-secondary  float-md-right mb-2">Create Shelf</a>

        <table class = "table table-bordered table-striped">
            <thead class="thead-dark">
               <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Niche</th>
                    <th>Shelf</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($folders as $counter => $folder)
                    <tr>
                        <td>{{ ++$counter }}</td>
                        <td>{{ $folder->name }}</td>
                        <td>{{ $folder->niche->name }}</td>
                        <td>{{ $folder->niche->shelf->name }}</td>
                        <td><a href="{{ route('folder.show', $folder->id) }}" class="btn btn-outline-info" ><i class="fa fa-eye"></i> Show</a></td>
                        <td><a href="{{ route('folder.edit', $folder->id) }}" class="btn btn-outline-success" ><i class="fa fa-pencil"></i> Edit</a></td>
                        <td><form action="{{ route('folder.destroy', $folder->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">
                        </form></td>
                    </tr>

                @endforeach
            </tbody>
        </table>


    </div>
@endsection
