<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Starrae" class="w-6"
                src="{{ isset($global_setting_data['logo']) ? asset('files/settings/' . $global_setting_data['logo'] . '') : $logo_img }}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-theme-24 py-5 hidden">
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="menu {{ request()->is('*dashboard*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.services.index') }}"
                class="menu {{ request()->is('*services*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa-brands fa-servicestack"></i> </div>
                <div class="menu__title"> Services </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.teams.index') }}"
                class="menu {{ request()->is('*teams*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa-solid fa-people-group"></i> </div>
                <div class="menu__title"> Teams </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.projects.index') }}"
                class="menu {{ request()->is('*projects*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa-solid fa-diagram-project"></i> </div>
                <div class="menu__title"> Projects </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.campaigns.index') }}"
                class="menu {{ request()->is('*campaigns*') ? 'menu--active' : '' }}">
                <div class="menu__icon"><i class="fa-solid fa-tree"></i> </div>
                <div class="menu__title"> Campaigns </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.blogs.index') }}"
                class="menu {{ request()->is('*blogs*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa-brands fa-microblog"></i> </div>
                <div class="menu__title"> Blogs </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.galleries.index') }}"
                class="menu {{ request()->is('*galleries*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa-brands fa-envira"></i> </div>
                <div class="menu__title"> Gallery </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title"> Masters <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="menu {{ request()->is('*categories*') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i class="fa-solid fa-list"></i> </div>
                        <div class="menu__title"> Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.banners.index') }}"
                        class="menu {{ request()->is('*banners*') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i class="fa-solid fa-images"></i> </div>
                        <div class="menu__title"> Banners </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tags.index') }}"
                        class="menu {{ request()->is('*tags*') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i class="fa-solid fa-tags"></i> </div>
                        <div class="menu__title"> Tags </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title"> Page Contents <i data-feather="chevron-down" class="menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.page_contents.index') }}"
                        class="menu {{ request()->is('*page_contents*') ? 'menu--active' : '' }}">
                        <div class="menu__icon"><i class="fa-regular fa-file-lines"></i> </div>
                        <div class="menu__title"> Page Contents </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.faqs.index') }}"
                        class="menu {{ request()->is('*faqs*') ? 'menu--active' : '' }}">
                        <div class="menu__icon"><i class="fa-regular fa-comments"></i>
                            <div class="menu__title"> Faqs </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.contact_us.index') }}"
                class="menu {{ request()->is('*contact_us*') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i class="fa-solid fa-headset"></i> </div>
                <div class="menu__title"> Contact Us </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="chevron-down" class="side-menu__sub-icon"
                        style="margin-right:11px"></i> </div>
                <div class="menu__title"> Settings <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.settings.edit_general') }}"
                        class="menu {{ request()->is('*admin/settings/general*') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> {{ trans_choice('content.general', 1) }} </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
