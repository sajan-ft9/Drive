@extends('admin.layout') 

@section('content')
<x-message></x-message>
<x-form :form_header="'Add Member'">
    <form class="forms-sample" action="{{ url('storemember') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input style="color: white" type="text" value="{{ old('name') }}" name="name" class="form-control"  placeholder="Name" required>
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input style="color: white" type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email" required>
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
                <input style="color: white" type="tel" value="{{ old('phone') }}" name="phone" class="form-control" placeholder="Mobile number" required>
                @error('phone')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
                <input style="color: white" type="text" value="{{ old('address') }}" name="address" class="form-control"  placeholder="Address" required>
                @error('address')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Vehicle Category</label>
            <div class="col-sm-9">
                <select name="vehicle" class="form-control text-light" required>
                    <option value="" selected disabled>Select Vehicle Category</option>
                    <option value="Bike">Bike</option>
                    <option value="Scooter">Scooter</option>
                    <option value="Car">Car</option>
                    <option value="Heavy">Heavy</option>
                </select>
                @error('vehicle')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        {{-- <div class="form-group row">
            <label class="col-sm-3 col-form-label">Total Amount</label>
            <div class="col-sm-9">
                <input style="color: white" type="number" min="0" value="0{{ old('total_amount') }}" name="total_amount" class="form-control"  placeholder="Total amount" required>
                @error('total_amount')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div> --}}
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Paid Amount</label>
            <div class="col-sm-9">
                <input style="color: white" type="number" min="0" value="0{{ old('paid_amount') }}" name="paid_amount" class="form-control"  placeholder="Paid amount">
                @error('paid_amount')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
    </form>
</x-form>
@endsection