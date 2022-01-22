<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('home')}}" class="waves-effect">
                <i class="mdi mdi-home-variant-outline"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- @hasrole('General Affair') --}}
          
        {{-- @endhasrole

        @hasrole('Manager Project|Manager Finance|Manager HRD & GA') --}}

        {{-- @endhasrole --}}

        {{-- @hasrole('Administrator') --}}
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-cube"></i>
                    <span>Item</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('items.index') }}">List Item</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-email-outline"></i>
                    <span>  Order</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('Order.index') }}">List Stock</a></li>
                
                </ul>
            </li>

        
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-circle-outline"></i>
                    <span>Customer</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('customers.index') }}">Customer</a></li>
                 
                </ul>
            </li>

         

            <li class="menu-title">Report</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-format-page-break"></i>
                    <span>Report</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="pages-starter.html">Sales</a></li>
                    <li><a href="pages-maintenance.html">Project</a></li>
                    <li><a href="pages-comingsoon.html">Accounting</a></li>
                
                </ul>
            </li>
           
        {{-- @endhasrole --}}

     
    </ul>
</div>