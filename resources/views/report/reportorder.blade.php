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
                <h4 class="mb-sm-0">Report Order</h4>
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
                                <th>date</th>
                                <th>Customer</th>
                                <th>Customer name</th>
                                <th>qty</th>
                                <th>subtotal</th>
                                <th>discount</th>
                                <th>total</th>
                              
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($order as $orders)
                                <tr>
                                    <td></td>
                                    <td>{{  $orders->date }}</td>
                                    <td>{{  $orders->customer }}</td>
                                    <td>{{  $orders->customers_name }}</td>
                                    <td>{{  $orders->qty }}</td>
                                    <td>Rp {{ number_format($orders->total) }}</td>
                                    <td>{{  $orders->discount }}%</td>
                                    <td>Rp {{ number_format($orders->total - ($orders->discount/100 * $orders->total)) }}</td>
                                   
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