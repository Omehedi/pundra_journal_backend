<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <h5>10. Reference Person</h5>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl, $route.query.data)">
                    <div class="row">
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">1st Reference Person Name  </label>
                            <input type="text" name="RPERSON_F_NAME" v-model="formObject.RPERSON_F_NAME" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">2nd Reference Person Name</label>
                            <input type="text" name="RPERSON_S_NAME" v-model="formObject.RPERSON_S_NAME" class="form-control">
                        </div>

                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Profession</label>
                            <input type="text" name="RPERSON_F_PROFESSION" v-model="formObject.RPERSON_F_PROFESSION" class="form-control">
                        </div>

                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Profession</label>
                            <input type="text" name="RPERSON_S_PROFESSION" v-model="formObject.RPERSON_S_PROFESSION" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Organization/Institute/dept </label>
                            <input type="text" name="RPERSON_F_OID" v-model="formObject.RPERSON_F_OID" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Organization/Institute/dept</label>
                            <input type="text" name="RPERSON_S_OID" v-model="formObject.RPERSON_S_OID" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Working Location</label>
                            <input type="text" name="RPERSON_F_WORKING_LOCATION" v-model="formObject.RPERSON_F_WORKING_LOCATION" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Working Location</label>
                            <input type="text" name="RPERSON_S_WORKING_LOCATION" v-model="formObject.RPERSON_S_WORKING_LOCATION" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Relation</label>
                            <input type="text" name="RPERSON_F_RELATION" v-model="formObject.RPERSON_F_RELATION" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Relation</label>
                            <input type="text" name="RPERSON_S_RELATION" v-model="formObject.RPERSON_S_RELATION" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Mobile</label>
                            <input type="number" name="RPERSON_F_MOBILE" v-model="formObject.RPERSON_F_MOBILE" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Mobile</label>
                            <input type="text" name="RPERSON_S_MOBILE" v-model="formObject.RPERSON_S_MOBILE" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Phone</label>
                            <input type="text" name="RPERSON_F_PHONE" v-model="formObject.RPERSON_F_PHONE" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Phone</label>
                            <input type="text" name="RPERSON_S_PHONE" v-model="formObject.RPERSON_S_PHONE" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Email</label>
                            <input type="email" name="RPERSON_F_EMAIL" v-model="formObject.RPERSON_F_EMAIL" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Email</label>
                            <input type="email"  name="RPERSON_S_EMAIL" v-model="formObject.RPERSON_S_EMAIL" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Fax</label>
                            <input type="text" name="RPERSON_F_FAX" v-model="formObject.RPERSON_F_FAX" class="form-control">
                        </div>
                        <div class="col-md-6 mb-10">
                            <label class="col-form-label">Fax</label>
                            <input type="text" name="RPERSON_S_FAX" v-model="formObject.RPERSON_S_FAX" class="form-control" >
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
    name: "userReferencePerson",
    components: {NextPrevButton},
    methods:{

    },
    mounted() {
        const _this = this;
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
