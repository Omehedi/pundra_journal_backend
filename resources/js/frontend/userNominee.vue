<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>8. Nominee Information</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div v-for="(row,index) in formObject.nominee_data" :key="index">
                        <div class="col-md-1 mb-10">
                            <label class="col-form-label">{{index+1}}.</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label"> Name</label>
                                <input type="text" name="NOMINEE_NAME" v-model="row.NOMINEE_NAME" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Percent</label>
                                <input type="number" name="NOMINEE_PERCENT" v-model="row.NOMINEE_PERCENT" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Relation</label>
                                <select name="NOMINEE_RELATION" v-model="row.NOMINEE_RELATION" class="form-select">
                                    <option value="">Select Relation</option>
                                    <template v-for="(eachData, index) in requiredData.relation">
                                        <option :value="eachData.RELATION_CODE">{{eachData.RELATION_NAME}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Phone</label>
                                <input type="number" name="NOMINEE_PHONE" v-model="row.NOMINEE_PHONE" class="form-control">
                            </div>

                            <div class="col-md-4 mb-10">
                                <label class="col-form-label">Mobile</label>
                                <input type="number" name="NOMINEE_MOBILE" v-model="row.NOMINEE_MOBILE" class="form-control">
                            </div>
                            <div class="col-md-4 mb-10">
                                <label class="col-form-label"> Voter ID</label>
                                <input type="number" name="NOMINEE_VOTER_ID" v-model="row.NOMINEE_VOTER_ID" class="form-control">
                            </div>
                            <div class="col-md-12 mb-10">
                                <label class="col-form-label"> Address</label>
                                <textarea type="text" name="NOMINEE_ADDRESS" v-model="row.NOMINEE_ADDRESS" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-10">
                                <label class="col-form-label">Nominee Picture</label>
                                <div class="form-group image_upload text-center" @click="clickImageInput(`nominee_image${index}`)" :style="{ backgroundImage: 'url(' + getImage(null, 'images/upload.png') + ')' }" style="background-size: 300px !important">
                                    <img v-if="row.file" :src="getImage(row.file)">
                                    <input name="thumbnail" style="display: none;" :id="`nominee_image${index}`" type="file" @change="uploadFile($event, row, 'file',false,false,true)">
                                </div>
                            </div>
                            <div class="col-md-12 text-end">
                                <template v-if="formObject.nominee_data.length === (index+1)">
                                    <a class="btn btn-primary" @click="addRow(formObject.nominee_data,Object.assign({}, nomineeInfo))">
                                        Add More <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </template>
                                <a v-if="formObject.nominee_data.length > 1" class="btn btn-warning" @click="deleteRow(formObject.nominee_data, index)">
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
      name: "userNominee",
    components: {NextPrevButton},
      data(){
          return{
              nomineeInfo:{
                  PBI_ID:'',
                  file:'',
                  NOMINEE_NAME:'',
                  NOMINEE_PERCENT:'',
                  NOMINEE_RELATION:'',
                  NOMINEE_PHONE:'',
                  NOMINEE_ADDRESS:'',
                  NOMINEE_MOBILE:'',
                  NOMINEE_VOTER_ID:'',
              },
          }
      },
      mounted() {
        const _this = this;
          _this.getGeneralData(['relation']);
          _this.getStaffData(function (retData){
            // _this.$set(_this.formObject, 'file',retData.data.nominee_data);
            console.log(retData.data.nominee_data);
              if (!parseInt(retData.isEdit)){
                  _this.$set(_this.formObject, 'nominee_data', [Object.assign({}, _this.nomineeInfo)]);
              }
          });
      }
}
</script>

<style scoped>
.image_upload{
    background-size: cover;
    height: 150px;
    width: 250px;
    background-position: center;
    background-repeat: no-repeat;
    border: 1px solid #ddd;
    background-color: #ffffff;
    padding: 5px;
    cursor: pointer;
    margin: 0 auto;
}
img {
    max-width: 100%;
    max-height: 140px;
}
</style>



