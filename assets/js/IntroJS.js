window.addEventListener('load', function () {
    var intro = document.getElementById('intro');
    setTimeout(function() {
        intro.classList.add('fade-in');
        intro.style.opacity = '0'; // Đặt opacity của intro thành 0 sau 2 giây
        setTimeout(function() {
            intro.remove(); // Xóa div "intro" sau khi hoàn thành hiệu ứng mờ dần
          }, 2000); // Đợi 2 giây sau khi hoàn thành hiệu ứng mờ dần
    }, 500);
});