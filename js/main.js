'use strict'
$(document).ready(function () {
    const signinBtn = document.querySelector('.signinBtn')
    const signupBtn = document.querySelector('.signupBtn')
    const formBx = document.querySelector('.formBx');
    const body = document.querySelector('body')

    signupBtn.onclick = function() {
        formBx.classList.add('active')
        body.classList.add('active')
    }
    signinBtn.onclick = function() {
        formBx.classList.remove('active')
        body.classList.remove('active')
    }

    //================================================================
    
    $('#login-form').submit(function (e) {
        e.preventDefault();
        document.forms[0].submit();
    })
    $('#form-register').submit(function(e){
        e.preventDefault();
        register_input.forEach(item => 
            item.addEventListener('blur',()=>{
                validate_register();
            })
        )
        if(validate_register()===true){
            const name          = document.getElementById('new-user-name').value;
            const email         = document.getElementById('new-user-email').value;
            const address       = document.getElementById('new-user-address').value;
            const password      = document.getElementById('new-user-password').value;
            const confirmpass   = document.getElementById('confirm-user-password').value;
            const sdt         = document.getElementById('new-phonenumber').value;

            $.ajax({
                type: "POST",
                url: "./../templates/xuly.php",
                data: {
                    sdt,
                    tendangnhap: name,
                    email,
                    address,
                    matkhau: confirmpass,
                    act:'signup'
                },
                success: function (response) {
                    console.log(response.trim());
                    if(response.trim()==='1'){
                        
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.trim()=='1'?"Đăng ký thành công":"Đăng ký thất bại",
                            showConfirmButton: false,
                            timer: 2000
                          })
                        // alert();
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: "Tên đăng nhập bị trùng",
                            showConfirmButton: false,
                            timer: 2000
                          })
                    }
                }
            }); 
        }
    })
    const register_input = document.forms[1].querySelectorAll('input');
    
    const validate_register = ()=>{
        const name          = document.getElementById('new-user-name').value;
        const email         = document.getElementById('new-user-email').value;
        const address       = document.getElementById('new-user-address').value;
        const password      = document.getElementById('new-user-password').value;
        const confirmpass   = document.getElementById('confirm-user-password').value;
        const phone         = document.getElementById('new-phonenumber').value;
        isUsername(name)=== false 
            ?show_message('#new-user-name',"Tên tài khoản không hợp lệ"):
            show_message('#new-user-name',"");  
        isPassword(password)=== false?
            show_message('#new-user-password',"Mật khẩu >8 và cần 1 kí tự và số."):
            show_message('#new-user-password',"");
        isEmail(email)=== false?
            show_message('#new-user-email',"Nhập email có dạng abc@gmail.com"):
            show_message('#new-user-email',"")
        isConfirmPassword(password,confirmpass)===false?
            show_message('#confirm-user-password',"Hai mật khẩu không trùng nhau"):
            show_message('#confirm-user-password',"");
        isRequired(address)=== false?
            show_message('#new-user-address',"Vui lòng nhập địa chỉ"):
            show_message('#new-user-address',"")
        isPhone(phone) === false?
            show_message('#new-phonenumber',"Số điện thoại không đúng"):
            show_message('#new-phonenumber',"");
        if(isUsername(name) 
            && isPassword(password)
            && isConfirmPassword(password,confirmpass) 
            && isRequired(address) 
            && isEmail(email) 
            &&isPhone(phone)){
            return true;
        }else{
            return false;
        }
    }
})
const show_message =(Id,message) => {
    var el = document.querySelector(Id).parentElement.querySelector('.form-message');
    el.innerHTML = message;
}
const isUsername = (value) =>{
    const reg = /^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
    return reg.test(value);
}
const isPassword = (value) =>{
    const reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    return reg.test(value);
}

const isRequired = (value) =>{
    return value === ""|| value ===undefined || value ===null?false:true;
}
const isConfirmPassword = (value1,value2) =>{
    return value2 === ""|| value2 ===undefined || value2 ===null || value1 !== value2 ?false :true;
}
const isPhone = (value)=>{
    //regex phone
    const reg= /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;
    return reg.test(value);
}
const isEmail = (value) =>{
    const reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g ;
    return reg.test(value);   
}