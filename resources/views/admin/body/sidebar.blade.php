<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rummana</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        {{-- Contact Message --}}
        @if (Auth::user()->can('contact.msg'))
            <li>
                <a href="{{ route('contact.message') }}" class="">
                    <div class="parent-icon"><i class="bx bx-message"></i>
                    </div>
                    <div class="menu-title">Contact Message</div>
                </a>
            </li>
        @endif
        {{-- Contact Message --}}

        {{-- Project Message --}}
        @if (Auth::user()->can('project.msg'))
            <li>
                <a href="{{ route('project.message') }}" class="">
                    <div class="parent-icon"><i class="bx bx-message"></i>
                    </div>
                    <div class="menu-title">Project Message</div>
                </a>
            </li>
        @endif
        {{-- Project Message --}}

        {{-- Subscribe Message --}}
        @if (Auth::user()->can('subscribe.menu'))
            <li>
                <a href="{{ route('view.subscribe') }}" class="">
                    <div class="parent-icon"><i class="bx bx-message"></i>
                    </div>
                    <div class="menu-title">Subscribe</div>
                </a>
            </li>
        @endif

        {{-- Subscribe Message --}}

        <li class="menu-label">Rummana</li>

        {{-- Banner Section  --}}
        @if (Auth::user()->can('banner.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Banner</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.banner'))
                        <li>
                            <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>All Banner</a>
                        </li>
                    @endif


                    @if (Auth::user()->can('add.banner'))
                        <li>
                            <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
                        </li>
                    @endif



                </ul>
            </li>
        @endif
        {{-- Banner Section  --}}

        {{-- About Section  --}}
        @if (Auth::user()->can('about.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">About</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.about'))
                        <li>
                            <a href="{{ route('all.about') }}"><i class="bx bx-right-arrow-alt"></i>All About</a>
                        </li>
                    @endif


                    @if (Auth::user()->can('add.about'))
                        <li>
                            <a href="{{ route('add.about') }}"><i class="bx bx-right-arrow-alt"></i>Add About</a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif
        {{-- About Section  --}}

        {{-- Service Section  --}}
        @if (Auth::user()->can('service.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Service</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.service'))
                        <li>
                            <a href="{{ route('all.service') }}"><i class="bx bx-right-arrow-alt"></i>All Service</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.service'))
                        <li>
                            <a href="{{ route('add.service') }}"><i class="bx bx-right-arrow-alt"></i>Add Service</a>
                        </li>
                    @endif


                </ul>
            </li>
        @endif
        {{-- Service Section  --}}

        {{-- Project Section  --}}
        @if (Auth::user()->can('project.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Project</div>
                </a>
                <ul>

                    @if (Auth::user()->can('all.project'))
                    <li>
                        <a href="{{ route('all.project') }}"><i class="bx bx-right-arrow-alt"></i>All Project</a>
                    </li>
                    @endif

                    @if (Auth::user()->can('add.project'))
                    <li>
                        <a href="{{ route('add.project') }}"><i class="bx bx-right-arrow-alt"></i>Add Project</a>
                    </li>
                    @endif

                </ul>
            </li>
        @endif
        {{-- Project Section  --}}

        {{-- Team Section  --}}
        @if (Auth::user()->can('team.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Team</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.team'))
                        <li>
                            <a href="{{ route('all.team') }}"><i class="bx bx-right-arrow-alt"></i>All Team</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.team'))
                        <li>
                            <a href="{{ route('add.team') }}"><i class="bx bx-right-arrow-alt"></i>Add Team</a>
                        </li>
                    @endif


                </ul>
            </li>
        @endif

        {{-- Team Section  --}}

        {{-- Blog Section  --}}
        @if (Auth::user()->can('blog.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Blog</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.blog'))
                        <li>
                            <a href="{{ route('all.blog') }}"><i class="bx bx-right-arrow-alt"></i>All Blog</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.blog'))
                        <li>
                            <a href="{{ route('add.blog') }}"><i class="bx bx-right-arrow-alt"></i>Add Blog</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- Blog Section  --}}

        {{-- Testimonial Section  --}}
        @if (Auth::user()->can('testimonial.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Testimonial</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.testimonial'))
                        <li>
                            <a href="{{ route('all.testimonial') }}"><i class="bx bx-right-arrow-alt"></i>All
                                Testimonial</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.testimonial'))
                        <li>
                            <a href="{{ route('add.testimonial') }}"><i class="bx bx-right-arrow-alt"></i>Add
                                Testimonial</a>
                        </li>
                    @endif


                </ul>
            </li>
        @endif
        {{-- Testimonial Section  --}}

        {{-- Partners Section  --}}
        @if (Auth::user()->can('partner.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Partners</div>
                </a>
                <ul>

                    @if (Auth::user()->can('all.partner'))
                        <li>
                            <a href="{{ route('all.partners') }}"><i class="bx bx-right-arrow-alt"></i>All
                                Partners</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.partner'))
                        <li>
                            <a href="{{ route('add.partners') }}"><i class="bx bx-right-arrow-alt"></i>Add
                                Partners</a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif
        {{-- Partners Section  --}}

        {{-- SiteSetting Section  --}}
        @if (Auth::user()->can('sitesetting.menu'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">SiteSetting</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.sitesetting'))
                        <li>
                            <a href="{{ route('all.sitesetting') }}"><i class="bx bx-right-arrow-alt"></i>All
                                SiteSetting</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.sitesetting'))
                        <li>
                            <a href="{{ route('add.sitesetting') }}"><i class="bx bx-right-arrow-alt"></i>Add
                                SiteSetting</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- SiteSetting Section  --}}

        {{-- Employee  --}}
        @if (Auth::user()->can('employee.menu'))
            <li class="menu-label">Employee Manage</li>

            {{-- Employee  --}}
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Employee</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.employee'))
                        <li> <a href="{{ route('all.employee') }}"><i class="bx bx-right-arrow-alt"></i>All
                                Employee</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.employee'))
                        <li> <a href="{{ route('add.employee') }}"><i class="bx bx-right-arrow-alt"></i>Add
                                Employee</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- Employee  --}}

        {{-- Salary  --}}
        @if (Auth::user()->can('salary.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Salary</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.salary'))
                        <li> <a href="{{ route('all.advance.salary') }}"><i class="bx bx-right-arrow-alt"></i>All
                                Advance
                                Salary</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.salary'))
                        <li> <a href="{{ route('add.advance.salary') }}"><i class="bx bx-right-arrow-alt"></i>Add
                                Advance
                                Salary</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- Salary  --}}

        {{-- Role & Permission  --}}
        @if (Auth::user()->can('role.menu'))
            <li class="menu-label">Role & Permission</li>

            {{-- Role & Permission  --}}
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Role & Permission</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.permission'))
                        <li> <a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>All
                                Permission</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('all.role'))
                        <li> <a href="{{ route('all.role') }}"><i class="bx bx-right-arrow-alt"></i>All Role</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('all.role.permission'))
                        <li> <a href="{{ route('all.role.permission') }}"><i class="bx bx-right-arrow-alt"></i>All
                                Role
                                Permission</a>
                        </li>
                    @endif

                    @if (Auth::user()->can('add.role.permission'))
                        <li> <a href="{{ route('add.role.permission') }}"><i class="bx bx-right-arrow-alt"></i>Add
                                Role
                                Permission</a>
                        </li>
                    @endif


                </ul>
            </li>
        @endif
        {{-- Role & Permission  --}}

        {{-- Admin Manage  --}}
        @if (Auth::user()->can('admin.menu'))

            <li class="menu-label">Admin Manage</li>

            {{-- Admin Manage  --}}
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Admin Manage</div>
                </a>
                <ul>
                    @if (Auth::user()->can(' all.admin '))
                        <li> <a href="{{ route('all.admin') }}"><i class="bx bx-right-arrow-alt"></i>All
                                Admin</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('add.admin'))
                        <li> <a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Add
                                Admin</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- Admin Manage  --}}


        <li class="menu-label">Others</li>

        <li>
            <a href="javascript:;" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
