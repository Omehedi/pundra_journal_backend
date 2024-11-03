import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import App from './App';

import Vuex from 'vuex';
Vue.use(Vuex);

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate, {
    events: 'input',
    fieldsBagName: '',
});


import { Cropper } from 'vue-advanced-cropper';  // Import the Cropper
import 'vue-advanced-cropper/dist/style.css';
Vue.component('Cropper', Cropper);

import datepicker from './plugins/datepicker';
Vue.component('datepicker', datepicker);

import { BFormTags } from 'bootstrap-vue';
Vue.component('b-form-tags', BFormTags);
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css';

import tinymce from 'vue-tinymce-editor';
Vue.component('tinymce', tinymce);

import StoreData from './store';
const store = new Vuex.Store(StoreData);

import autocomplete from './plugins/autocomplete';
Vue.component('autocomplete', autocomplete);

import BaseMixin from './mixins/base_mixin';
import HttpMixin from './mixins/http_mixin';
import FrontendMixin from './mixins/frontend';
Vue.mixin(BaseMixin);
Vue.mixin(HttpMixin);
Vue.mixin(FrontendMixin);

import VueApexCharts from 'vue-apexcharts';
Vue.use(VueApexCharts);

Vue.component('apexchart', VueApexCharts);

import index from './routes/frontend';

var allRoutes = [];
const routes = allRoutes.concat(index);

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    linkActiveClass: "active",
});

// import VueTagsInput from '@johmun/vue-tags-input';
// Vue.component('VueTagsInput', VueTagsInput);

import pagination from './plugins/pagination/pagination';
Vue.component('pagination', pagination);


import VueToastr from '@deveodk/vue-toastr';
import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css';
Vue.use(VueToastr, {
    defaultPosition: 'toast-top-right',
    defaultType: 'info',
    defaultTimeout: 3000
});

import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import axios from 'axios';
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

import {initialize} from './helpers/general';
initialize(store, router);


const app = new Vue({
    el: '#app',
    components: { App },
    router,store,axios
});
