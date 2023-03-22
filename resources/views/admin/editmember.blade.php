@extends('admin.layout')

@section('content')
<x-message></x-message>
<x-form :form_header="'Update Member Data'">
    <form class="forms-sample" action="{{ url('editmember', $member->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input style="color: white" type="email" value="{{ $member->email }}" name="email" class="form-control" placeholder="Email" required>
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
                <input style="color: white" type="tel" value="{{ $member->phone }}" name="phone" class="form-control" placeholder="Mobile number" required>
                @error('phone')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
                <input style="color: white" type="text" value="{{ $member->address }}" name="address" class="form-control"  placeholder="Address" required>
                @error('address')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
    </form>
</x-form>
@endsection