<script>

import {defineComponent} from "vue";
import SideMenu from "./sideMenu.vue";

export default defineComponent({
    components: {SideMenu}
})
</script>

<template>
    <div class="section section-padding">
        <div class="container-fluid">
            <div class="row mbn-30">
                <div class="col-md-10 offset-md-1 mb-30">
                    <div class="row">
                        <div class="col-md-3">
                            <side-menu></side-menu>
                        </div>
                        <div class="col-md-9">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
