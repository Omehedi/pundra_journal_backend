<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>9. Gurantors Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl, $route.query.data)">
                    <div class="row">
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Guarantor Name </label>
                            <input type="text" name="guarantor_name" v-model="formObject.guarantor_name" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Contact Number</label>
                            <input type="number" name="contact_number" v-model="formObject.contact_number" class="form-control">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">National NID/Smart Card</label>
                            <input type="number" name="nid_number" v-model="formObject.nid_number" class="form-control">
                        </div>

                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Working Place/Station</label>
                            <input type="text" name="working_place" v-model="formObject.working_place" class="form-control">
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Relation</label>
                            <select type="text" class="form-control" v-model="formObject.relation"
                                            name="relation">
                                <option value="">Select Relation</option>
                                <template v-for="(eachData, index) in requiredData.relation">
                                    <option :value="eachData.RELATION_CODE">{{ eachData.RELATION_NAME }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label class="col-form-label">Profession</label>
                            <select type="text" class="form-control" v-model="formObject.profession"
                                            name="profession">
                                <option value="">Select Profession</option>
                                <template v-for="(eachData, index) in requiredData.profession">
                                    <option :value="eachData.id">{{ eachData.profession_name }}</option>
                                </template>
                            </select>
                        </div>

                        <h5 class="mt-4">Address
                            <a v-if="formObject.addres === undefined || formObject.addres === null || formObject.addres.length === 0" class="btn btn-success" @click="defaultSelected()">Add</a>
                        </h5>
                        <hr>
                        <div class="col-md-6 mb-10" v-for="(addres, index) in formObject.addres" :key="index">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div v-if="parseInt(addres.type) === 1">
                                        <label>Permanent Address</label>
                                    </div>
                                    <div v-else>
                                        <label>Present Address (
                                            <input type="checkbox" @click="checkSameData($event)" v-model="formObject.as_same"> Same As Permanent)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <select v-model="addres.division_id" @change="getGeneralData({district : {division_id: addres.division_id, objectName : `${addres.type}_district`}})" name="division_id" class="form-select">
                                        <option value="">Select Division</option>
                                        <template v-for="(eachData, index) in requiredData.division">
                                            <option :value="eachData.id">{{ eachData.name }}</option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <select v-model="addres.district_id" @change="getGeneralData({upazila : {district_id: addres.district_id, objectName : `${addres.type}_upazilla`}})" name="district_id" class="form-select">
                                        <option value="">Select District</option>
                                        <template v-for="(eachData, index) in requiredData[`${addres.type}_district`]">
                                            <option :value="eachData.id">{{ eachData.name }}</option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <select v-model="addres.upazila_id" @change="getGeneralData({post_office : {upazila_id:addres.upazila_id, objectName : `${addres.type}_post_office`}})" name="upazila_id" class="form-select">
                                        <option value="">Select Upazila</option>
                                        <template v-for="(eachData, index) in requiredData[`${addres.type}_upazilla`]">
                                            <option :value="eachData.id">{{ eachData.name }}</option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <select v-model="addres.post_office" name="post_office" class="form-select">
                                        <option value="">Select Post Office</option>
                                        <template v-for="(eachData, index) in requiredData[`${addres.type}_post_office`]">
                                            <option :value="eachData.id">{{ eachData.name }} - {{eachData.code}}</option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <textarea rows="1" type="text" placeholder="Village" v-model="addres.village" name="village" class="form-control"></textarea>
                                </div>
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
    name: "userGurrantors",
    components: {NextPrevButton},
    methods:{
        checkSameData(event) {
            const _this = this;
            if (event.target.checked) {
                let presentAddressIndex = _this.formObject.addres.findIndex(item => item.type == 1);
                let permanentAddressIndex = _this.formObject.addres.findIndex(item => item.type == 2);
                if (presentAddressIndex !== -1) {
                    let presentAddress = JSON.parse(JSON.stringify(_this.formObject.addres[presentAddressIndex]));
                    presentAddress.type = 2;
                    if (permanentAddressIndex !== -1) {
                        _this.$set(_this.formObject.addres, permanentAddressIndex, presentAddress);
                    } else {
                        _this.formObject.addres.push(presentAddress);
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
                let permanentAddressIndex = _this.formObject.addres.findIndex(item => item.type == 2);
                if (permanentAddressIndex !== -1) {
                    _this.$set(_this.formObject.addres, permanentAddressIndex, { district_id: '',village: '', upazila_id: '', post_office: '', type: 2 });
                }
            }
        },
        defaultSelected: function () {
          const _this = this;
            _this.$set(_this.formObject, 'addres', [
                { division_id: '', district_id: '', upazila_id: '', post_office: '', village: '', pbi_id: '', type: 1, address_for: 2},
                { division_id: '', district_id: '', upazila_id: '', post_office: '', village: '', pbi_id: '', type: 2, address_for: 2},
            ]);
        },
    },
    mounted() {
        const _this = this;
        _this.$set(_this.formObject, 'profession', '');
        _this.$set(_this.formObject, 'relation', '');
        _this.getGeneralData(['relation','profession','division']);
        _this.getStaffData(function (retData){
            if (!parseInt(retData.isEdit)){
                _this.$set(_this.formObject, [Object.assign({}, _this.formObject)]);
                _this.defaultSelected();
            }

            if (parseInt(retData.isEdit)){
              $.each(_this.formObject.addres, function(index, value){
                  _this.getGeneralData({
                      district : {division_id:value.division_id, objectName : `${value.type}_district`},
                      upazila : {district_id:value.district_id, objectName : `${value.type}_upazilla`},
                      post_office : {upazila_id:value.upazila_id, objectName : `${value.type}_post_office`},
                  })
              });
          }
        });
    }
}
</script>

<style scoped>

</style>
