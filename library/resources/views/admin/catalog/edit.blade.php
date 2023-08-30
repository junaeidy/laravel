@extends('layouts.admin')
@section('header' , 'Catalog')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit catalog</h3>
        </div>
        
        <form action="{{ url('catalogs/' .$catalog->id) }}" method="POST">
            @csrf
            {{ method_field ('put') }}

            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="name" class="form-control" name="name" placeholder="Enter Name" required value="{{ $catalog->name }}">
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