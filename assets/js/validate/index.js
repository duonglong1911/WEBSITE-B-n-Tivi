function save() {
    let fullName = document.querySelector("#fullname").value;
    let userName = document.querySelector("#username").value;
    let passWord = document.querySelector("#password").value;
    let rePassword = document.querySelector("#repassword").value;
    let email = document.querySelector("#email").value;
    let phone = document.querySelector("#number").value;
    let address = document.querySelector("#address").value;

    // console.log(document.querySelectorAll("input[type=text]"));
   //validate Name
   if(_.isEmpty(fullName)) {
       fullName="";
       document.querySelector("#fullname-error").innerHTML="Vui lòng nhập họ tên.";
       document.getElementById("fullname").classList.add("input-error");
   } else if (fullName.trim().length <=2) {
       fullName = "";
       document.querySelector("#fullname-error").innerHTML="Họ và tên không được nhỏ hơn 2 kí tự.";
       document.getElementById("fullname").classList.add("input-error");
   }else if (fullName.trim().length >50 ) {
       fullName = "";
       document.querySelector("#fullname-error").innerHTML="Họ và tên không được lớn hơn 50 kí tự.";
       document.getElementById("fullname").classList.add("input-error");
   } else {
       document.querySelector("#fullname-error").innerHTML="";
       document.getElementById("fullname").classList.remove("input-error");
   }


   //validate Email
    if(_.isEmpty(email)) {
       email = "";
       document.querySelector("#email-error").innerHTML="Vui lòng nhập email.";
       document.getElementById("email").classList.add("input-error");
    } else if(!validateEmail(email)) {
       email = "";
       document.querySelector("#email-error").innerHTML="Email không đúng định dạng.";
       document.getElementById("email").classList.add("input-error");
   } else {
       document.querySelector("#email-error").innerHTML="";
       document.getElementById("email").classList.remove("input-error");
   }

   //validate Phone
   if(_.isEmpty(phone)) {
        phone="";
        document.querySelector("#number-error").innerHTML="Vui lòng nhập số điện thoại.";
       document.getElementById("number").classList.add("input-error");
   } else if(!validatePhone(phone)) {
       phone ="";
       document.querySelector("#number-error").innerHTML="Phone không đúng định dạng.";
       document.getElementById("number").classList.add("input-error");
   } else {
       document.querySelector("#number-error").innerHTML="";
       document.getElementById("number").classList.remove("input-error");
   }

   //validate Address
   if(_.isEmpty(address)) {
       address ="";
       document.querySelector("#address-error").innerHTML="Vui lòng nhập địa chỉ.";
       document.getElementById("address").classList.add("input-error");
   } else {
       document.querySelector("#address-error").innerHTML="";
       document.getElementById("address").classList.add("input-error");
   }

      //validate Address
   if(_.isEmpty(userName)) {
       userName ="";
       document.querySelector("#username-error").innerHTML="Vui lòng nhập username.";
       document.getElementById("username").classList.add("input-error");
   } else {
       document.querySelector("#username-error").innerHTML="";
       document.getElementById("email").classList.remove("input-error");
   }
   if(_.isEmpty(passWord)) {
       passWord ="";
       document.querySelector("#password-error").innerHTML="Vui lòng nhập mật khẩu.";
       document.getElementById("password").classList.add("input-error");
   } else {
       document.querySelector("#password-error").innerHTML="";
       document.getElementById("password").classList.remove("input-error");
   }
    if(_.isEmpty(rePassword)) {
       rePassword ="";
       document.querySelector("#repassword-error").innerHTML="Vui lòng nhập lại mật khẩu.";
       document.getElementById("repassword").classList.add("input-error");
   } else if(rePassword != passWord){
        rePassword ="";
       document.querySelector("#repassword-error").innerHTML="Mật khẩu nhập lại không đúng";
       document.getElementById("repassword").classList.add("input-error");
   } else {
       document.querySelector("#repassword-error").innerHTML="";
       document.getElementById("email").classList.remove("input-error");
   }
   
   if(fullName && email && phone && address && userName && passWord && rePassword) {
      console.log(fullName && email && phone && address && userName && passWord && rePassword);
      document.getElementById("btn_login").setAttribute("type","submit");
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
