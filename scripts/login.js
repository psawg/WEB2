function validateLogin() {
  const inputUsername = document.querySelector(".input-login-username");
  const inputPassword = document.querySelector(".input-login-password");

  // Kiem tra xem cac o nhap co bo trong hay khong
  if (inputUsername.value === "" || inputPassword.value === "") {
      alert("Vui lòng không để trống");
      return false;
  } 
  // Kiem tra thong tin dang nhap
  else {
      const user = JSON.parse(localStorage.getItem(inputUsername.value));
      if (user && user.password === inputPassword.value) {
          alert("Đăng Nhập Thành Công");
          window.location.href = "/All_Of_Games.html";
      } 
      else {
          alert("Đăng Nhập Thất Bại");
      }
  }
  return false;
}