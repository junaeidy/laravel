@extends('layouts.admin')
@section('header' , 'Catalog')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New catalog</h3>
        </div>
        
        <form action="{{ url('catalogs') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                <label>Name</label>
                <input type="name" class="form-control" name="name" placeholder="Enter Name" required>
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