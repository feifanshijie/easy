const server = 'http://localhost:8081';
var page = 1;

/**
 * 初始化
 */
function init()
{
    axios.get(server,{
        params:{
            page:page
        }
    })
    .then(function(response){
        console.log(response.data.data);
        window.app.data.list=response.data.data
    })
    .catch(function(err){
        console.log(err);
    });
}

// function getUserAccount() {
//     return axios.get('/user/12345');
// }
//
// function getUserPermissions() {
//     return axios.get('/user/12345/permissions');
// }
//
// //当这两个请求都完成的时候会触发这个函数，两个参数分别代表返回的结果
// axios.all([getUserAccount(), getUserPermissions()])
//     .then(axios.spread(function (acct, perms) {
//
//     }));
// }


