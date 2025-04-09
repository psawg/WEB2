// Lay gia tri cua o nhap ten dang ky va mat khau
function validateRegistration() {
  const inputUsernameRegister = document.querySelector(".input-signup-username");
  const inputPasswordRegister = document.querySelector(".input-signup-password");

  // Ham kiem dinh dang email
  function check(e) {
      const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
      if (!regex.test(e)) {
          alert("Khong phai la email");
          inputUsernameRegister.value = "";
          return false;
      }
      return true;
  }

  // Ham kiem tra mat khau
  function checkPassword(e, min) {
      const regex = /[1-9]/;
      if (!regex.test(e) || e.length < min) {
          alert("Vui lòng nhập ít nhất 6 kí tự");
          return false;
      }
      return true;
  }

  // Lay gia tri cua o xac nhan mat khau
  const confirmPassword = document.getElementsByName("confirmPassword")[0].value;

  // Kiem tra cac o co trong hay khong 
  if (
      inputUsernameRegister.value === "" ||
      inputPasswordRegister.value === "" ||
      confirmPassword === ""
  ) {
      alert("Vui lòng không để trống");
      return false;
  }

  // Kiem tra dinh dang cua email va mat khau
  if (!check(inputUsernameRegister.value) || !checkPassword(inputPasswordRegister.value, 6)) {
      return false;
  }

  // Kiem tra mat khau va xac nhan mat khau co khop voi nhau hay khong 
  if (inputPasswordRegister.value !== confirmPassword) {
      alert("Mật khẩu và xác nhận mật khẩu không khớp");
      return false;
  }

  // Luu thong tin nguoi dung vao localStorage va chuyen huong den trang dang nhap
  const user = {
      username: inputUsernameRegister.value,
      password: inputPasswordRegister.value,
  };
  const json = JSON.stringify(user);
  localStorage.setItem(inputUsernameRegister.value, json);
  alert("Đăng Ký Thành Công");
  window.location.href = "login.html";
  return false; 
}