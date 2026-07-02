@php
    $name = $user ? filament()->getUserName($user) : 'Admin';
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        @if ($user)
            <x-filament-panels::avatar.user
                size="lg"
                :user="$user"
                loading="lazy"
            />
        @else
            <div class="fi-avatar fi-circular rounded-full" style="width: 3rem; height: 3rem;"></div>
        @endif

        <div class="fi-account-widget-main">
            <h2 class="fi-account-widget-heading">
                {{ $greeting }}, {{ str($name)->before(' ') }}
            </h2>

            <p class="fi-account-widget-user-name">
                {{ $name }}
            </p>
        </div>

        <form
            action="{{ filament()->getLogoutUrl() }}"
            method="post"
            class="fi-account-widget-logout-form"
        >
            @csrf

            <x-filament::button
                color="gray"
                :icon="\Filament\Support\Icons\Heroicon::ArrowLeftEndOnRectangle"
                :icon-alias="\Filament\View\PanelsIconAlias::WIDGETS_ACCOUNT_LOGOUT_BUTTON"
                labeled-from="sm"
                tag="button"
                type="submit"
            >
                {{ __('filament-panels::widgets/account-widget.actions.logout.label') }}
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
