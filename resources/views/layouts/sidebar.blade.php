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
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-email-outline"></i>
                    <span>Inventory</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="#">List Stock</a></li>
                    <li><a href="#">Stock in</a></li>
                    <li><a href="#">Stock out</a></li>
                    <li><a href="#">Return</a></li>
                    <li><a href="#">Stock opname</a></li>
                    <li><a href="#">Approval</a></li>
                </ul>
            </li>
        {{-- @endhasrole --}}

        {{-- @hasrole('Administrator') --}}
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-cube"></i>
                    <span>Item</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="#">List Item</a></li>
                    <li><a href="#">Unit</a></li>
                    <li><a href="#">Brand</a></li>
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Subcategory</a></li>
                    <li><a href="#">Warehouse</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-email-outline"></i>
                    <span>  Order</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="#">List Stock</a></li>
                    <li><a href="#">Stock in</a></li>
                    <li><a href="#">Stock out</a></li>
                    <li><a href="#">Return</a></li>
                    <li><a href="#">Stock opname</a></li>
                    <li><a href="#">Approval</a></li>
                </ul>
            </li>

        
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-circle-outline"></i>
                    <span>Customer</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="auth-login.html">Purchase Order</a></li>
                    <li><a href="auth-register.html">Invoice</a></li>
                    <li><a href="auth-recoverpw.html">Expense</a></li>
                    <li><a href="auth-lock-screen.html">Payment</a></li>
                </ul>
            </li>

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

            <li class="menu-title">Settings</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-fill"></i>
                    <span>Users Management</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Role</a></li>
                    <li><a href="#">Permission</a></li>
                </ul>
            </li>

           
        {{-- @endhasrole --}}

     
    </ul>
</div>