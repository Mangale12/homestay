  @php
      $setting = \App\Models\SiteSetting::first();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <!--@if (!empty($setting->logo))-->
      <!--  <img src="{{asset('public/admin/image/'.$setting->logo)}}" alt="{{$setting->title}}" class="brand-image elevation-3" style="opacity: .8">-->
      <!--@endif-->
      @if (!empty($setting->title))
        <span class="brand-text font-weight-light">{{$setting->title}}</span>
      @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if (Auth::user()->profile_image != null)
              <img src="{{asset('public/admin/image/'.Auth::user()->profile_image )}}" class="img-circle elevation-2" style="opacity: .8">
            @else
              <img src="{{asset('public/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            @endif
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          </div>
          <div class="visit-web">
            <a href="{{route('home')}}" target="_blank">
              <img src="{{asset('public/admin/www.png')}}" class="img-circle">
            </a>
          </div>
        </div>


      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" id="myInput">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="myUL">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{route('homebanner.index')}}" class="nav-link {{ Route::is('homebanner.index','homebanner.create','homebanner.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home Banner
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{route('room.index')}}" class="nav-link {{ Route::is('room.index','room.create','room.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Room
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('service.index')}}" class="nav-link {{ Route::is('service.index','service.create','service.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Service
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('medias')}}" class="nav-link">
              <i class="nav-icon fas fa-file-image"></i>
              <p>
                Media
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('inquiry.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file-image"></i>
              <p>
                Inquiry
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('testimonial.index') }}" class="nav-link {{Route::is('testimonial.index','testimonial.create','testimonial.edit') ? 'active' : (Route::is('sub-categories.index','sub-categories.create','sub-categories.edit') ? 'active' : '')}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Testimonials
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('food.index') }}" class="nav-link {{Route::is('food.index','food.create','food.edit') ? 'active' : ''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Food
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link {{Route::is('categories.index','categories.create','categories.edit') ? 'active' : ''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Category
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link {{ Route::is('social','settings.index','homepageSetting.index','homepageSetting.create','homepageSetting.edit','homepageAd','singleNewsAd','categoryAd') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('social')}}" class="nav-link {{ Route::is('social') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('settings.index')}}" class="nav-link {{ Route::is('settings.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>

              {{--
              <li class="nav-item">
                <a href="{{route('homepageAd')}}" class="nav-link {{ Route::is('homepageAd') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Homepage Ad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('singleNewsAd')}}" class="nav-link {{ Route::is('singleNewsAd') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Single News Ad </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categoryAd')}}" class="nav-link {{ Route::is('categoryAd') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Page Ad </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('menu_settings')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Menu Settings
                  </p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.subscriber')}}" class="nav-link {{ Route::is('admin.subscriber') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Subscribers</p>
            </a>
          </li>

          {{-- @hasanyrole('Super Admin')
          <li class="nav-item">
            <a href="#" class="nav-link {{Route::is('roles.index','roles.create','roles.edit','permissions.index','permissions.create','permissions.edit') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Roles & Permissions
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link {{Route::is('roles.index','roles.create','roles.edit') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('permissions.index')}}" class="nav-link {{Route::is('permissions.index','permissions.create','permissions.edit') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>
            </ul>
          </li>
          @endhasanyrole --}}



          {{-- @hasanyrole('Admin|Super Admin')
          <li class="nav-item">
            <a href="#" class="nav-link {{ Route::is('homepageAd','singleNewsAd','categoryAd') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Ad Settings
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('homepageAd')}}" class="nav-link {{ Route::is('homepageAd') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Homepage Ad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('singleNewsAd')}}" class="nav-link {{ Route::is('singleNewsAd') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Single News Ad </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categoryAd')}}" class="nav-link {{ Route::is('categoryAd') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Page Ad </p>
                </a>
              </li>
            </ul>
          </li>
          @endhasanyrole --}}




         {{-- <li class="nav-item">
            <a href="{{route('newsletters.index')}}" class="nav-link {{ Route::is('newsletters.index','newsletters.send') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Newsletter
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('messages.index')}}" class="nav-link {{ Route::is('messages.index','messages.show') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Contact
              </p>
            </a>
          </li>--}}


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
