document.addEventListener('DOMContentLoaded', function() {
    const accountLink = document.querySelector('a[href="./page/login.php"]');
    
    if (accountLink) {
        accountLink.addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn chuyển hướng mặc định
            
            // Gọi AJAX kiểm tra đăng nhập
            fetch('../BackEnd/check_login.php')
                .then(response => response.json())
                .then(data => {
                    if (data.isLoggedIn) {
                        window.location.href = './page/user.php';
                    } else {
                        window.location.href = './page/login.php';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    window.location.href = './page/login.php'; // Mặc định chuyển đến login nếu có lỗi
                });
        });
    }
});