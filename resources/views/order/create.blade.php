@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Create Order</h4>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">{{ $message }}</div>
@endif
    <div class="row">
        <div class="col-mb-12">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table dt-responsive nowrap datatables" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($items as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp {{ number_format($item->price) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('add-items') }}" class="form-group" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <input type="hidden" value="{{ $item->name }}" name="name">
                                                    <input type="hidden" value="{{ $item->price }}" name="price">
                                                    <input type="hidden" value="{{ $item->code }}"  name="code">
                                                    <input type="hidden" value="1" name="qty">
                                                    <button type="submit" title="delete" class="btn btn-primary btn-sm waves-effect waves-light" title="Hapus">
                                                        add
                                                    </button>
                                                </form>
                                             
                                            </div>
                                          
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
        
                        </div>
                    </div>
                       
               
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="{{ route('Order.store') }}" method="post">
                        @csrf
                        @include('order.field')
                        <div class="row">
                           
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('Order.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-mb-12">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           
                            <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($cartItems as $item)
                                    <tr>
                                       
                                        <td>{{ $item->attributes->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp {{ number_format($item->price * $item->qty) }}</td>
                                        <td> <form action="{{ route('add-update') }}" method="POST">
                                            @csrf <input type="number"  name="qty" value="{{ $item->qty }}" 
                                            class="text-center form-control form-control-sm col-md-1" /></td>
                                       <th> 
                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                     
                                      <div class="btn-group">
                                             
                                                   
                                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">
                                            Update
                                        </button>
                                 
                                </div>
                                      </form></th>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total:</td>
                                        <td></td>
                                        <td> Rp{{ number_format(Cart::getTotal()) }} </td>
                                       
                                    </tr>
                                </tbody>
                            
                            </table>
                            
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
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