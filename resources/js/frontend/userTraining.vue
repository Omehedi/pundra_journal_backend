<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>5. Training Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div v-for="(row,index) in formObject.training_data" :key="index">
                        <div class="col-md-1 mb-10">
                            <label class="col-form-label">{{index+1}}.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Name of Training : </label>
                                <input type="text" v-model="row.TRAINING_NAME" class="form-control"  name="TRAINING_NAME">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Training Venue : </label>
                                <input type="text" name="TRAINING_VENUE" v-model="row.TRAINING_VENUE" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">training organizations : </label>
                                <input type="text" name="TRAINING_SPONSOR_ORGANIZATION" v-model="row.TRAINING_SPONSOR_ORGANIZATION" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Domestic/Overseas  : </label>
                                <select class="form-control" v-model="row.TRAINING_DOMESTIC_OVERSEAS" name="TRAINING_DOMESTIC_OVERSEAS">
                                    <option value="">Select</option>
                                    <option value="1">Domestic</option>
                                    <option value="2">Overseas</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Country : </label>
                                <input type="text" name="TRAINING_COUNTRY"  v-model="row.TRAINING_COUNTRY" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Training Place : </label>
                                <input type="text" name="TRAINING_PLACE" v-model="row.TRAINING_PLACE" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Start from : </label>
                                <datepicker class="form-control" placeholder="Start From" v-model="row.TRAINING_DATE_FROM"></datepicker>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">End to : </label>
                                <datepicker class="form-control" placeholder="Start From" v-model="row.TRAINING_DATE_TO"></datepicker>
                            </div>
                            <div class="col-md-12 text-end">
                                <template v-if="formObject.training_data.length === (index+1)">
                                    <a class="btn btn-primary" @click="addRow(formObject.training_data,Object.assign({}, trainingInfo))">Add More <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </template>

                                <a v-if="formObject.training_data.length > 1" class="btn btn-warning" @click="deleteRow(formObject.training_data, index)">
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
    name: "userTraining",
    components: {NextPrevButton},
    data(){
        return{
            trainingInfo:{
                PBI_ID:'',
                TRAINING_NAME:'',
                TRAINING_VENUE:'',
                TRAINING_SPONSOR_ORGANIZATION:'',
                TRAINING_DOMESTIC_OVERSEAS:'',
                TRAINING_COUNTRY:'',
                TRAINING_PLACE:'',
                TRAINING_DATE_FROM:'',
                TRAINING_DATE_TO:'',
            }
        }
    },
    mounted() {
        const _this = this;
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, 'training_data', [Object.assign({}, _this.trainingInfo)]);
            }
        });

        // this.getGeneralData([
        //     'training_type',
        //     'staff_trainings',
        //     'training_organizations',
        //     'training_support',
        //     'training_support',
        //     'training_implementor',
        //     'training_result',
        //     'training_organizer',
        //     'training_place'
        // ])
    }
}
</script>

<style scoped>

</style>
