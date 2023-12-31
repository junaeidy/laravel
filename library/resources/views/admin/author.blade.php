@extends('layouts.admin')
@section('header', 'Author')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset ('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div id="controller">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Author</a>
                </div>

                <div class="card-body p-0">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center" style="width: 150px">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Author</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="put" v-if="editStatus">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" :value="data.name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" :value="data.email" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" :value="data.address" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<!--Data table-->
<script src="{{asset ('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset ('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset ('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset ('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
    var actionUrl = '{{ url('/authors') }}';
    var apiUrl = '{{ url('/api/authors') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: false},
        {data: 'name', class: 'text-center', orderable: false},
        {data: 'email', class: 'text-center', orderable: false},
        {data: 'phone_number', class: 'text-center', orderable: false},
        {data: 'address', class: 'text-center', orderable: false},
        {data: 'date', class: 'text-center', orderable: false},
        {render: function (index, row, data, meta){
            return `
                <a href='#' class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a> |
                <a href='#' class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        }, orderable: false, width: '200px', class: 'text-center'},
    ];

</script>
<script src="{{ asset ('js/data.js') }}"></script>

<!--<script type="text/javascript">
  $(function () {
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#datatable1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>-->
<!--CRUD
    <script type="text/javascript">
        var controller = new Vue ({
            el : '#controller',
            data : {
                data : {},
                actionUrl : '{{ url('authors') }}',
                editStatus : false

            },
            mounted: function () {
                
            },
            methods: {
                addData(){
                    this.data = {};
                    this.actionUrl = '{{ url('authors') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data){
                    this.data = data;
                    this.actionUrl = '{{ url('authors') }}'+'/' +data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id){
                    this.actionUrl = '{{ url('authors') }}'+'/'+id;
                    if(confirm("Are you sure?")){
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>{
                            location.reload();
                        })
                    }
                },
            }
        });
    </script>-->
@endsection
