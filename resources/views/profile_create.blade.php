@extends('layouts')

@section('content')
<h3 class="widget-title"><span>Add Profile</span></h3>
<div class="row">
    <div class="col-md-6">
        <form class="form account-details-form" action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Lecturer's Name<i class="error">*</i></label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Gender<i class="error">*</i></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
                @error('gender')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone<i class="error">*</i></label>
                <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number">
                @error('phone')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email Address<i class="error">*</i></label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address<i class="error">*</i></label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address<i class="error">*</i></label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nationality<i class="error">*</i></label>
                <input type="text" name="nation" class="form-control" placeholder="Enter Your Nation">
                @error('nation')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date of Birth<i class="error">*</i></label>
                <input type="date" name="dob" class="form-control" placeholder="Enter Your Date of Birth">
                @error('dob')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date of Birth<i class="error">*</i></label>
                <select name="faculty" class="form-select form-select-sm mb-3">
                    <option value="">Select Faculty</option>
                    @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
                @error('faculty')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date of Birth<i class="error">*</i></label>
                <select name="module" class="form-select form-select-sm mb-3">
                    <option value="">Select Module</option>
                    <!-- @foreach($faculties as $faculty)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach -->
                </select>
                @error('module')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save</button>
        </form>
    </div>
</div>
@endsection