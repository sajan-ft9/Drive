@extends('admin.layout')

@section('content')
<x-message></x-message>
<div class="col grid-margin stretch-card text-light">
    <div class="card">
      <div class="card-body">
        <div class="text-center">
            <h4 class="card-title">Members Table</h4>
        </div>
            <div class="table-responsive">
          <table class="table" style="color: white">
            <thead>
              <tr>
                <th>UserId</th>
                <th>Name</th>
                <th>Vehicle</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)                    
              <tr>
                <td><a style="text-decoration: none;color:white;" href="{{ url('memberdetail',$member->id) }}">{{ $member->userid }}</a></td>
                <td><a style="text-decoration: none;color:white;" href="{{ url('memberdetail',$member->id) }}">{{ $member->name }}</a></td>
                <td>{{ $member->vehicle }}</td>
                {{-- <td><a href="{{ url('editmember', $member->id) }}"><label class="badge badge-warning">Edit</label></a></td>
                <td>
                  <form action="{{ url('deletemember', $member->id) }}" method="post">
                    @csrf
                    <button onclick="return confirm('Are you sure you want to delete this data?')" type="submit" class="badge badge-danger">Delete</button>
                  </form>
              </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection