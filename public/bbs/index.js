window.onload = function(){
    var app = new Vue({
        el: '#app',
        data: {
            article: [],
            category:[],
            isShowList: true,
            isShowContent: false,
            content: '',
            defaultLabel:[]
        },
        mounted:function(){
            var that = this;
            axios.get(server,{
                params:{
                    page:page
                }
            })
                .then(function(response){
                    that.article = response.data.data
                    console.log(response.data.data);
                })
                .catch(function(err){
                    console.log(err);
                });
        },
        methods:{
            init:function(){
                var that = this;
                axios.get(server,{
                    params:{
                        page:page
                    }
                })
                    .then(function(response){
                        that.article = response.data.data.list;
                        that.category = response.data.data.category;
                    })
                    .catch(function(err){
                        console.log(err);
                    });
            },
            brew:function () {
                this.isShowList = false;
                this.isShowContent = true;
            },
            setLabel:function(key){
                var styleArray = ['badge-info', 'badge-success', 'badge-primary', 'badge-warning'];
                var style = styleArray[key%4];
                return ['article-label', 'badge', style];
            }
        }
    });
}