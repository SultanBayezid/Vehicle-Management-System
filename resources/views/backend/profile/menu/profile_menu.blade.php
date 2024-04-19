<div class="col-sm-3">
        <ul class="nav flex-column nav-tabs settings-tab" role="tablist">




            <li class="nav-item">

                <a class="nav-link" href="{{ route('profile.index') }}"><i class="fas fa-user  text-primary"></i>
             {{ _lang('My Profile') }}
                </a>

            </li>
            <a class="nav-link" href="{{ route('profile.edit') }}"><i class="fas fa-user-edit  text-primary"></i>
                            {{ _lang('Profile Settings') }}</a>

            <li class="nav-item">

            <a class="nav-link" href="{{ route('profile.change_password') }}"><i class="fas fa-key  text-primary"></i> {{ _lang('Change Password') }}</a>

</li>





           
        </ul>
    </div>