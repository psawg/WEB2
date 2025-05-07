$(document).ready(function() {
    // Hàm để tải game
    function loadGames(page = 1, search = '', sort = '') {
      $.ajax({
        url: './php/xulygame.php',
        method: 'GET',
        dataType: 'json',
        data: { page, search, sort },
        success: function(response) {
          console.log(response);
          if (response && Array.isArray(response.games)) {
            // Xóa danh sách cũ
            $('#gameList').empty();
  
            // Render lại từng game
            response.games.forEach(function(game) {
              const gameItem = `
                <div class="game-item">
                  <img src="${game.cover_image}" alt="${game.title}" class="game-img"/>
                  <h3>${game.title}</h3>
                  <p>${game.description}</p>
                  <p>Price: $${game.price}</p>
                  <button class="btn-add-cart" data-id="${game.game_id}" title="Thêm vào giỏ hàng">
                    <i class="fa fa-cart-plus"></i>
                  </button>
                </div>
              `;
              $('#gameList').append(gameItem);
            });
  
            // Phân trang
            $('#pagination').empty();
            for (let i = 1; i <= response.totalPages; i++) {
              const cls = i === page ? 'active' : '';
              $('#pagination').append(
                `<button class="page-btn ${cls}" data-page="${i}">${i}</button>`
              );
            }
  
            if (response.totalPages <= 1) {
                // Nếu chỉ có 1 trang hoặc không có trang nào, ẩn cả .pagination
                $('#pagination').hide();
              } else {
                // Nếu nhiều hơn 1 trang, đảm bảo thanh phân trang được hiển thị
                $('#pagination').show();
              }
              
            // Bật sự kiện phân trang
            $('.page-btn').off('click').on('click', function() {
              loadGames($(this).data('page'), search, sort);
            });
  
            // Bật sự kiện thêm vào giỏ hàng
            $('.btn-add-cart').off('click').on('click', function() {
              const gameId = $(this).data('id');
              // TODO: Gọi AJAX hoặc xử lý thêm vào giỏ hàng tại đây
              console.log('Thêm game_id', gameId, 'vào giỏ hàng');
            });
          } else {
            $('#gameList').html('<p>No games found</p>');
          }
        },
        error: function(xhr, status, err) {
          console.error('AJAX Error:', err);
          console.error('Response Text:', xhr.responseText);
          alert('Có lỗi khi tải dữ liệu game.');
        }
      });
    }
  
    // Load trang đầu tiên
    loadGames();
  
    // Sự kiện tìm kiếm
    $('#searchGame').on('keyup', function() {
      loadGames(1, $(this).val(), $('#sortPrice').val());
    });
  
    // Sự kiện sắp xếp giá
    $('#sortPrice').on('change', function() {
      loadGames(1, $('#searchGame').val(), $(this).val());
    });
  });
  