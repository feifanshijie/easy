function getOS() { // 获取当前操作系统
    var os;
    if (navigator.userAgent.indexOf('Android') > -1 || navigator.userAgent.indexOf('Linux') > -1) {
        os = 'Android';
    } else if (navigator.userAgent.indexOf('iPhone') > -1) {
        os = 'iOS';
    } else if (navigator.userAgent.indexOf('Windows Phone') > -1) {
        os = 'WP';
    } else {
        os = 'Others';
    }
    return os;
}