<template>
    <div class="main-banner">
        Teszt figyelemfelhívás!
    </div>
    <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="custom-nav">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <Link :href="route('dashboard')">
                            <jet-application-mark class="block navbar-logo" />
                        </Link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <jet-nav-link :href="route('shop')" :active="route().current('shop')">
                            Főoldal
                        </jet-nav-link>
                        <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Termékeink
                        </jet-nav-link>
                        <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Üzleteink
                        </jet-nav-link>
                        <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Információk
                        </jet-nav-link>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <ui-icon-button class="ml-3 relative" icon="search"></ui-icon-button>
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <jet-dropdown align="right" width="48">
                            <template #trigger>
                                <ui-icon-button icon="account_circle"></ui-icon-button>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Saját fiók
                                </div>

                                <jet-dropdown-link :href="route('profile.show')">
                                    Profil
                                </jet-dropdown-link>

                                <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                    API kulcsok
                                </jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <jet-dropdown-link as="button">
                                        Kijelentkezés
                                    </jet-dropdown-link>
                                </form>
                            </template>
                        </jet-dropdown>
                    </div>
                    <ui-icon-button class="ml-3 relative" icon="shopping_cart"></ui-icon-button>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                    Irányítópult
                </jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                        <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                    </div>

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                        Profil
                    </jet-responsive-nav-link>

                    <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                        API kulcsok
                    </jet-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" @submit.prevent="logout">
                        <jet-responsive-nav-link as="button">
                            Kijelentkezés
                        </jet-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="app-content">
        <div>
            <Head :title="title" />

            <jet-banner />

            <div class="min-h-screen bg-gray-100">
                <!-- Page Heading -->
                <header class="bg-white shadow nav-menu" v-if="$slots.header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" style="color: #FEFEFE"></slot>
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    <slot v-if="!isLoading"></slot>
                    <div class="py-12" v-if="isLoading">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <ui-spinner active></ui-spinner>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetBanner from '@/Jetstream/Banner.vue'
import JetDropdown from '@/Jetstream/Dropdown.vue'
import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    props: {
        title: String,
    },

    components: {
        Head,
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        Link,
    },

    data() {
        return {
            showingNavigationDropdown: false,
            isLoading: false
        }
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put(route('current-team.update'), {
                'team_id': team.id
            }, {
                preserveState: false
            })
        },

        logout() {
            this.$inertia.post(route('logout'));
        },
    }
})
</script>

<style>
.custom-nav {
    margin-left: 20px;
    margin-right: 20px;
}
.navbar-user-name {
    padding-top: 5px;
    padding-left: 10px;
}
.main-banner {
    background-color: rgba(104,88,88,255);
    color: #FEFEFE !important;
    text-align: center;
    box-sizing: border-box;
    padding: 10px;
}
.main-banner:hover {
    background-color: rgb(132,116,116);
    cursor: pointer;
}
.navbar-logo {
    max-width: 125px;
    margin-left: 40px;
}
</style>
