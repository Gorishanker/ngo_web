@php
    function checkActiveSideBar(array $links)
    {
        foreach ($links as $link) {
            if (request()->is('*admin/' . $link . '*')) {
                return true;
            }
        }
        return false;
    }
@endphp
<nav class="side-nav">
    <a href="{{ route('admin.dashboard') }}" class="intro-x flex items-center pl-5 pt-4">
        <img alt="" class="w-6"
            src="{{ isset($global_setting_data['logo']) ? asset('files/settings/' . $global_setting_data['logo'] . '') : $logo_img }}"
            style="width: 100%;border-radius:5px">
        {{-- <span class="hidden xl:block text-white text-lg ml-3">{{ $global_setting_data['site_name'] }} </span> --}}
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a class="side-menu {{ checkActiveSideBar(['dashboard']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.sidebar.dashboard', 1) }} </div>
            </a>
        </li>
        <li>
            <a class="side-menu {{ checkActiveSideBar(['services']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.services.index') }}">
                <div class="side-menu__icon"> <i class="fa-brands fa-servicestack"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.service', 1) }} </div>
            </a>
        </li>
        <li>
            <a class="side-menu {{ checkActiveSideBar(['teams']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.teams.index') }}">
                <div class="side-menu__icon"> <i class="fa-solid fa-people-group"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.team', 1) }} </div>
            </a>
        </li>
        {{-- <li>
            <a class="side-menu {{ checkActiveSideBar(['news']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.news.index') }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.news', 1) }} </div>
            </a>
        </li> --}}
        {{-- <li>
            <a class="side-menu {{ checkActiveSideBar(['events']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.events.index') }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.event', 1) }} </div>
            </a>
        </li> --}}
        <li>
            <a class="side-menu {{ checkActiveSideBar(['projects']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.projects.index') }}">
                <div class="side-menu__icon"> <i class="fa-solid fa-diagram-project"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.project', 1) }} </div>
            </a>
        </li>
        <li>
            <a class="side-menu {{ checkActiveSideBar(['campaigns']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.campaigns.index') }}">
                <div class="side-menu__icon"> <i class="fa-solid fa-tree"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.campaign', 1) }} </div>
            </a>
        </li>
        <li>
            <a class="side-menu {{ checkActiveSideBar(['blogs']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.blogs.index') }}">
                <div class="side-menu__icon"> <i class="fa-brands fa-microblog"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.blog', 1) }} </div>
            </a>
        </li>
        <li>
            <a class="side-menu {{ checkActiveSideBar(['galleries']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.galleries.index') }}">
                <div class="side-menu__icon"> <i class="fa-brands fa-envira"></i> </div>
                <div class="side-menu__title">Gallery </div>
            </a>
        </li>
        <li>
            <div
                class="side-menu {{ checkActiveSideBar(['categories', 'banners', 'tags','occasions']) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="shield"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.sidebar.masters', 2) }} <i
                        data-feather="chevron-down" class="side-menu__sub-icon" style="margin-right:11px"></i> </div>
            </div>
            <ul class="{{ checkActiveSideBar(['categories', 'banners', 'tags','occasions']) ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['categories']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.categories.index') }}">
                        <div class="side-menu__icon"><i class="fa-solid fa-list"></i></div>
                        <div class="side-menu__title">{{ trans_choice('content.sidebar.category', 2) }}</div>
                    </a>
                </li>
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['tags']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.tags.index') }}">
                        <div class="side-menu__icon"><i class="fa-solid fa-tags"></i></div>
                        <div class="side-menu__title">{{ trans_choice('content.tag', 2) }}</div>
                    </a>
                </li>
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['banners']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.banners.index') }}">
                        <div class="side-menu__icon"><i class="fa-solid fa-images"></i> </div>
                        <div class="side-menu__title">{{ trans_choice('content.banner', 2) }}</div>
                    </a>
                </li>
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['occasions']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.occasions.index') }}">
                        <div class="side-menu__icon"><i class="fa-brands fa-affiliatetheme"></i></div>
                        <div class="side-menu__title">Occassions</div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <div class="side-menu {{ checkActiveSideBar(['page_contents', 'faqs']) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg> </div>
                <div class="side-menu__title"> Page Contents <i data-feather="chevron-down"
                        class="side-menu__sub-icon" style="margin-right:11px"></i> </div>
            </div>
            <ul class="{{ checkActiveSideBar(['page_contents', 'faqs']) ? 'side-menu__sub-open' : '' }}">
                {{-- <li>
                    <a class="side-menu {{ checkActiveSideBar(['page_contents']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.page_contents.index') }}">
                        <div class="side-menu__icon"> <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div class="side-menu__title">{{ trans_choice('content.page_content', 2) }}</div>
                    </a>
                </li> --}}
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['faqs']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.faqs.index') }}">
                        <div class="side-menu__icon"><i class="fa-regular fa-comments"></i>
                        </div>
                        <div class="side-menu__title">{{ trans_choice('content.faq', 2) }}</div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- Contact us  --}}
        <li>
        <a class="side-menu {{ checkActiveSideBar(['contact_us']) ? 'side-menu--active' : '' }}"
            href="{{ route('admin.contact_us.index') }}">
            <div class="side-menu__icon"> <i class="fa-solid fa-headset"></i> </div>
            <div class="side-menu__title"> {{ trans_choice('content.contact_us', 1) }} </div>
        </a>
        </li>
        {{-- Contact us  --}}
        <li>
            <div
                class="side-menu {{ request()->is('*admin/settings/general*') || request()->is('*admin/settings/social-login*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i class="fa-solid fa-gear fa-xl"></i> </div>
                <div class="side-menu__title"> Settings <i data-feather="chevron-down" class="side-menu__sub-icon"
                        style="margin-right:11px"></i> </div>
            </div>
            <ul
                class="{{ request()->is('*admin/settings/general*') || request()->is('*admin/settings/social-login*') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a class="side-menu {{ request()->is('*admin/settings/general*') ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.settings.edit_general') }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">{{ trans_choice('content.general', 1) }}</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
