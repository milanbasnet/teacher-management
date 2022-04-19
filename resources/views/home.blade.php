@extends('layouts')

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header py-1 d-flex justify-content-between">
              <h4 class="card-title">Profile List</h4>
              <a href="{{route('export.csv')}}" data-toggle="tooltip" data-placement="top" title="Export to csv">
                <button type="button" class="btn btn-success">Export</button>
              </a>
          </div>
          <div class="card-content">
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>S.N.</th>
                              <th>Name</th>
                              <th>Gendoer</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Address</th>
                              <th>Nationality</th>
                              <th>Date of Birth</th>
                              <th>Faculty</th>
                              <th>Module</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($profiles as $profile)
                          <tr>
                              <th scope="row">{{ $loop->index + 1 }}</th>
                              <td> {{ $profile->name }}</td>
                              <td>
                                @if($profile->gender == 1)
                                <span>Male</span>
                                @else
                                <span>Female</span>
                                @endif
                              </td>
                              <td> {{ $profile->phone }}</td>
                              <td> {{ $profile->email }}</td>
                              <td> {{ $profile->address }}</td>
                              <td> {{ $profile->nation }}</td>
                              <td> {{ $profile->dob->format('d M, Y') }}</td>
                              <td> {{ $profile->facultyName->name }}</td>
                              <td> 
                                  @foreach($profile->module as $key => $value)
                                   {{$value['name'].','}}
                                  @endforeach
                                </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="card-footer p-50">
              {{ $profiles->appends(request()->except('page'))->links() }}
          </div>
      </div>
  </div>
</div>
@endsection