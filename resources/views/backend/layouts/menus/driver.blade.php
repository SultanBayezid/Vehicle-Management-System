
          
              <a class="nav-link {{ request()->routeIs('vehicles.show') ? 'active' : '' }}"
                href="">
                <div class="sb-nav-link-icon">  <i class="fas fa-rocket"></i></div> {{ _lang('Vehicle Details') }}
              </a>
          
          
    
          
          
              <a class="nav-link {{ request()->routeIs('vehicle_issues') ? 'active' : '' }}"
                href="">
                <div class="sb-nav-link-icon">   <i class="fas fa-tools"></i></div> {{ _lang('Issues') }}
              </a>
          
          
              <a class="nav-link {{ request()->routeIs('vehicle_fuels') ? 'active' : '' }}"
                href="">
                <div class="sb-nav-link-icon">  <i class="fas fa-gas-pump"></i> </div>{{ _lang('Fuel History') }}
              </a>
          
          
              <a class="nav-link {{ request()->routeIs('vehicle_trips') ? 'active' : '' }}"
                href="">
                <div class="sb-nav-link-icon">  <i class="fas fa-car"></i> </div>{{ _lang('Trips') }}
              </a>
          
          
              <a class="nav-link {{ request()->routeIs('vehicles.edit') ? 'active' : '' }}"
                href="">
                <div class="sb-nav-link-icon">  <i class="far fa-edit"></i></div> {{ _lang('Edit') }}
              </a>
      
                  
              
                        <div class="sb-sidenav-menu-heading">  {{ _lang('Settings') }}    </div>
                        <a class="nav-link" href="{{ route('profile.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            {{ _lang('My Profile') }}
                        </a>
                        <a class="nav-link" href="{{ route('company.change_settings') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            {{ _lang('Company Settings') }}
                        </a>
