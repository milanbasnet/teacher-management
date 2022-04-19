@extends('layouts')

@section('content')
<h3 class="widget-title"><span>Add Profile</span></h3>
<div class="row">
    <div class="col-md-6">
        <form class="form account-details-form" action="{{route('profile.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Lecturer's Name<i class="error">*</i></label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Gender<i class="error">*</i></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2"  value="0" {{ old('gender') == '0' || empty(old('gender')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
                @error('gender')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Phone<i class="error">*</i></label>
                <input type="number" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter Phone Number">
                @error('phone')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address<i class="error">*</i></label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Address<i class="error">*</i></label>
                <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Enter Address">
                @error('address')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nationality<i class="error">*</i></label>
                <input type="text" name="nation"value="{{old('nation')}}"  class="form-control" placeholder="Enter Your Nation">
                @error('nation')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth<i class="error">*</i></label>
                <input type="date" name="dob" value="{{old('dob')}}" class="form-control" placeholder="Enter Your Date of Birth">
                @error('dob')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Faculty<i class="error">*</i></label>
                <select name="faculty" class="form-select form-select-sm mb-3" id="faculty_id" required>
                    <option value="">Select Faculty</option>
                    @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" {{old('faculty') == $faculty->id ? 'selected': ''}}>{{ $faculty->name }}</option>
                    @endforeach
                </select>
                @error('faculty')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Module<i class="error">*</i></label>
                <select name="module[]" class="form-select form-select-sm mb-3" multiple id="module_id" required>
                    <option value="">Select Modules</option>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>

        $(document).ready(function() {
            var old_faculty = "{{old('faculty')}}";
            $('select[name="faculty"]').on('change', function() {
                var token = "{{ csrf_token() }}";
                var faculty = $(this).val();
                $.ajax({
                    url: "{{route('get.module')}}",
                    type: 'post',
                    data: {
                        _token: token,
                        faculty:faculty},
                    success: function(result) {
                        if (result.length > 0) {
                            var opt = "<option>Select Module</option>";
                            for (modules of result) {
                                opt += "<option value=" + modules['id'] + ">" + modules['name'] + "</option>";
                            }
                            $("#module_id").html(opt);
                        } else {
                            var opt = "<option value=''>Module Not Found</option>";
                            $("#module_id").html(opt);
                        }
                    }
                });
            });
            var faculty = $("option:selected", "#faculty_id").val();
            var token = "{{ csrf_token() }}";
            console.log(faculty);
            if(faculty > 0 ){
                $.ajax({
                    url: "{{route('get.module')}}",
                    type: 'post',
                    data: {
                        _token: token,
                        faculty:faculty},
                    success: function(result) {
                        if (result.length > 0) {
                            var opt = "<option>Select Module</option>";
                            for (modules of result) {
                                if(old_faculty == modules['id']){
                                opt += "<option selected value=" + modules['id'] + ">" + modules['name'] + "</option>";
                                }
                                else{
                                    opt += "<option value=" + modules['id'] + ">" + modules['name'] + "</option>";
                                }
                            }
                            $("#module_id").html(opt);
                        } else {
                            var opt = "<option value=''>Module Not Found</option>";
                            $("#module_id").html(opt);
                        }
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
        $('#module_id').select2({
            placeholder:'Select Modules',
        });
        });
    </script>