@extends('layouts.tabel')
@section('title', 'Daftar Penumpang')
@section('judul', 'Data  Penumpang')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
               <a class="btn btn-success" href="{{ route('profiles.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endsection
@section('tabels')
 <thead>
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Title</th>
        <th width="280px">Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($profiles as $profile)
        <tr>
            <td>{{ ++$i}}</td>
            <td><img src="{{ Storage::url($profile->image) }}" height="75" width="75" alt="" /></td>
            <td>{{ $profile->title }}</td>
            <td>
                <form action="{{ route('profiles.destroy',$profile->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('profiles.edit',$profile->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
@endsection
@section('links')
    <div class="d-flex justify-content-end mt-3">
        {{ $profiles->links() }}
    </div>
@endsection