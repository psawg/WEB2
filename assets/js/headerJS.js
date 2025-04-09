// Hamburger Open Side Nav
function openNav() {
  document.getElementById("idSideNav").style.width = "250px";
}

// Hamburger Close Side Nav
function closeNav() {
  document.getElementById("idSideNav").style.width = "0px";
}

//Behavior NavBar Scroll
let lastScrollTop = 0;
let timeout;
window.addEventListener("scroll", function () {
  var navBar = document.querySelector(".NavBar");
  clearTimeout(timeout);

  timeout = setTimeout(() => {
    const threshold = 300;
    const navBar = document.querySelector(".NavBar");

    if (window.scrollY > lastScrollTop + threshold) {
        navBar.classList.add("nav-hide");
        navBar.classList.remove("nav-show");
    } else {
      navBar.classList.add("nav-show");
      navBar.classList.remove("nav-hide");
    }

    lastScrollTop = window.scrollY;
    // console.log(lastScrollTop);
    // console.log(window.scrollY);
  }, 10); // delay in milliseconds
});






function test1() {
  // Kiểm tra đường dẫn hiện tại của trang
  if (window.location.pathname.includes("All_Of_Games.html")) {
    // Nếu đang ở trang "All_Of_Games.html", thực hiện scrollToNews()
    scrollToNews();
  } else {
    // Nếu không phải trang "All_Of_Games.html", chuyển hướng đến trang đó và sau đó thực hiện scrollToNews()
    window.location.href = "/All_Of_Games.html";
    setTimeout(function () {
      scrollToNews();
    }, 2000);
  }
}
//Cuộn tới phần news khi nhấn "News" trên NavBar
function scrollToNews() {
  // Lấy phần tử "midContent" bằng id
  var NewsSection = document.getElementById("midContent");

  // Lấy vị trí của phần tử "midContent" cùng với vị trí cuộn hiện tại của trang
  var targetPosition = NewsSection.getBoundingClientRect().top + window.scrollY;

  // Lấy vị trí cuộn hiện tại của trang
  var startPosition = window.scrollY;

  // Tính khoảng cách cần di chuyển từ vị trí hiện tại đến vị trí đích
  var distance = targetPosition - startPosition;

  // Thời gian mà quá trình trượt sẽ diễn ra (trong mili giây)
  var duration = 1000;

  // Thời điểm bắt đầu của quá trình trượt
  var startTime = null;

  // Hàm thực hiện quá trình trượt mượt
  function animation(currentTime) {
    // Nếu chưa có startTime, gán startTime bằng currentTime
    if (startTime === null) startTime = currentTime;

    // Tính thời gian đã trôi qua từ khi bắt đầu quá trình trượt
    var elapsedTime = currentTime - startTime;

    // Tính giá trị mới của vị trí cuộn dựa trên hàm easing
    var scrollY = ease(elapsedTime, startPosition, distance, duration);

    // Thiết lập vị trí cuộn mới cho trang
    window.scrollTo(0, scrollY);

    // Nếu thời gian đã trôi qua chưa đạt đến thời gian trượt, tiếp tục gọi animation()
    if (elapsedTime < duration) requestAnimationFrame(animation);
  }

  // Hàm easing để tạo hiệu ứng trượt mượt
  function ease(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  }

  // Gọi hàm animation() lần đầu tiên để bắt đầu quá trình trượt
  requestAnimationFrame(animation);
}







function test2() {
  // Kiểm tra đường dẫn hiện tại của trang
  if (window.location.pathname.includes("All_Of_Games.html")) {
    // Nếu đang ở trang "All_Of_Games.html", thực hiện scrollToNews()
    scrollToGames();
  } else {
    // Nếu không phải trang "All_Of_Games.html", chuyển hướng đến trang đó và sau đó thực hiện scrollToNews()
    window.location.href = "/All_Of_Games.html";
    setTimeout(function () {
      scrollToNews();
    }, 2000);
  }
}
//Cuộn tới phần game table khi nhấn "Game" trên NavBar
function scrollToGames() {
  var gamesSection = document.getElementById("botContent");

  var targetPosition =
    gamesSection.getBoundingClientRect().top + window.scrollY;

  var startPosition = window.scrollY;

  var distance = targetPosition - startPosition;

  var duration = 1000;

  var startTime = null;

  function animation(currentTime) {
    if (startTime === null) startTime = currentTime;

    var elapsedTime = currentTime - startTime;

    var scrollY = ease(elapsedTime, startPosition, distance, duration);

    window.scrollTo(0, scrollY);

    if (elapsedTime < duration) requestAnimationFrame(animation);
  }

  function ease(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  }

  requestAnimationFrame(animation);
}
