document.addEventListener('DOMContentLoaded', function () {
    var menuItems = document.querySelectorAll('.aside_menu_list_item');

    menuItems.forEach(function (item) {
        item.addEventListener('click', function () {
            if (item.classList.contains('active')) {
                item.classList.remove('active');
            } else {
                // Xóa lớp 'active' từ tất cả các mục
                menuItems.forEach(function (innerItem) {
                    innerItem.classList.remove('active');
                });

                // Thêm lớp 'active' vào mục được bấm
                item.classList.add('active');
            }
        });
    });
});