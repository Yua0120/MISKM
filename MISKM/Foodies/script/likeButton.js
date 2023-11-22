document.addEventListener('DOMContentLoaded', function() {
    // いいねボタンがクリックされたときの処理
    document.querySelectorAll('.like-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // 投稿のIDを取得
            var productId = button.getAttribute('data-product-id');

            // いいねの状態を切り替える
            toggleLike(productId, button);
        });
    });

    // いいねの状態を切り替える関数
    function toggleLike(product_id, button) {
        // Ajaxリクエストを使ってサーバー側の処理を実行
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // サーバーからの応答を受け取り、画像を切り替える
                var response = xhr.responseText;
                console.log(response);
                if (response.includes("解除")) {
                    button.src = '../../img/kuroha-to.jpg';  // 未いいねの画像
                } else {
                    button.src = '../../img/pinkuha-to.jpg';  // いいねの画像
                }
            }
        };

        xhr.open("POST", "likeButton.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("product_id=" + product_id);
    }
});