<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>1. Employee Basic Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div class="row mobile-block">
                        <div class="col-md-12 text-center">
                            <div class="form-group image_upload" @click="clickImageInput('image')" :style="{ backgroundImage: 'url(' + getImage(null, 'images/upload.png') + ')' }" style="background-size: 300px !important">
                                <img :class="`img-thumbnail pointer`" :src="authUser.image ? getImage(authUser.image, 'images/memers.png') : getImage(null, (authUser.PBI_SEX == 'Female') ? 'images/female_staff.jpg' : 'images/male_stuff.png')">
                                <input name="thumbnail" style="display: none;" id="image" type="file" @change="uploadFile($event, formObject, 'image',(data)=>{authUser.image=formObject.image},false,true)">
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Employee Name</label>
                            <input type="text" class="form-control" readonly v-validate="'required'" name="emp_name" v-model="formObject.PBI_NAME">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Designation</label>
                            <select v-model="formObject.PBI_DESIGNATION" v-validate="'required'" name="PBI_DESIGNATION" class="form-select">
                                <option value="">Select Designation</option>
                                <template v-for="(eachData, index) in requiredData.designation_for_frontend">
                                    <option :value="eachData.DESG_ID">{{ eachData.DESG_DESC }} - {{eachData.grade
                                        }}</option>
                                </template>
                            </select>
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Father Name</label>
                            <input type="text" v-model="formObject.PBI_FATHER_NAME" v-validate="'required'" name="PBI_FATHER_NAME" placeholder="Enter Father Name" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Mother Name</label>
                            <input type="text" v-model="formObject.PBI_MOTHER_NAME" v-validate="'required'" name="PBI_MOTHER_NAME" placeholder="Enter Mother Name" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Marital Status</label>
                            <select type="text" class="form-select" v-model="formObject.PBI_MARITAL_STA" name="PBI_MARITAL_STA" v-validate="'required'">
                                <option value="">Select Marital Status</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Widow">Widow</option>
                                <option value="Divorcee">Divorcee</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10" v-if="formObject.PBI_MARITAL_STA == 'Married'">
                            <label class="col-form-label">Spouse Name</label>
                            <input type="text" v-model="formObject.PBI_HUSBAND_NAME" name="PBI_HUSBAND_NAME" placeholder="Enter Spouse Name" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Gender</label>
                            <select type="text" class="form-select" v-model="formObject.PBI_SEX" name="PBI_SEX" v-validate="'required'">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Religion</label>
                            <select type="text" class="form-select" v-model="formObject.PBI_RELIGION" name="PBI_RELIGION" v-validate="'required'">
                                <option value="">Select Religion</option>
                                <template v-for="(religious, index) in requiredData.religious">
                                    <option :value="religious.value">{{ religious.name }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Blood Group</label>
                            <select type="text" class="form-select" v-model="formObject.ESSENTIAL_BLOOD_GROUP" name="ESSENTIAL_BLOOD_GROUP" v-validate="'required'">
                                <option value="">Select Blood Group</option>
                                <option value="N/I">N/I</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">E-mail</label>
                            <input type="text" v-model="formObject.PBI_EMAIL" readonly name="PBI_EMAIL" placeholder="Enter E-mail" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Last Education Qualification</label>
                            <select v-model="formObject.PBI_EDU_QUALIFICATION" name="PBI_EDU_QUALIFICATION" v-validate="'required'" class="form-select">
                                <option value="">Select Education Qualification</option>
                                <template v-for="(eachData, index) in requiredData.educationQualification">
                                    <option :value="eachData.EDU_QUA_CODE">{{ eachData.EDU_QUA_DESC }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Mobile</label>
                            <input type="text" v-model="formObject.PBI_MOBILE" readonly v-validate="'required'" name="PBI_MOBILE" placeholder="Enter Mobile" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Phone</label>
                            <input type="text" v-model="formObject.PBI_PHONE" readonly name="PBI_PHONE" placeholder="Enter Phone" class="form-control">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">National ID</label>
                            <input type="number" v-model="formObject.ESSENTIAL_VOTER_ID" name="ESSENTIAL_VOTER_ID" placeholder="Enter National ID" class="form-control" v-validate="'required'">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Birth Certificate No</label>
                            <input type="number" v-model="formObject.pbi_birth_no" name="pbi_birth_no" placeholder="Enter Birth Certificate No" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Smart Card No</label>
                            <input type="number" v-model="formObject.smart_no" name="smart_no" placeholder="Enter Smart Card No" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Date of Birth</label>
                            <datepicker  class="form-control" v-validate="'required'" v-model="formObject.PBI_DOB" name="pbi_date_of_birth"></datepicker>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Place of Birth (District)</label>
                            <select v-model="formObject.PBI_POB" name="PBI_POB" class="form-select">
                                <option value="">Select Place of Birth</option>
                                <template v-for="(eachData, index) in requiredData.districts">
                                    <option :value="eachData.id">{{ eachData.name }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Nationality</label>
                            <select v-model="formObject.PBI_NATIONALITY" v-validate="'required'" name="PBI_NATIONALITY" class="form-select">
                                <option value="">Select Nationality</option>
                                <template v-for="(nationality, nIndex) in requiredData.nationalities">
                                    <option :value="nationality.value">{{ nationality.name }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Area of Expertise</label>
                            <select v-model="formObject.PBI_SPECIALTY" name="PBI_SPECIALTY" class="form-select">
                                <option value="">Select Area of Expertise</option>
                                <template v-for="(eachData, index) in requiredData.expertise">
                                    <option :value="eachData.id">{{ eachData.area_expertise }}</option>
                                </template>
                            </select>
                        </div>

                        <h5 class="mt-4">Address
                            <a v-if="formObject.address === undefined || formObject.address === null || formObject.address.length === 0" class="btn btn-success" @click="defaultSelectedObject()">Add</a>
                        </h5>
                        <hr>
                        <div class="col-md-6 mb-10" v-for="(address, index) in formObject.address" :key="index">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div v-if="parseInt(address.type) === 1">
                                        <label>Permanent Address</label>
                                    </div>
                                    <div v-else>
                                        <label>Present Address (
                                            <input type="checkbox" @click="checkSameData($event)" v-model="formObject.as_same"> Same As Permanent)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <select v-model="address.division_id" @change="getGeneralData({district : {division_id: address.division_id, objectName : `${address.type}_district`}})" name="division_id" class="form-select">
                                        <option value="">Select Division</option>
                                        <template v-for="(eachData, index) in requiredData.division">
                                            <option :value="eachData.id">{{ eachData.name }}</option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <select v-model="address.district_id" @change="getGeneralData({upazila : {district_id: address.district_id, objectName : `${address.type}_upazilla`}})" name="district_id" class="form-select">
                                        <option value="">Select District</option>
                                        <template v-for="(eachData, index) in requiredData[`${address.type}_district`]">
                                            <option :value="eachData.id">{{ eachData.name }}</option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <select v-model="address.upazila_id" @change="getGeneralData({post_office : {upazila_id:address.upazila_id, objectName : `${address.type}_post_office`}})" name="upazila_id" class="form-select">
                                        <option value="">Select Upazila</option>
                                        <template v-for="(eachData, index) in requiredData[`${address.type}_upazilla`]">
                                            <option :value="eachData.id">{{ eachData.name }}</option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <select v-model="address.post_office" name="post_office" class="form-select">
                                        <option value="">Select Post Office</option>
                                        <template v-for="(eachData, index) in requiredData[`${address.type}_post_office`]">
                                            <option :value="eachData.id">{{ eachData.name }} - {{eachData.code}}</option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <textarea rows="1" type="text" placeholder="Village" v-model="address.village" name="village" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <next-prev-button></next-prev-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import NextPrevButton from "./layouts/nextPrevButton.vue";

export default {
    name: "selfInformation",
    components: {NextPrevButton},
    data(){
        return{

        }
    },
    methods:{
        checkSameData(event) {
            const _this = this;
            if (event.target.checked) {
                let presentAddressIndex = _this.formObject.address.findIndex(item => item.type == 1);
                let permanentAddressIndex = _this.formObject.address.findIndex(item => item.type == 2);
                if (presentAddressIndex !== -1) {
                    let presentAddress = JSON.parse(JSON.stringify(_this.formObject.address[presentAddressIndex]));
                    presentAddress.type = 2;
                    if (permanentAddressIndex !== -1) {
                        _this.$set(_this.formObject.address, permanentAddressIndex, presentAddress);
                    } else {
                        _this.formObject.address.push(presentAddress);
                    }
                    let keys = ['district', 'upazilla', 'post_office'];
                    $.each(keys, function (ind, value) {
                        let keyOne = `1_${value}`;
                        let keyTwo = `2_${value}`;
                        if (_this.requiredData[keyOne] !== undefined) {
                            _this.$set(_this.requiredData, keyTwo, _this.requiredData[keyOne]);
                        }
                    });
                }
            } else {
                let permanentAddressIndex = _this.formObject.address.findIndex(item => item.type == 2);
                if (permanentAddressIndex !== -1) {
                    _this.$set(_this.formObject.address, permanentAddressIndex, { district_id: '',village: '', upazila_id: '', post_office: '', type: 2 });
                }
            }
        },
        defaultSelectedBasicObject: function () {
          const _this = this;
          _this.$set(_this.formObject, 'PBI_ID', '');
          _this.$set(_this.formObject, 'PBI_SEX', '');
          _this.$set(_this.formObject, 'PBI_MARITAL_STA', '');
          _this.$set(_this.formObject, 'PBI_DESIGNATION', '');
          _this.$set(_this.formObject, 'division', '');
          _this.$set(_this.formObject, 'PBI_RELIGION', '');
          _this.$set(_this.formObject, 'ESSENTIAL_BLOOD_GROUP', '');
          _this.$set(_this.formObject, 'PBI_POB', '');
          _this.$set(_this.formObject, 'PBI_EDU_QUALIFICATION', '');
          _this.$set(_this.formObject, 'PBI_NATIONALITY', '');
          _this.$set(_this.formObject, 'PBI_SPECIALTY', '');
          _this.$set(_this.formObject, 'institute_id', '');
          _this.$set(_this.formObject, 'PBI_PRIMARY_JOB_STATUS', '');
          _this.$set(_this.formObject, 'appointment_id', '');
          _this.$set(_this.formObject, 'layer_type', '1');
        },
        defaultSelectedObject: function () {
          const _this = this;
            _this.$set(_this.formObject, 'address', [
                { division_id: '', district_id: '', upazila_id: '', post_office: '', village: '', pbi_id: '', type: 1, address_for: 1},
                { division_id: '', district_id: '', upazila_id: '', post_office: '', village: '', pbi_id: '', type: 2, address_for: 1},
            ]);
        },
    },
    mounted() {
        const _this = this;
        _this.getGeneralData(['designation_for_frontend', 'present_file_status', 'districts', 'educationQualification', 'expertise', 'institute', 'region', 'grade','division','appintmentBatch','initial_job_type','nationalities','religious']);
        _this.getStaffData(function (retData) {

          if (!parseInt(retData.isEdit)){
              _this.$set(_this.formObject, 'PBI_NAME', _this.authUser.name);
              _this.$set(_this.formObject, 'PBI_EMAIL', _this.authUser.email);
              _this.$set(_this.formObject, 'PBI_MOBILE', _this.authUser.phone);
              _this.$set(_this.formObject, 'PBI_PHONE', _this.authUser.phone);
              _this.$set(_this.formObject, 'image', _this.authUser.image);
              _this.$set(_this.formObject, 'PBI_DOB', '');

            _this.defaultSelectedBasicObject();
            _this.defaultSelectedObject();
            _this.$set(_this.formObject, 'files', [{ path: '', name: '', extension: '', size: '', }]);
          }

          if (parseInt(retData.isEdit)){
              $.each(_this.formObject.address, function(index, value){
                  _this.getGeneralData({
                      district : {division_id:value.division_id, objectName : `${value.type}_district`},
                      upazila : {district_id:value.district_id, objectName : `${value.type}_upazilla`},
                      post_office : {upazila_id:value.upazila_id, objectName : `${value.type}_post_office`}
                  });
                  _this.getGeneralData(['nationalities','religious']);
              });
          }
        });
    }
}
</script>

<style scoped>
.form-group.image_upload {
    max-width: 100%;
    margin: 0 auto;
}
</style>
