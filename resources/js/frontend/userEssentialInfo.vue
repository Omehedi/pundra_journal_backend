<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>2. Essential Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl, $route.query.data)">
                    <div class="row">
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Bank Name</label>
                            <select type="text" class="form-select" v-model="formObject.ESSENTIAL_BANK_NAME"
                                    name="ESSENTIAL_BANK_NAME">
                                <option value="">Select Bank</option>
                                <template v-for="(eachData, index) in requiredData.banks">
                                    <option :value="eachData.id">{{ eachData.BANK_NAME }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Branch Name</label>
                            <input type="text" v-model="formObject.ESSENTIAL_BRANCH" name="ESSENTIAL_BRANCH" placeholder="Bank Branch Name" class="form-control">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Account No.</label>
                            <input type="number" v-model="formObject.ESSENTIAL_ACC_NO" name="ESSENTIAL_ACC_NO" placeholder="Enter Account" class="form-control">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Bank Address</label>
                            <input type="text" v-model="formObject.ESSENTIAL_BANK_ADDRESS" name="ESSENTIAL_BANK_ADDRESS" placeholder="Enter Address" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Type of License</label>
                            <select type="text" class="form-select" v-model="formObject.ESSENTIAL_TYPE_OF_LICENSE" name="ESSENTIAL_TYPE_OF_LICENSE">
                                <option value="">Select License Type</option>
                                <option value="Motor Cycle">Motor Cycle</option>
                                <option value="Professional">Professional</option>
                                <option value="Non Professional">Non Professional</option>
                                <option value="N/I">N/I</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">TIN No.</label>
                            <input type="number" v-model="formObject.ESSENTIAL_TIN_NO" name="ESSENTIAL_TIN_NO" placeholder="Enter TIN no" class="form-control">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Driving License</label>
                            <input type="text" v-model="formObject.ESSENTIAL_DRIVING_LICENSE_NO" name="ESSENTIAL_DRIVING_LICENSE_NO" placeholder="Enter Driving License" class="form-control">
                        </div>
                        <h5 class="mt-4">If you have a passport</h5>
                        <hr>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Passport Issue Date</label>
                            <datepicker class="form-control" v-model="formObject.ESSENTIAL_ISSUE_DATE" name="ESSENTIAL_ISSUE_DATE"></datepicker>
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Passport No.</label>
                            <input type="text" v-model="formObject.ESSENTIAL_PASSPORT_NO" name="ESSENTIAL_PASSPORT_NO" placeholder="Enter Passport ID" class="form-control">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Type of Passport</label>
                            <select type="text" class="form-select" v-model="formObject.ESSENTIAL_TYPE_OF_PASSPORT" name="ESSENTIAL_TYPE_OF_PASSPORT">
                                <option value="">Select Passport Type</option>
                                <option value="National">National</option>
                                <option value="International">International</option>
                                <option value="Red Color">Red Color</option>
                                <option value="Green Color">Green Color</option>
                                <option value="Country Wise">Country Wise</option>
                                <option value="N/A ">N/A</option>
                                <option value="N/I">N/I</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Visited Country</label>
                            <input type="text" v-model="formObject.ESSENTIAL_VISITED_COUNTRY" name="ESSENTIAL_VISITED_COUNTRY" placeholder="Enter Visited Country" class="form-control">
                        </div>
                    </div>
                    <next-prev-button></next-prev-button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import NextPrevButton from "./layouts/nextPrevButton.vue";

export default {
    name: "userEssentialInfo",
    components: {NextPrevButton},
    mounted() {
        const _this = this;
        _this.$set(_this.formObject, 'ESSENTIAL_BRANCH', '');
        _this.$set(_this.formObject, 'ESSENTIAL_TYPE_OF_PASSPORT', '');
        _this.$set(_this.formObject, 'banks', '');
        _this.$set(_this.formObject, 'ESSENTIAL_BANK_NAME', '');
        _this.$set(_this.formObject, 'ESSENTIAL_TYPE_OF_LICENSE', '');
        _this.getGeneralData(['banks']);
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, [Object.assign({}, _this.formObject)]);
            }
        });
    }
}
</script>

<style scoped>

</style>
