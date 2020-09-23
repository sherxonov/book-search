@extends('main.main')

@section('content')
    <div class="container">

        <a href="{{ route('shelves.index') }}" class="btn btn-secondary">List Shelf</a>
        <a href="{{ route('niche.index') }}" class="btn btn-secondary">List Niche</a>
        <a href="{{ route('folder.index') }}" class="btn btn-secondary">List Folder</a>
        <a href="{{ route('document.create') }}" class ="btn btn-secondary  ">Create Document</a>
        <form class="form-inline my-2 my-lg-0 float-lg-right ml-2 ">
            <input class="form-control mr-sm-2" name="q" type="search" value="{{ request()->get('q') }}" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

        <table class="table table-striped table-bordered mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Download</th>
                    <th>Folder</th>
                    <th>Niche</th>
                    <th>Shelf</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($document as $counter => $doc)
                    <tr>
                        <td>{{ ++$counter }}</td>
                        <td>{{ $doc->name }}</td>
                        <td> <a href="{{ route('document.download', $doc->id) }}" class="btn"  ><i class="fa fa-download"> </i></a></td>
                        <td>{{ $doc->folder->name }}</td>
                        <td>{{ $doc->folder->niche->name }}</td>
                        <td>{{ $doc->folder->niche->shelf->name }}</td>
                        <td><a href="{{ route('document.edit', $doc->id) }}" class="btn btn-outline-success" ><i class="fa fa-pencil"></i> Edit</a></td>
                        <td><form action="{{ route('document.destroy', $doc->id)}}" method="POST">
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
