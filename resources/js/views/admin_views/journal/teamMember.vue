<template :key="$route.meta.name">
    <div class="main_component">
        <div class="row">
            <div class="col">
                <data-table :table-heading="tableHeading" table-title="Journal Team Members List">
                    <template v-slot:page_top>
                        <page-top topPageTitle="Journal Team Members List" page-modal-title="Journal Team Members Add/Edit"></page-top>
                    </template>
                    <template v-slot:data>
                        <tr v-for="(data, index) in dataList.data">
                            <td class="fw-medium">{{ parseInt(dataList.from) + index }}</td>
                            <td>
                                <a v-if="data.image" @click="openFile(getImage(data.image))">
                                    <i class="fa fa-download"> File</i>
                                </a>
                                <p v-else>N/A</p>
                            </td>
                            <td>{{ data.name }}</td>
                            <td>{{data.designation_primary}}</td>
                            <td>{{ data.email }}</td>
                            <td>{{ data.phone }}</td>
                            <td>
                                <a @click="changeStatus(data)" v-html="showStatus(data.status)"></a>
                            </td>
                            <td>
                                <div class="hstack gap-3 fs-15">
                                    <a class="link-primary" @click="editData(data, data.id)">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="link-danger" @click="deleteInformation(index, data.id)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </template>
                </data-table>
            </div>
        </div>

        <form-modal @submit="submitForm(formObject, 'formModal')" modal-size="modal-xs">
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Name:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" v-validate="'required'" v-model="formObject.name" placeholder="Enter full name" name="name">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Email:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" v-model="formObject.email" placeholder="Enter email address" name="email">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Designation Primary:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" v-validate="'required'" v-model="formObject.designation_primary" placeholder="Enter primary designation" name="designation_primary">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Designation Secondary:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" v-model="formObject.designation_secondary" placeholder="Enter secondary designation (optional)" name="designation_secondary">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Qualifications:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" v-validate="'required'" v-model="formObject.qualifications" placeholder="Enter qualifications" name="qualifications">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Institution:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" v-validate="'required'" v-model="formObject.institution" placeholder="Enter current institution/organization" name="institution">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Address:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" v-validate="'required'" v-model="formObject.address" placeholder="Enter contact address" name="address">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-form-label">Phone Number :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="formObject.phone" placeholder="Enter phone number" name="phone_number">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <label class="form-label">Image :</label>
                <div @click="clickImageInput('image')" class="mb-2 mt-3">
                    <div class="form-group image_upload "
                         :style="{ backgroundImage: 'url(' + getImage(null, 'images/upload.png') + ')' }"
                         style="background-size:260px  !important;">
                        <img v-if="formObject.image" :src="getImage(formObject.image)">
                        <input name="thumbnail" :v-validate="formType === 1 ? 'required' : 'sometimes'" style="display: none;" id="image" type="file" @change="uploadFile($event, formObject, 'image', false)">
                    </div>
                </div>
            </div>
        </form-modal>

    </div>
</template>

<script>
    import DataTable from "../../../components/dataTable";
    import PageTop from "../../../components/pageTop";
    import FormModal from "../../../components/formModal";

    export default {
        name: "teamMember",
        components: { FormModal, PageTop, DataTable },
        data() {
            return {
                tableHeading: ['Sl','Image','Name','Designation','Email','Phone','Status','Action'],
                formModalId: 'formModal',
            };
        },

        mounted() {
            const _this = this;
            _this.getDataList();
        }
    }
</script>

<style scoped>
</style>