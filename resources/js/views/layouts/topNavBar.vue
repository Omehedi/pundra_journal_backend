<template>
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="/admin/dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                <img :src="appConfig.logo" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img :src="appConfig.logo" alt="" height="17">
                            </span>
                        </a>

                        <a href="/admin/dashboard" class="logo logo-light">
                            <span class="logo-sm">
                                <img :src="appConfig.logo" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img :src="appConfig.logo" alt="" height="17">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon" @click="toggleAppMenu()">
                        <span class="menu_colups_icon">
                            <i v-if="httpRequest" class="fa fa-spin fa-spinner"></i>
                            <i v-else class="fa fa-list"></i>
                        </span>
                    </button>
                    <!-- App Search-->
                    <form class="app-search d-none d-md-block">
                        <div class="position-relative">
                             <h2 class="mt-1">
                                 <strong class="uppercase">
                                     <span class="app_name text-dark">{{showData(appConfig, 'name')}}</span>
                                 </strong>
                             </h2>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user" :src="getImage(authUser.image)">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{showData(authUser, 'name')}}</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome {{showData(Config.user, 'name')}}!</h6>
                            <router-link class="dropdown-item" to="editUser"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></router-link>
                            <a class="dropdown-item" :href="`${baseUrl}/logout`"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        name: "topNavBar",
        data() {
            return {

            }
        },
        methods : {
            toggleAppMenu : function () {
                $('body').addClass('vertical-sidebar-enable');
            },


        },
        mounted() {
            const _this = this;
        }
    }
</script>

<style scoped>

</style>
