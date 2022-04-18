@extends('backend.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header py-1">
                <h4 class="card-title">Faculty List</h4>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Faculty Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $faculty)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td> {{ $faculty->name }}</td>
                                <td style="min-width: 150px">
                                    <a href="{{route('faculty.edit', $faculty->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <form action="{{ route('faculty.destroy', $faculty->id) }}" method="post" style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('are you sure to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer p-50">
                {{ $faculties->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</div>
@endsection