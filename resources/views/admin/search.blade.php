@extends('admin.layout')

@section('content')
<x-message></x-message>
<div class="col grid-margin stretch-card text-light">
    <div class="card">
      <div class="card-body">
        <div class="text-center">
            <h4 class="card-title">Member Details</h4>
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
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection