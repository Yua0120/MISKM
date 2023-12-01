document.addEventListener('DOMContentLoaded', function() {
    // HTMLのid値を使って以下のDOM要素を取得
    const downbutton = document.getElementById('down');
    const upbutton = document.getElementById('up');
    const text = document.getElementById('textbox');

    text.value = 1;

    // フォームの送信イベントを取得
    const form = document.getElementById('productForm');

    form.addEventListener('submit', (event) => {
        // フォームデータを取得
        const formData = new FormData(form);
        formData.append('count', text.value); // テキストボックスの値を追加

        // Ajaxリクエストを作成
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'P_detail-output.php', true);

        // Ajaxリクエストが完了したときの処理
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // サーバーサイドからの応答を処理する
                console.log(xhr.responseText);
            } else {
                console.error('Server Error:', xhr.statusText);
            }
        };

        // Ajaxリクエストのエラー時の処理
        xhr.onerror = function () {
            console.error('Network Error');
        };

        // Ajaxリクエストを送信
        xhr.send(formData);
    });

    // ボタンが押されたらカウント減
    downbutton.addEventListener('click', () => {
        // 0以下にはならないようにする
        if (text.value >= 1) {
            text.value--;
        }
    });

    // ボタンが押されたらカウント増
    upbutton.addEventListener('click', () => {
        text.value++;
    });
});

