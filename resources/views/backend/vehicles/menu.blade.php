<ul class="nav flex-column nav-tabs settings-tab" role="tablist">
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicles.show') ? 'active' : '' }}"
                href="{{ route('vehicles.show', $vehicle->id) }}">
                  <i class="ti-user"></i> {{ _lang('Overview') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicle_services') ? 'active' : '' }}"
                href="{{ route('vehicle_services', $vehicle->id) }}">
                  <i class="ti-receipt"></i> {{ _lang('Service History') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicle_issues') ? 'active' : '' }}"
                href="{{ route('vehicle_issues', $vehicle->id) }}">
                  <i class="ti-credit-card"></i> {{ _lang('Issues') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicle_fuels') ? 'active' : '' }}"
                href="{{ route('vehicle_fuels', $vehicle->id) }}">
                  <i class="ti-pencil-alt"></i> {{ _lang('Fuel History') }}
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vehicles.edit') ? 'active' : '' }}"
                href="{{ route('vehicles.edit', $vehicle->id) }}">
                  <i class="ti-pencil-alt"></i> {{ _lang('Edit') }}
              </a>
          </li>
      </ul>