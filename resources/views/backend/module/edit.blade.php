@extends('backend.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-light-primary py-1 mb-1">
                <h4 class="card-title">Module Edit</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('module.update', $module->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-md-3">
                                    <span>Faculty<i class="error">*</i></span>
                                </div>
                                <div class="col-md-6">
                                    <select name="faculty_id" class="form-control">
                                        <option>Select Faculty</option>
                                        @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}" {{ $module->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    @error('faculty_id')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                                <div class="mb-1 row">
                                    <div class="col-md-3">
                                        <span>Module Name<i class="error">*</i></span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{old('name', $module->name)}}" name="name" placeholder="Module Name">
                                    </div>
                                    <div class="col-md-3">
                                        @error('name')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Update</button>
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