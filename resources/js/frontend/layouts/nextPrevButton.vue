<script>
export default {
    name: "nextPrevButton"
}
</script>

<template>
    <div class="col-12 mt-5" v-if="[1,2].includes(parseInt(authUser.status))">
        <template v-if="$route.meta.previousUrl !== undefined">
            <router-link class="btn btn-info" :to="$route.meta.previousUrl"><i class="fa fa-backward"></i> Back</router-link>
        </template>
        <template v-if="$route.meta.nextUrl">
            <button type="submit" class="btn btn-info">
                <span>Save & Next</span>
                <i class="fa fa-long-arrow-right"></i>
            </button>
        </template>
        <template v-else>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-eye"></i>
                Save & Preview
            </button>
        </template>
    </div>
</template>

<style scoped>

</style>
