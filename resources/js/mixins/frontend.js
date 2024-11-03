export default {
    data() {
        return {
            formData: {},
            SelectFilter: {},
            filter: {},
            per_page: 20,
            formImages: '',
        }
    },
    methods: {
        getStaffData : function (callback = false, url = false, dataType = false) {
            const _this = this;
            var dataUrl = url ? url : _this.$route.meta.dataUrl;
            var data = dataType ? dataType : _this.$route.query.data;
            _this.httpReq(_this.urlGenerate(dataUrl),'get', {data:data}, {}, function (dataReturn){

                if (dataReturn.isReadOnly){
                    setTimeout(() => {
                        $('form *').prop('disabled', true);
                    }, 50);
                }

                if (parseInt(dataReturn.isEdit)){
                    $.each(dataReturn.data, function (index,value){
                        _this.$set(_this.formObject, index, value);
                    });
                }
                if (typeof callback === 'function'){
                    callback(dataReturn);
                }
            });
        },
        submitStaffForm : function (url, nextUrl = false, dataType = '', callback = false) {
            const _this = this;
            _this.submitForm({
                form_data : _this.formObject,
                form_type : _this.$route.query.data
            }, false, function (retData) {
                if (typeof callback === 'function'){
                    callback(true);
                }
                if (nextUrl){
                    _this.$router.push({path:nextUrl});
                }
            }, true, url);
        }
    },
}
