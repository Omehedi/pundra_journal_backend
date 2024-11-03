<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>11. Brother and Sister Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitBrotherAndSister()">
                    <div v-for="(row,index) in formObject.siblings_data" :key="index">
                        <div class="col-md-1 mb-10">
                            <label class="col-form-label">{{index+1}}.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-10">
                                <label class="col-form-label">Brother/Sister Name</label>
                                <input type="text" name="FAMILY_BS_NAME" v-model="row.FAMILY_BS_NAME" class="form-control">
                            </div>
                            <div class="col-md-6 mb-10">
                                <label class="col-form-label">Relation </label>
                                <select name="FAMILY_BS_RELATION" v-model="row.FAMILY_BS_RELATION" class="form-select">
                                    <option value="">Select Relation</option>
                                    <template v-for="(eachData, index) in requiredData.relation">
                                        <option :value="eachData.RELATION_CODE">{{eachData.RELATION_NAME}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-6 mb-10">
                                <label class="col-form-label">Profession </label>
                                <select name="FAMILY_BS_PROFESSION" v-model="row.FAMILY_BS_PROFESSION" id="FAMILY_SPOUSE_PROFESSION" class="form-select">
                                    <option value="">Select Profession</option>
                                    <template v-for="(eachData, index) in requiredData.profession">
                                        <option :value="eachData.id">{{eachData.profession_name}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-6 mb-10">
                                <label class="col-form-label">Depend  </label>
                                <select name="FAMILY_BS_DEPEND" v-model="row.FAMILY_BS_DEPEND" class="form-select">
                                    <option value="">Select Depend</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-10">
                                <label class="col-form-label">Working Address </label>
                                <textarea type="text" name="FAMILY_BS_ADDRESS" v-model="row.FAMILY_BS_ADDRESS" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <template v-if="formObject.siblings_data.length === (index+1)">
                                    <a class="btn btn-primary" @click="addRow(formObject.siblings_data,Object.assign({}, siblingsInfo))">Add More <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </template>
                                <a v-if="formObject.siblings_data.length > 1" class="btn btn-warning" @click="deleteRow(formObject.siblings_data, index)">
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
    name: "userBrotherAndSister",
    components: {NextPrevButton},
    data(){
        return{
            siblingsInfo:{
                PBI_ID:'',
                FAMILY_BS_NAME:'',
                FAMILY_BS_RELATION:'',
                FAMILY_BS_PROFESSION:'',
                FAMILY_BS_DEPEND:'',
                FAMILY_BS_ADDRESS:'',
            }
        }
    },
    methods : {
        submitBrotherAndSister : function (){
            const _this = this;
            _this.submitStaffForm(_this.$route.meta.dataUrl, _this.$route.meta.nextUrl, false, function (retData) {
                if (retData){
                    _this.$router.push({path:`/auth/preview/${_this.authUser.pbi_id ? _this.authUser.pbi_id : _this.authUser.initial_pbi_id}`});
                }
            });
        }
    },
    mounted() {
        const _this = this;
        _this.getGeneralData(['relation','profession']);
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, 'siblings_data', [Object.assign({}, _this.siblingsInfo)]);
            }
        });
    }
}
</script>

<style scoped>
.toast-container {
    position: fixed;
    z-index: 999999;
    pointer-events: none;
    transition: 3s ease all;
    bottom: 0;
    background: red;
    height: 100px;
    width: 300px;
}
</style>




