<template>
    <div class="tab-content">
        <div id="account-details" class="tab-pane active show">
            <div class="row">
                <div class="col-md-5">
                    <h5>Preview Information</h5>
                </div>
                <div class="col-md-7 text-end mb-2">
                        <button type="button" @click="printData('printDiv')" class="btn btn-primary">
                            <i class="fa fa-print"></i>
                            <span>Print</span>
                        </button>
                        <button type="button" v-if="[1,2].includes(parseInt(authUser.status))" @click="submitPreviewData()" class="btn btn-success">
                            <i class="fa fa-print"></i>
                            <span>Submit</span>
                        </button>
                </div>
            </div>
            <div class="row" id="printDiv">
                <div class="col-md-12 print_head">
                    <div v-if="previewData.personal_info" class="text-center mb-5">
                        <h5>{{previewData.personal_info.PBI_NAME}}</h5>
                        <span>Initial PIN : {{authUser.initial_pbi_id}}</span> || <span>PIN : {{authUser.pbi_id}}</span>
                    </div>
                </div>
                <div class="col-md-12 text-end print_head">
                    <span>Date : {{currentDateTime}}</span>
                </div>
                <div class="col-md-12">
                    <PreviewDataComponent :details="previewData" :is-admin="false"></PreviewDataComponent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "previewData",
    data(){
        return {
            previewData : {},
        }
    },
    methods : {
        getPreviewData : function (){
            const _this = this;
            var Url = _this.urlGenerate(`api/pim/pre_view_employee/${_this.$route.params.employee_id}`);
            _this.httpReq(Url, 'get', {}, {}, function (retData) {
                _this.previewData = retData;
            });
        },
        submitPreviewData : function (){
            const _this = this;
            var Url = _this.urlGenerate(`auth/staff_information`);
            _this.httpReq(Url, 'post', {}, {
                form_data : {},
                form_type : 'submit'
            }, function (retData) {
                _this.$router.push({path:'/auth/profile'});
            });
        }
    },
    mounted() {
        const _this = this;
        _this.getPreviewData();

    }
}
</script>

<style scoped>
    .print_head{
        display: none;
    }
    @media print {
        .print_head{
            display: block;
        }
    }
</style>
