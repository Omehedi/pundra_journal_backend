<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h4>This is user dashboard</h4>
        </div>
    </div>
</template>

<script>
export default {
    name: "dashboard",
    mounted() {
        const _this = this;
        _this.getDataList();
    }
}
</script>

<style scoped>

</style>
