@extends('backend.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-light-primary py-1 mb-1">
                <h4 class="card-title">Faculty Create</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('faculty.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-md-3">
                                    <span>Faculty Name<i class="error">*</i></span>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Faculty Name" autofocus>
                                </div>
                                <div class="col-md-3">
                                    @error('name')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Save</button>
                                <button type="reset" class="btn btn-danger waves-effect">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection