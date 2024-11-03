<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>3. Educational Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div v-for="(eduData,index) in formObject.education_data" :key="index">
                        <div class="col-md-1 mb-10">
                            <label class="col-form-label">{{index+1}}.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Subject Name</label>
                                <select type="text" class="form-select" v-model="eduData.EDUCATION_SUBJECT" name="EDUCATION_SUBJECT" v-validate="'required'">
                                    <option value="">Select Subject</option>
                                    <template v-for="(eachData, index) in requiredData.subjectName">
                                        <option :value="eachData.SUBJECT_CODE">{{ eachData.SUBJECT_NAME }}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Name of Qualification</label>
                                <select class="form-select" v-validate="'required'" v-model="eduData.EDUCATION_NOE" name="EDUCATION_NOE">
                                    <option value="">Select Qualification</option>
                                    <template v-for="(eachData, index) in requiredData.educationQualification">
                                        <option :value="eachData.EDU_QUA_CODE">{{ eachData.EDU_QUA_DESC }}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Name of Institute</label>
                                <input type="text" v-model="eduData.EDUCATION_NOI" v-validate="'required'" name="EDUCATION_NOI" placeholder="Institute Name" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Board/University</label>
                                <select type="text" class="form-select" v-model="eduData.EDUCATION_BU" name="EDUCATION_BU" v-validate="'required'">
                                    <option value="">Select Board/University</option>
                                    <template v-for="(eachData, index) in requiredData.university">
                                        <option :value="eachData.UNIVERSITY_CODE">{{ eachData.UNIVERSITY_NAME }}
                                        </option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Grade/Class</label>
                                <select type="text" class="form-select" v-model="eduData.EDUCATION_GRADE_CLASS" name="EDUCATION_GRADE_CLASS" v-validate="'required'">
                                    <option value="">Select Grade/Class</option>
                                    <option value="A+">A+</option>
                                    <option value="A">A</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B">B</option>
                                    <option value="B-">B-</option>
                                    <option value="C+">C+</option>
                                    <option value="C">C</option>
                                    <option value="C-">C-</option>
                                    <option value="D">D</option>
                                    <option value="F">F</option>
                                    <option value="1st Division">1st Division</option>
                                    <option value="2nd Division">2nd Division</option>
                                    <option value="3rd Division">3rd Division</option>
                                    <option value="1st Class">1st Class</option>
                                    <option value="2nd Class">2nd Class</option>
                                    <option value="3rd Class">3rd Class</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Year</label>
                                <select type="text" class="form-select" v-model="eduData.EDUCATION_YEAR" name="EDUCATION_YEAR" v-validate="'required'">
                                    <option value="">Select Year</option>
                                    <option value="N/A">N/A</option>
                                    <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Group</label>
                                <select type="text" class="form-select" v-model="eduData.EDUCATION_GROUP" name="EDUCATION_GROUP" v-validate="'required'">
                                    <option value="">Select Group</option>
                                    <option value="Arts">Arts</option>
                                    <option value="Science">Science</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Humanetics">Humanetics</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Medical">Medical</option>
                                    <option value="General">General</option>
                                    <option value="Vocational">Vocational</option>
                                    <option value="Business Management">Business Management</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Thesis Topic</label>
                                <input type="text" v-model="eduData.EDUCATION_THESIS_TOPIC" name="EDUCATION_THESIS_TOPIC" placeholder="Enter Thesis Topic" class="form-control">
                            </div>

                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Total Marks</label>
                                <input type="number" v-model="eduData.EDUCATION_TOTAL_MARK" name="EDUCATION_TOTAL_MARK" placeholder="Enter Total Marks" class="form-control">
                            </div>

                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">GPA</label>
                                <input type="text" v-model="eduData.EDUCATION_GPA" name="EDUCATION_GPA" placeholder="Enter Total Marks" class="form-control">
                            </div>

                            <div class="col-md-12 text-end">
                                <template v-if="formObject.education_data.length === (index+1)">
                                    <a class="btn btn-primary" @click="addRow(formObject.education_data,Object.assign({}, educationInfo))">
                                        Add More <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </template>
                                <a v-if="formObject.education_data.length > 1" class="btn btn-warning" @click="deleteRow(formObject.education_data, index)">
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
    name: "userEducation",
    components: {NextPrevButton},
    data(){
        return {
            years: [],
            educationInfo : {
                PBI_ID:'',
                EDUCATION_SUBJECT:'',
                EDUCATION_NOE:'',
                EDUCATION_NOI:'',
                EDUCATION_BU:'',
                EDUCATION_GRADE_CLASS:'',
                EDUCATION_YEAR:'',
                EDUCATION_GROUP:'',
                EDUCATION_THESIS_TOPIC:'',
                EDUCATION_TOTAL_MARK:'',
                EDUCATION_GPA:'',
                EDUCATION_DOCUMENT:''
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
        _this.getGeneralData(['subjectName', 'educationQualification', 'university']);
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, 'education_data', [Object.assign({}, _this.educationInfo)]);
            }
        });

    }
}
</script>

<style scoped>

</style>
