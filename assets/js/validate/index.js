function save() {
    let fullName = document.querySelector("#name").value;
    let userName = document.querySelector("#username").value;
    let passWord = document.querySelector("#password").value;
    let rePassword = document.querySelector("#repassword").value;
    let email = document.querySelector("#email").value;
    let phone = document.querySelector("#number").value;
    let address = document.querySelector("#address").value;

    console.log(document.querySelectorAll("input[type=text]"));
   //validate Name
   if(_.isEmpty(fullName)) {
       fullName="";
       document.querySelector("#fullname-error").innerHTML="Vui lòng nhập họ tên.";
       document.getElementById("name").classList.add("input-error");
   } else if (fullName.trim().length <=2) {
       fullName = "";
       document.querySelector("#fullname-error").innerHTML="Họ và tên không được nhỏ hơn 2 kí tự.";
   }else if (fullName.trim().length >50 ) {
       fullName = "";
       document.querySelector("#fullname-error").innerHTML="Họ và tên không được lớn hơn 50 kí tự.";
   } else {
       document.querySelector("#fullname-error").innerHTML="";
   }


   //validate Email
    if(_.isEmpty(email)) {
       email = "";
       document.querySelector("#email-error").innerHTML="Vui lòng nhập email.";
    } else if(!validateEmail(email)) {
       email = "";
       document.querySelector("#email-error").innerHTML="Email không đúng định dạng.";
   } else {
       document.querySelector("#email-error").innerHTML="";
   }

   //validate Phone
   if(_.isEmpty(phone)) {
        phone="";
        document.querySelector("#phone-error").innerHTML="Vui lòng nhập số điện thoại.";
   } else if(!validatePhone(phone)) {
       phone ="";
       document.querySelector("#phone-error").innerHTML="Phone không đúng định dạng.";
   } else {
       document.querySelector("#phone-error").innerHTML="";
   }

   //validate Address
   if(_.isEmpty(address)) {
       address ="";
       document.querySelector("#address-error").innerHTML="Vui lòng nhập địa chỉ.";
   } else {
       document.querySelector("#address-error").innerHTML="";
   }

      //validate Address
   if(_.isEmpty(userName)) {
       userName ="";
       document.querySelector("#username-error").innerHTML="Vui lòng nhập username.";
   } else {
       document.querySelector("#username-error").innerHTML="";
   }
   if(_.isEmpty(passWord)) {
       passWord ="";
       document.querySelector("#password-error").innerHTML="Vui lòng nhập mật khẩu.";
   } else {
       document.querySelector("#password-error").innerHTML="";
   }
    if(_.isEmpty(rePassword)) {
       rePassword ="";
       document.querySelector("#repassword-error").innerHTML="Vui lòng nhập lại mật khẩu.";
   } else {
       document.querySelector("#repassword-error").innerHTML="";
   }
   if(fullName && email && phone && address && userName && passWord && rePassword) {
      console.log(fullName && email && phone && address && userName && passWord && rePassword);
   }
}



function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
function validatePhone(phone) {
  const re =  /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  return re.test(phone);
}
function onsubmit(e) {
    e.preventDefault();
}
