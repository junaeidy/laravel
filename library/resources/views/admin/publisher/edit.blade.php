@extends('layouts.admin')
@section('header' , 'Publisher')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit publisher</h3>
        </div>
        
        <form action="{{ url('publishers/' .$publisher->id) }}" method="POST">
            @csrf
            {{ method_field ('put') }}
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="name" class="form-control" name="name" placeholder="Enter Name" required value="{{ $publisher->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="name" class="form-control" name="email" placeholder="Enter Email" required value="{{ $publisher->email }}">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="name" class="form-control" name="phone_number" placeholder="Enter Phone Number" required value="{{ $publisher->phone_number }}">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="name" class="form-control" name="address" placeholder="Enter Address" required value="{{ $publisher->address }}">
                </div>
            </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection