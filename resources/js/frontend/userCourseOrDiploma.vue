<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>4. Course Or Diploma Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div v-for="(row,index) in formObject.course_data" :key="index">
                        <div class="col-md-1 mb-10">
                            <label class="col-form-label">({{index+1}}).</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Name of Course/Diploma</label>
                                <input type="text" name="CD_NOCD" v-model="row.CD_NOCD" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Name of Institute</label>
                                <input type="text" name="CD_NOI" v-model="row.CD_NOI" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Subject</label>
                                <input type="text" name="CD_SUBJECT" v-model="row.CD_SUBJECT" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Duration</label>
                                <select name="CD_DURATION" v-model="row.CD_DURATION" class="form-select">
                                    <option value="">Select Duration</option>
                                    <template v-for="duration in dourseDurations">
                                        <option :value="duration">{{duration}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Passing Year</label>
                                <select type="text" class="form-select" v-model="row.CD_PASSING_YEAR" name="CD_PASSING_YEAR">
                                    <option value="">Select Year</option>
                                    <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Grade/Class</label>
                                <input type="text" name="CD_GRADE_CLASS" v-model="row.CD_GRADE_CLASS" class="form-control">
                            </div>
                            <div class="col-md-12 text-end">
                                <template v-if="formObject.course_data.length === (index+1)">
                                    <a class="btn btn-primary" @click="addRow(formObject.course_data,Object.assign({}, courseInfo))">
                                        Add More <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </template>
                                <a v-if="formObject.course_data.length > 1" class="btn btn-warning" @click="deleteRow(formObject.course_data, index)">
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
    name: "userCourseOrDiploma",
    components: {NextPrevButton},
    data(){
        return {
            years: [],
            dourseDurations : ['3-days','5-days','7-days','10-days','15-days','19-days','25-days','1-Month','2-Months','3-Months','4-Months','5-Months','6-Months','7-Months','8-Months','9-Months','10-Months','11-Months','1-Year','2-Years','3-Years','4-Years'],
            courseInfo:{
                PBI_ID:'',
                CD_NOCD:'',
                CD_NOI:'',
                CD_SUBJECT:'',
                CD_DURATION:'',
                CD_PASSING_YEAR:'',
                CD_GRADE_CLASS:'',
            }
        }
    },
    methods:{
        generateYears() {
            const currentYear = new Date().getFullYear();
            for (let year = currentYear; year >= 1959; year--) {
                this.years.push(year);
            }
        },
    },
    mounted() {
        const _this = this;
        _this.generateYears();
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, 'course_data', [Object.assign({}, _this.courseInfo)]);
            }
        });
    }
}
</script>

<style scoped>

</style>
