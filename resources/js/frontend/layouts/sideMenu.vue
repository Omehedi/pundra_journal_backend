<template>
    <div class="mobile-hidden">
        <div class="text-center">
            <div class="form-group image_upload" @click="clickImageInput('image')" :style="{ backgroundImage: 'url(' + getImage(null, 'images/upload.png') + ')' }" style="background-size: 300px !important">
                <img :class="`img-thumbnail pointer`" :src="authUser.image ? getImage(authUser.image, 'images/memers.png') : getImage(null, (authUser.PBI_SEX == 'Female') ? 'images/female_staff.jpg' : 'images/male_stuff.png')">
                <input name="thumbnail" style="display: none;" id="image" type="file" @change="uploadFile($event, formObject, 'image',(data)=>{authUser.image=formObject.image},false,true)">
            </div>
        </div>
        <hr>
        <div class="text-center">
            <div><strong>{{authUser.name}}</strong></div>
            <div v-if="parseInt(authUser.user_type) === 1">
                <span>Initial PIN : {{authUser.initial_pbi_id}}</span> || <span>PIN : {{authUser.pbi_id}}</span>
            </div>
        </div>
        <hr>
        <ul class="my-account-navigation nav">
            <li>
                <router-link to="/auth/profile"><i class="fa fa-user"></i>Profile</router-link>
            </li>
            <template v-for="(menu, index) in allMenus">
                <li>
                    <router-link :to="menu.link"><i class="fa fa-arrow-right"></i>{{menu.name}}</router-link>
                </li>
            </template>
            <li><a :href="urlGenerate('auth/logout')"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</template>

<script>

export default {
    name: "sideMenu",
    components: {},
    methods : {

    },
    mounted() {
        this.getConfigurations(false, 'auth/configurations');
    }
}
</script>


<style scoped>
.my-account-navigation li a {
    font-size: 15px;
    padding: 8px 0;
    font-weight: 600;
}
</style>
