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
            style="width: 26%;border-radius:5px">
        <span class="hidden xl:block text-white text-lg ml-3">{{ $global_setting_data['site_name'] }} </span>
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
            <div
                class="side-menu {{ checkActiveSideBar(['categories']) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="shield"></i> </div>
                <div class="side-menu__title"> {{ trans_choice('content.sidebar.masters', 2) }} <i
                        data-feather="chevron-down" class="side-menu__sub-icon" style="margin-right:11px"></i> </div>
            </div>
            <ul
                class="{{ checkActiveSideBar(['categories']) ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['categories']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.categories.index') }}">
                        <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-codepen mx-auto">
                                <polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"></polygon>
                                <line x1="12" y1="22" x2="12" y2="15.5"></line>
                                <polyline points="22 8.5 12 15.5 2 8.5"></polyline>
                                <polyline points="2 15.5 12 8.5 22 15.5"></polyline>
                                <line x1="12" y1="2" x2="12" y2="8.5"></line>
                            </svg> </div>
                        <div class="side-menu__title">{{ trans_choice('content.sidebar.category', 2) }}</div>
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
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['page_contents']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.page_contents.index') }}">
                        <div class="side-menu__icon"> <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABMElEQVR4nOWWsUoEMRCGUysWgrVPoKVnI4JwnVZnYXmd3dW+wj2BL2DnK9jY3HvszJKdWRaTfxV7yYK4ZG/Pyx7Cgj/8EEhmPvKHZNeYlkRknwiH29hau2dSReKfSPDBCrfRAs8CsGCSDMhLP/ttnbXvR6T4ZPFFEiQFwIqMC3fJAptLff4nAGOMSYLEgLB9Ukxj56W//QY0dYrpVnF1Af6RBS+xSfHK4rUNZcWyOfwCZztHVFXVASueOxa/Cj12BvQp1I4LQIWbZ1LfhHHIlgQPHRduPhjAggUJ7pq50l00BxlbsBgMSNX4dpCXfpaLv2pg6k5JcR87Xj+yiPQngkzq67WXS7EcDhBMWN5Owthad7zuXWq/P+OLKFX/BEDbfPR7HGo3AlJ+W/ocerSbfgH/FN1Q1OuC6QAAAABJRU5ErkJggg==">
                        </div>
                        <div class="side-menu__title">{{ trans_choice('content.page_content', 2) }}</div>
                    </a>
                </li>
                <li>
                    <a class="side-menu {{ checkActiveSideBar(['faqs']) ? 'side-menu--active' : '' }}"
                        href="{{ route('admin.faqs.index') }}">
                        <div class="side-menu__icon"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAACCElEQVR4nLWVPWgUURDH1w+0UBStbEQUFIWIlWBjI1poKdqIIIgoCtYWfiE2VrYSohYWQcRGUEsVLVTs5LA4Se5m9m5nNuR2/hti/WTOy/mR3exKLn+Y6s3M783Mm90oqlAIYTUpHrHAWJHVNrEkTu1kVf6IFEdJ8SaEsLbS+e+4XSzoVjrGmp9lwXhJdWuas7ObloD8WBYgTvLjLMgdtCIAErtDircsvbGVAai9phSXWez8yAEhhFUsJv4AWOzByAGt7txeFryYyrLNrPZl5IB4Jt/dFjsySHSpFEDd7DCpfWbBVJGR4rovWvSf8haSYj5ixXQfQthSZG2xnaRgVtwkwbUyi5P8xELyTqe3nQQTpPaqVp9Ys/2suMWKe+Vm3/wSg9ZcZLWXIrKhFOAJSe0TC64WngvGfT7DfnvFinekeMgJrrDg/u9B/BvM2EqCr81mWE+CTh2A65e/TZJab2lAgoP9/kX9Slppmm6sAxgOV+yuV1EOkN4YC94PzmMPqgtYpCJAoxHWkdj3dmKnWPChKG5ZAFes+SESPGe1pz6TkQMW1Erm9nlFi+IEE6w4Uw0Q+8iKG/7MhrdPswMkOF1m/c+HotWZyfdUAlrp/DYfKKtd6AOT7Nxgc5+VGSkek+JYVFf+Zn37fOVZ0ZhOsh21g6OaAC/Z/05/tmp0AMVtFntSNMzl6idOP653VJ8O3wAAAABJRU5ErkJggg==">
                        </div>
                        <div class="side-menu__title">{{ trans_choice('content.faq', 2) }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li>
            <a class="side-menu {{ checkActiveSideBar(['contact_us']) ? 'side-menu--active' : '' }}"
                href="{{ route('admin.contact_us.index') }}">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call">
                        <path
                            d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg> </div>
                <div class="side-menu__title">{{ trans_choice('content.contact_us', 2) }}</div>
            </a>
        </li> --}}

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
