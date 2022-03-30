$(function(){
    $('#email').val(''); $('#giao_vien').prop('checked', false);
    $('#school').hide();
});

function change(){
    var value = $('#giao_vien').prop('checked');
    if(value){
        $('#school').show();
        $('#label_user').text('Tên đăng nhập');
    }else{
        $('#school').hide();
        $('#label_user').text('Email');
    }
}

function login(){
    var value = $('#giao_vien').is(':checked');
    var username = $('#username').val(); var password = $('#password').val();
    if(value){
        var id = 1;
    }else{
        var id = 0;
    }
    if(username.length == 0 || password.length == 0){
        toastr.error("Bạn chưa nhập đủ thông tin");
        return false;
    }else{
        if(id == 0){//  khong phai la tai khoan giao vien
            if(!validateEmail(username)){
                toastr.error("Định dạng Email không chính xác");
                return false;
            }else{
                exec(username, password, id);
            }
        }else{ // la tai khoan giao vien
            var truonghocid = $('#truonghoc_id').val();
            exec_truonghoc(username, password, id, truonghocid);
        }
    }
}

function exec(username, password, id){
    var data_str = "username="+btoa(username)+"&password="+btoa(password)+'&is='+id;
    $.ajax({
        type: "POST",
        url: baseUrl + '/index/do_login',
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                window.location.href = baseUrl + '/index'
            }else{
                toastr.error(result.msg);
                return false;
            }
        }
    });
}

function exec_truonghoc(username, password, id, truonghocid){
    var data_str = "username="+btoa(username)+"&password="+btoa(password)+'&is='+id+'&truonghocid='+truonghocid;
    $.ajax({
        type: "POST",
        url: baseUrl + '/index/do_login',
        data: data_str, // serializes the form's elements.
        success: function(data){
            var result = JSON.parse(data);
            if(result.success == true){
                window.location.href = baseUrl + '/index'
            }else{
                toastr.error(result.msg);
                return false;
            }
        }
    });
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
