<div class="aside-footer flex-column-auto" id="kt_aside_footer">
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btm-sm btn-icon btn-active-color-primary"
                data-kt-menu-trigger="click"
                data-kt-menu-overflow="true"
                data-kt-menu-placement="top-start"
                data-kt-menu-flip="top-end"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                data-bs-dismiss="click"
                title="{{ __('user/aside.footer.quick-actions.title') }}"
        >
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="4" y="10" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="10" y="4" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="10" y="10" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="16" y="4" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="16" y="10" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="4" y="16" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="10" y="16" width="4" height="4" rx="2"/>
                    <rect fill="#000000" x="16" y="16" width="4" height="4" rx="2"/>
                </svg>
            </span>
        </button>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
            <div class="menu-item px-3">
                <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">{{ __('user/aside.footer.quick-actions.title') }}</div>
            </div>
            <div class="separator mb-3 opacity-75"></div>
            <div class="menu-item px-3">
                <a href="{{ route('user.logout') }}" class="menu-link px-3 mb-2">
                    <i class="fa fa-power-off me-2"></i>
                    <span>{{ __('user/aside.footer.quick-actions.logout') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
