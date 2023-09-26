<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('home')}}"> <i class="fas fa-rocket"></i> Omniverse </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('services.index')}}">services</a></li>
            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </li>
</ul>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Modules</div>
                        
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                People
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                
                                <a class="nav-link" href="{{route('contacts.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                {{ ('Contacts') }}</a>
                         
                                <a class="nav-link" href="{{route('drivers.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                                Drivers</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#vehiclesLayouts" aria-expanded="false" aria-controls="vehiclesLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                                Vehicles
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="vehiclesLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('vehicles.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-car-alt"></i></div>
                                Vehicle List</a>
                                <a class="nav-link" href="{{route('vehicles.index')}}"> <div class="sb-nav-link-icon"><i class="fa fa-wrench"></i></div>
                                Services</a>
                                <a class="nav-link" href="{{route('vehicles.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                Issues</a>
                                <a class="nav-link" href="{{route('vehicles.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-gas-pump"></i></div>
                                Fuels History</a>
                                   
                                </nav>
                            </div>
                            <a class="nav-link" href="{{route('trips.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-car-side"></i></div>
                                Trips
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Accounting
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>    Accounts
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{route('accounts.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                Accounts</a>
                                            <a class="nav-link" href="{{route('chart_of_accounts.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                Income/Expense Types</a>
                                <a class="nav-link" href="{{route('payment_methods.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                Payment Mode</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>     Transactions
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{route('income.index')}}"><div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div> Income/Deposit</a>
                                            <a class="nav-link" href="{{route('expense.index')}}"> <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div> Expense</a>
                                            <a class="nav-link" href="{{route('transfer.create')}}"> <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div> Transfer</a>

                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth2" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div> Reports
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion2Pages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="{{ route('reports.account_statement') }}">
                                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                                Account Statement
                                            </a>
                                            <a class="nav-link" href="{{ route('reports.income_report') }}">
                                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                                Income Report
                                            </a>
                                            <a class="nav-link" href="{{ route('reports.expense_report') }}">
                                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                                Expense Report
                                            </a>
                                            <a class="nav-link" href="{{ route('reports.transfer_report') }}">
                                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                                Transfer Report
                                            </a>

                                            <a class="nav-link" href="{{ route('reports.income_vs_expense') }}">
                                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                                Income VS Expense
                                            </a>
                                            <a class="nav-link" href="{{ route('reports.report_by_payer') }}">
                                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                                Report by Payer
                                            </a>
                                            <a class="nav-link" href="{{ route('reports.report_by_payee') }}">
                                                <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                                Report by Payee
                                            </a>
                                            
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                          
                              
                          

                            <a class="nav-link" href="{{route('vehicles.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Reports
                            </a>
                            <div class="sb-sidenav-menu-heading">Settings</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Settings
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       {{Auth::user()->name ?? ''}}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">