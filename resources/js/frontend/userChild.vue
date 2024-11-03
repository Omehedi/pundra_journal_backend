<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>7. Child Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div v-for="(row,index) in formObject.child_data" :key="index">
                        <div class="col-md-1 mb-10">
                            <label class="col-form-label">{{index+1}}.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Child Name</label>
                                <input type="text" name="FAMILY_CHILD_NAME" v-model="row.FAMILY_CHILD_NAME" class="form-control">
                            </div>

                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Date of Birth</label>
                                <datepicker class="form-control"  name="FAMILY_CHILD_DOB" v-model="row.FAMILY_CHILD_DOB" ></datepicker>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Gender </label>
                                <select name="FAMILY_CHILD_SEX" v-model="row.FAMILY_CHILD_SEX" class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Level</label>
                                <input type="text" name="LEVEL" v-model="row.LEVEL" class="form-control">
                            </div>

                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Allowance</label>
                                <input type="text" name="ALLOWANCE" v-model="row.ALLOWANCE" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Profession</label>
                                <select name="FAMILY_CHILD_PROFESSION" v-model="row.FAMILY_CHILD_PROFESSION" class="form-select">
                                    <option value="">Select Profession</option>
                                    <template v-for="(eachData, index) in requiredData.profession">
                                        <option :value="eachData.id">{{eachData.profession_name}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-8 mb-10">
                                <label class="col-form-label">Working Address </label>
                                <textarea type="text" name="FAMILY_CHILD_ADDRESS" v-model="row.FAMILY_CHILD_ADDRESS" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-12 text-end">
                                <template v-if="formObject.child_data.length === (index+1)">
                                    <a class="btn btn-primary" @click="addRow(formObject.child_data,Object.assign({}, childInfo))">
                                        Add More <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </template>
                                <a v-if="formObject.child_data.length > 1" class="btn btn-warning" @click="deleteRow(formObject.child_data, index)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                <hr>
                            </div>
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
    name: "userChild",
    components: {NextPrevButton},
    data(){
        return{
            childInfo:{
                PBI_ID:'',
                FAMILY_CHILD_NAME:'',
                FAMILY_CHILD_DOB:'',
                FAMILY_CHILD_SEX:'',
                LEVEL:'',
                ALLOWANCE:'',
                FAMILY_CHILD_PROFESSION:'',
                FAMILY_CHILD_ADDRESS:'',
            }
        }
    },
    mounted() {
        const _this = this;
        _this.getGeneralData(['profession']);
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, 'child_data', [Object.assign({}, _this.childInfo)]);
            }
        });
    }
}
</script>

<style scoped>

</style>


