<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    {{-- @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan --}}
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('association_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.associations.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/associations') || request()->is('admin/associations/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.association.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('courses_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/courses*') ? 'c-show' : '' }} {{ request()->is('admin/categories*') ? 'c-show' : '' }} {{ request()->is('admin/centers*') ? 'c-show' : '' }} {{ request()->is('admin/curricula*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.coursesManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('course_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.courses.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/courses') || request()->is('admin/courses/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.course.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.categories.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-align-justify c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('center_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.centers.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/centers') || request()->is('admin/centers/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-hospital c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.center.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('curriculum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.curricula.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/curricula') || request()->is('admin/curricula/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.curriculum.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
           @can('course_enrollement_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/course-requests*') ? 'c-show' : '' }} {{ request()->is('admin/beneficiaries*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-object-group c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.courseEnrollement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('course_request_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.course-requests.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/course-requests') || request()->is('admin/course-requests/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-sign-in-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.courseRequest.title') }}
                            </a>
                        </li>
                    @endcan
                    {{-- @can('beneficiary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.beneficiaries.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/beneficiaries') || request()->is('admin/beneficiaries/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user-astronaut c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiary.title') }}
                            </a>
                        </li>
                    @endcan --}}
                </ul>
            </li>
        @endcan
          @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.settings.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        @can('slider_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.sliders.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.slider.title') }}
                </a>
            </li>
        @endcan
        @can('hawkma_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.hawkmas.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/hawkmas') || request()->is('admin/hawkmas/*') ? 'c-active' : '' }}">
                      <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hawkma.title') }}
                </a>
            </li>
        @endcan
        @can('report_mangment_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/report-categories*') ? 'c-show' : '' }} {{ request()->is('admin/reports*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportMangment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('report_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.report-categories.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/report-categories') || request()->is('admin/report-categories/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-barcode c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.reports.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/reports') || request()->is('admin/reports/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.report.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.newss.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/newss') || request()->is('admin/newss/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.news.title') }}
                </a>
            </li>
        @endcan
        @can('contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.contacts.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/contacts') || request()->is('admin/contacts/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
        @endcan
        @can('about_association_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/directors*') ? 'c-show' : '' }} {{ request()->is('admin/goals*') ? 'c-show' : '' }} {{ request()->is('admin/partners*') ? 'c-show' : '' }} {{ request()->is('admin/programs*') ? 'c-show' : '' }} {{ request()->is('admin/needs*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.aboutAssociation.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('director_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.directors.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/directors') || request()->is('admin/directors/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.director.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('goal_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.goals.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/goals') || request()->is('admin/goals/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.goal.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('partner_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.partners.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/partners') || request()->is('admin/partners/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-handshake c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.partner.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('program_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.programs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/programs') || request()->is('admin/programs/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-spinner c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.program.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('need_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.needs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/needs') || request()->is('admin/needs/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.need.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        {{-- @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.user-alerts.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan --}}
    

     @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
