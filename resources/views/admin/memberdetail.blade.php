@extends('admin.layout')

@section('content')
<x-message></x-message>
<div class="col grid-margin stretch-card text-light">
  <div class="card">
    <div class="card-body">
      <div class="text-center">
        <h4 class="card-title">{{ $member->name }}'s Details</h4>
      </div>
      <div class="table-responsive">
        <table class="table" style="color: white">
          <tbody>
            <tr>
              <th>UserId</th>
              <td>{{ $member->userid }}</td>
            </tr>
            <tr>
              <th>Name</th>
              <td>{{ $member->name }}</td>
            </tr>
            <tr>
              <th>Phone</th>
              <td>{{ $member->phone }}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{ $member->address }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $member->email }}</td>
            </tr>
            {{-- <tr>
              <th>Total Amount</th>
              <td>Rs. {{ number_format($member->total_amount) }}</td>
            </tr> --}}
            <tr>
              <th style="color: greenyellow">Paid Amount</th>
              <td style="color: greenyellow">Rs. {{ number_format($member->paid_amount) }}</td>
            </tr>
            {{-- <tr>
              <th style="color: red">Remaining Amount</th>
              <td style="color: red">Rs. {{ number_format(($member->total_amount - $member->paid_amount)) }}</td>
            </tr> --}}
            <tr>
              <td>
                <div class="row">
                  <div class="form-group col-md-6">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Add Payment
                    </button>

                  </div>
                  <div class="form-group col-md-6">
                    <form action="{{ url('makeattendance', $member->id) }}" method="post">
                      @csrf
                      <button style="font-size: 1.1em;"
                        onclick="return confirm('Are you sure you want to make attendance?')" type="submit"
                        class="badge badge-info">Make Attendance</button>
                    </form>
                  </div>
                </div>
              <td>
                <div class="row">
                  <div class="form-group col-md-6">
                    <a href="{{ url('editmember', $member->id) }}"><label style="font-size: 1.1em;"
                        class="badge badge-warning">Edit</label></a>
                  </div>
                  <div class="form-group col-md-6">
                    <form action="{{ url('deletemember', $member->id) }}" method="post">
                      @csrf
                      <button onclick="return confirm('Are you sure you want to delete this data?')" type="submit"
                        class="badge badge-danger" style="font-size: 1.1em;">Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container mb-4">
      <div class="text-center">
        <h2>Attendance</h2>
      </div>
      <div class="row">
        @foreach ($dates as $date)
          <div class="col-4 border p-2">
            {{ $date->attended_at }}
          </div>
        @endforeach
      </div>
    </div>

    {{-- modal --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enter Payment Amount</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ url('addpayment', $member->id) }}" method="post">
              @csrf
              <input type="number" name="pay_amount" placeholder="amount">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Payment</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  @endsection