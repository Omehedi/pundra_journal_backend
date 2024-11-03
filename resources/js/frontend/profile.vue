<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <div class="row">
                <div class="col-12">
                    <h5>Profile
                        <span v-if="parseInt(authUser.user_type) === 1">
                            ( <template>
                            <span class="text-warning" v-if="parseInt(authUser.employee_approve) === 9">Drafted</span>
                            <span class="text-primary" v-else-if="parseInt(authUser.employee_approve) === 4">Submitted</span>
                            <span class="text-success" v-else-if="parseInt(authUser.employee_approve) === 1">Approved</span>
                            <span class="text-danger" v-else-if="parseInt(authUser.employee_approve) === 0">Rejected</span>
                            <span v-else>Active</span>
                        </template>)
                        </span></h5>
                </div>
            </div>
            <hr>
            <div class="form">
                <form @submit.prevent="submitStaffForm($route.meta.dataUrl, $route.meta.nextUrl)">
                    <div class="col-md-8">
                        <div class="row">
                            <label class="col-md-3">Profile Picture : </label>
                            <div class="col-md-8 mb-10 text-center">
                                <div class="form-group image_upload" @click="clickImageInput('image')" :style="{ backgroundImage: 'url(' + getImage(null, 'images/upload.png') + ')' }" style="background-size: 300px !important">
                                    <img v-if="formObject.image" :src="getImage(formObject.image)">
                                    <input name="thumbnail" style="display: none;" id="image" type="file" @change="uploadFile($event, formObject, 'image',false,false,true)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Name : </label>
                            <div class="col-md-8 mb-10">
                                <input type="text" class="form-control" v-validate="'required'" name="name" v-model="formObject.name">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Email : </label>
                            <div class="col-md-8 mb-10">
                                <input type="text" class="form-control" v-validate="'required'" name="email" v-model="formObject.email">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Phone : </label>
                            <div class="col-md-8 mb-10">
                                <input type="text" class="form-control" v-validate="'required'" name="phone" v-model="formObject.phone">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Employee ID : </label>
                            <div class="col-md-8 mb-10">
                                <input type="text" readonly class="form-control" name="pbi_id" v-model="formObject.pbi_id">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <strong>Change Password</strong>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Current Password : </label>
                            <div class="col-md-8 mb-10">
                                <input type="password" class="form-control" name="current_password" v-model="formObject.current_password">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Password : </label>
                            <div class="col-md-8 mb-10">
                                <input type="password" class="form-control" name="password" v-model="formObject.password">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3">Confirm Password : </label>
                            <div class="col-md-8 mb-10">
                                <input type="password" class="form-control" name="confirm_password" v-model="formObject.confirm_password">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-8 mb-10">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "profile",
    mounted() {
        const _this = this;
        _this.getStaffData();
    }
}
</script>

<style scoped>
.image_upload{
    background-size: cover;
    height: 150px;
    width: 150px;
    background-position: center;
    background-repeat: no-repeat;
    border: 1px solid #ddd;
    background-color: #ffffff;
    padding: 5px;
    cursor: pointer;
    margin: 0 auto;
}
</style>

