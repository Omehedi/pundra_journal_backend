<template :key="$route.meta.name">
    <div class="main_component">
        <div class="row">
            <div class="col">
                <data-table :table-heading="false" table-title="Student List" :default-table="false" :default-search-button="false" :default-filter="false">
                    <template v-slot:page_top>
                        <page-top :default-add-button="false" topPageTitle="Setup and Configurations"></page-top>
                    </template>
                    <template v-slot:reportHeader>
                        <form @submit.prevent="submitForm(dataList,false)">
                            <div class="row">
                                <div class="col-md-8">
                                    <template v-for="(input, inIndex) in dataList">
                                        <div v-if="input" class="row mt-2">
                                            <div class="col-md-3">
                                                <strong>{{ input.display_name }} : </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <template v-if="input.type == 'text'">
                                                    <input class="form-control form-control" v-validate="'required'" data-vv-as="Value" :name="`${input.key}`" v-model="input.value"  type="text">
                                                </template>
                                                <template v-if="input.type == 'file'">
                                                    <div @click="clickImageInput(input.key)" class="mb-2">
                                                        <div class="form-group image_upload" :style="{ backgroundImage: 'url(' + getImage(null, 'images/upload.png') + ')' }" dstyle="background-size: 300px !important">
                                                            <img v-if="input.value" :src="getImage(input.value)">
                                                            <input name="thumbnail" style="display: none;" :id="input.key" type="file" @change="UploadImage($event, input, 'value')">
                                                        </div>
                                                    </div>
                                                </template>
                                                <template v-if="input.type == 'textarea'">
                                                    <textarea rowspan="2" class="form-control form-control" v-validate="'required'" v-model="input.value" style="width: 100%;" :name="`${input.key}`"></textarea>
                                                </template>
                                                <template v-if="input.type == 'tinmyce'">
                                                    <textarea class="form-control form-control" v-validate="'required'" data-vv-as="Value" v-model="input.value" style="width: 100%;" :name="`${input.key}`"></textarea>
                                                </template>
                                                <template v-if="input.type == 'select'">
                                                    <select v-validate="'required'" v-model="input.value" :name="`${input.key}`" class="form-control">
                                                        <option value="">Select</option>
                                                        <template v-for="(data, index) in requiredData[input.key]">
                                                            <option :value="data.id">{{ data.name }}</option>
                                                        </template>
                                                    </select>
                                                </template>
                                                <template v-if="input.type == 'number'">
                                                    <input class="form-control form-control" v-validate="'required'" data-vv-as="Value" :name="`${input.key}`" v-model="input.value"  type="number"
                                                           :min="input.key === 'loan_capability' ? 0 : null"
                                                           :max="input.key === 'loan_capability' ? 100 : null">
                                                </template>

                                            </div>
                                        </div>
                                    </template>
                                    <div class="row mt-2">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
                                            <input type="submit" value="Submit"
                                                   class="btn"
                                                   style="background-color: #3f726d; color: #fff; border: none; padding: 8px 20px; font-weight: 500; box-shadow: none; outline: none; cursor: pointer;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </template>
                </data-table>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from "../../components/dataTable";
    import Pagination from "../../plugins/pagination/pagination";
    import PageTop from "../../components/pageTop";
    import formModal from "../../components/formModal";
    export default {
        name: "configurationList",
        components: {PageTop, Pagination, DataTable, formModal},
        data() {
            return {
                tableHeading: ['Sl','Display name', 'Key','Value', 'Action'],
                formModalId : 'formModal',
                configKeys : {
                    logo : 'Logo',
                    app_name : 'Application name',
                    website_name : 'WebSite Logo Test',
                    phone_configuration : 'Phone Number for Contact',
                    website_banner : 'Website banner',
                },
            }
        },
        mounted(){
            const _this = this;
            _this.getDataList();

        }
    }
</script>

<style scoped>

</style>