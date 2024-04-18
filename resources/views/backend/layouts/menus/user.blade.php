<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                            {{ _lang('People') }}   
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('contacts.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                    {{ _lang('Contacts') }}    
                                </a>
                                <a class="nav-link" href="{{ route('contact_groups.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                    {{ _lang('Groups') }}     
                                </a>
                                <a class="nav-link" href="{{ route('drivers.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                                    {{ _lang('Drivers') }}     
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#vehiclesLayouts" aria-expanded="false" aria-controls="vehiclesLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                            {{ _lang('Vehicles') }}     
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="vehiclesLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('vehicles.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-car-alt"></i></div>
                                    {{ _lang('Vehicle List') }}      
                                </a>
                                <a class="nav-link" href="{{ route('services.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fa fa-wrench"></i></div>
                                    {{ _lang('Services') }}      
                                </a>
                                <a class="nav-link" href="{{ route('issues.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                    {{ _lang('Issues') }}      
                                </a>
                                <a class="nav-link" href="{{ route('fuels.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-gas-pump"></i></div>
                                    {{ _lang(' Fuels History') }}     
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ route('trips.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-car-side"></i></div>
                            {{ _lang('Trips') }}     
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            {{ _lang('Accounting') }}        
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>    {{ _lang('Accounts') }}     
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('accounts.index') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Accounts') }}      
                                        </a>
                                        <a class="nav-link" href="{{ route('chart_of_accounts.index') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Income/Expense Types') }}      
                                        </a>
                                        <a class="nav-link" href="{{ route('payment_methods.index') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang(' Payment Mode') }}      
                                        </a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>   {{ _lang('Transactions') }}   
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('income.index') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Income/Deposit') }}        
                                        </a>
                                        <a class="nav-link" href="{{ route('expense.index') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Expense') }}      
                                        </a>
                                        <a class="nav-link" href="{{ route('transfer.create') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Transfer') }}       
                                        </a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth2" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>
                                    {{ _lang('Reports') }}     
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion2Pages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('reports.account_statement') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang(' Account Statement') }}   
                                        </a>
                                        <a class="nav-link" href="{{ route('reports.income_report') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Income Report') }}     
                                        </a>
                                        <a class="nav-link" href="{{ route('reports.expense_report') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Expense Report') }}    
                                        </a>
                                        <a class="nav-link" href="{{ route('reports.transfer_report') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang(' Transfer Report') }}     
                                        </a>
                                        <a class="nav-link" href="{{ route('reports.income_vs_expense') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang(' Income VS Expense') }}     
                                        </a>
                                        <a class="nav-link" href="{{ route('reports.report_by_payer') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Report by Payer') }}     
                                        </a>
                                        <a class="nav-link" href="{{ route('reports.report_by_payee') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-angle-double-right"></i></div>
                                            {{ _lang('Report by Payee') }}     
                                        </a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">  {{ _lang('Settings') }}    </div>
                        <a class="nav-link" href="{{ route('company.change_settings') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                          Business  Settings
                        </a>
                        <a class="nav-link" href="{{ route('staffs.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                          Users
                        </a>