<template>
    <div class="row">
        <form @submit.prevent="submitForm(formObject, false, ()=>{getUserProfile()})">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <div @click="clickImageInput('image')" class="mb-2">
                                        <div class="form-group image_upload"
                                            :style="{backgroundImage: 'url(' + getImage(null, 'images/upload.png') + ')',}">
                                            <img v-if="formObject.image" :src="getImage(formObject.image)"/>
                                            <input name="thumbnail" :v-validate="formType === 1 ? 'required' : 'sometimes'" style="display: none" id="image" type="file" @change="UploadImage($event, formObject, 'image')"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-md-12">
                                <h4 class="mb-2 text-primary">Basic Information</h4>
                            </div>
                            <hr>
                        </div>
                        <div class="row form-group mt-2">
                            <label class="col-md-2 form-label">Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" v-model="formObject.name">
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <label class="col-md-2 form-label">Contact Number</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="phone" v-model="formObject.contact_number">
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <label class="col-md-2 form-label">Email </label>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" v-model="formObject.email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mt-3 mb-2 text-primary">Change Password</h4>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-2 form-label">Old Password</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password" placeholder="Old Password" v-model="formObject.old_password">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-2 form-label">New Password</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="newPassword" placeholder="New Password" v-model="formObject.password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mt-3 mb-2 text-primary">App Design Layouts</h4>
                            </div>
                            <hr>
                        </div>
                        <div class="row gutters">
                            <label class="col-md-2 form-label">Layouts</label>
                            <div class="col-md-8">
                                <select class="form-select" type="text" v-model="formObject.layout" name="layouts">
                                    <option value="0">--Select-- </option>
                                    <option value="vertical">vertical</option>
                                    <option value="horizontal">horizontal</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gutters mt-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="text-right">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</template>
<script>
export default {
    name: "editUser",
    components: {},
    methods: {
        getUserProfile() {
            const _this = this;
            var URL = `${_this.urlGenerate('api/edit_user')}`;
            _this.getData(URL, 'get', {}, {}, function (retData) {
                _this.$store.commit('formObject', retData);
            });
        },

    },
    mounted() {
        const _this = this;
        _this.getUserProfile();
    },

}
</script>
<style scoped>
.image_upload img {
    height: auto !important;
    max-width: 100% !important;
    width: 100%;
}
</style>
