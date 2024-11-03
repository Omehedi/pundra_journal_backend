<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>6. Experience Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div v-for="(row,index) in formObject.experience_data" :key="index">
                        <div class="col-md-1 mb-10">
                            <label class="col-form-label">{{index+1}}.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Organization Name</label>
                                <input type="text" name="EXPERIENCE_NOO" v-model="row.EXPERIENCE_NOO" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Post</label>
                                <input type="text" name="EXPERIENCE_POST" v-model="row.EXPERIENCE_POST" class="form-control">
                            </div>

                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">From</label>
                                <datepicker class="form-control" @input="updateTotalDays(index)" name="EXPERIENCE_FROM" v-model="row.EXPERIENCE_FROM" placeholder="EXPERIENCE FROM"></datepicker>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">To</label>
                                <datepicker class="form-control" @input="updateTotalDays(index)" name="EXPERIENCE_TO" v-model="row.EXPERIENCE_TO" placeholder="EXPERIENCE TO"></datepicker>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Total Experience</label>
                                <input type="text" name="EXPERIENCE_LENGTH" v-model="row.EXPERIENCE_LENGTH" class="form-control"  readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-10">
                                <label class="col-form-label">Job Description</label>
                                <textarea rows="2" name="EXPERIENCE_JOB_NATURE" v-model="row.EXPERIENCE_JOB_NATURE" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <template v-if="formObject.experience_data.length === (index+1)">
                                    <a class="btn btn-primary" @click="addRow(formObject.experience_data,Object.assign({}, experinceInfo))">Add More <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </template>
                                <a v-if="formObject.experience_data.length > 1" class="btn btn-warning" @click="deleteRow(formObject.experience_data, index)">
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
    name: "userExperience",
    components: {NextPrevButton},
    data(){
        return{
            experinceInfo:{
                PBI_ID:'',
                EXPERIENCE_NOO:'',
                EXPERIENCE_JOB_NATURE:'',
                EXPERIENCE_POST:'',
                EXPERIENCE_FROM:'',
                EXPERIENCE_TO:'',
                EXPERIENCE_LENGTH:'',
            },
            experience_data: [{
                EXPERIENCE_FROM: '',
                EXPERIENCE_TO: '',
                EXPERIENCE_LENGTH: '',
            }]
        }
    },
    methods:{
        updateTotalDays(index) {
            const row = this.formObject.experience_data[index];
            if (row.EXPERIENCE_FROM && row.EXPERIENCE_TO) {
                const fromDate = new Date(row.EXPERIENCE_FROM);
                const toDate = new Date(row.EXPERIENCE_TO);
                const timeDifference = toDate.getTime() - fromDate.getTime();
                const totalDays = Math.ceil(timeDifference / (1000 * 3600 * 24));
                const years = Math.floor(totalDays / 365);
                const months = Math.floor((totalDays % 365) / 30);
                const days = totalDays % 30;
                const formattedDuration = `${years} Years ${months} Months ${days} Days`;
                row.EXPERIENCE_LENGTH = formattedDuration;
            } else {
                row.EXPERIENCE_LENGTH = '';
            }
        },
    },
    mounted() {
        const _this = this;
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, 'experience_data', [Object.assign({}, _this.experinceInfo)]);
            }
        });
    }
}
</script>

<style scoped>

</style>

