
          
              <a class="nav-link {{ request()->routeIs('vehicles.show') ? 'active' : '' }}"
                href="{{route('driver_vehicles', $id)}}">
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
              <a class="nav-link {{ request()->routeIs('vehicle_trips') ? 'active' : '' }}"
                href="">
                <div class="sb-nav-link-icon">  <i class="fas fa-user"></i> </div>{{ _lang('Passenger') }}
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
