<ul class="nav flex-column nav-tabs settings-tab" role="tablist">
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicles.show') ? 'active' : '' }}"
                href="{{ route('vehicles.show', $vehicle->id) }}">
                  <i class="fas fa-rocket"></i> {{ _lang('Overview') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicle_services') ? 'active' : '' }}"
                href="{{ route('vehicle_services', $vehicle->id) }}">
                  <i class="fa fa-wrench"></i> {{ _lang('Service History') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicle_issues') ? 'active' : '' }}"
                href="{{ route('vehicle_issues', $vehicle->id) }}">
                  <i class="fas fa-tools"></i> {{ _lang('Issues') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicle_fuels') ? 'active' : '' }}"
                href="{{ route('vehicle_fuels', $vehicle->id) }}">
                  <i class="fas fa-gas-pump"></i> {{ _lang('Fuel History') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicle_trips') ? 'active' : '' }}"
                href="{{ route('vehicle_trips', $vehicle->id) }}">
                  <i class="fas fa-car"></i> {{ _lang('Trips') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicles.edit') ? 'active' : '' }}"
                href="{{ route('vehicles.edit', $vehicle->id) }}">
                  <i class="far fa-edit"></i> {{ _lang('Edit') }}
              </a>
          </li>
      </ul>