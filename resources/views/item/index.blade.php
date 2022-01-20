@extends('layouts.app')

@section('css')
        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />     

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Category</h4>

                <div class="page-title-right">
                    <div class="button-items">
                        <a href="{{ route('item-category.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle-multiple"></i>  Add Category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table dt-responsive nowrap datatables" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($item_categories as $item_category)
                            <tr>
                                <td></td>
                                <td>{{ $item_category->code }}</td>
                                <td>{{ $item_category->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('item-category.edit', $item_category->id) }}" title="Edit" class="btn btn-primary btn-sm waves-effect waves-light"><i class="ri-pencil-fill align-middle"></i></a>
                                        <button type="button" title="delete" class="btn btn-danger btn-sm waves-effect waves-light btn-delete" title="Hapus">
                                            <i class=" ri-delete-bin-7-line align-middle"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('item-category.destroy', $item_category->id) }}" class="form-delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->

    <script src="{{ asset('js/datatable-action.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable( {
                "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    $('td:eq(0)', nRow).html(iDisplayIndexFull +1);
                }
            });
        });
   </script>
@endsection