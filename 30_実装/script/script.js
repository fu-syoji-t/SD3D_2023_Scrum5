/*
動作に支障のない
「Cannot read properties of null (reading 'addEventListener')」
は try{}catch(e){} で例外処理
*/

// 背景アニメーション 参照(2023/07/13) https://on-ze.com/archives/6784 >> https://github.com/tipsy/bubbly-bg
window.bubbly = function (userConfig = {}) {
    // we need to create a canvas element if the user didn't provide one
    const cv = userConfig.canvas ?? (() => {
        let canvas = document.createElement("canvas");
        canvas.setAttribute("style", "position:fixed;z-index:-1;left:0;top:0;min-width:100vw;min-height:100vh;");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        document.body.appendChild(canvas);
        return canvas;
    })();
    const ctx = cv.getContext("2d");
    // we destructure the config object (with default values as fallback)
    const {compose, bubbles, background, animate} = {
        compose: userConfig.compose ?? "lighter",
        bubbles: Object.assign({ // default values
            count: Math.floor((cv.width + cv.height) * 0.025),
            radius: () => 4 + Math.random() * (window.innerWidth + window.innerHeight) / 50,// 4 + Math.random() * window.innerWidth / 25
            fill: () => `hsla(0, 0%, 100%, ${Math.random() * 0.1})`,
            angle: () => Math.random() * Math.PI * 2,
            velocity: () => 0.07 + Math.random() * 0.35,// 0.1 + Math.random() * 0.5
            shadow: () => null, // ({blur: 4, color: "#fff"})
            stroke: () => null, // ({width: 2, color: "#fff"})
        }, userConfig.bubbles ?? {}),
        background: userConfig.background ?? (() => "#eaeaea"),//
        animate: userConfig.animate !== true,
    }
    // this function contains a lot of references to its parent scope,
    // so it must be defined after the config is created
    bubbles.objectCreator = userConfig.bubbles?.objectCreator ?? (() => ({
        r: bubbles.radius(),
        f: bubbles.fill(),
        x: Math.random() * cv.width,
        y: Math.random() * cv.height,
        a: bubbles.angle(),
        v: bubbles.velocity(),
        sh: bubbles.shadow(),
        st: bubbles.stroke(),
        draw: (ctx, bubble) => {
            if (bubble.sh) {
                ctx.shadowColor = bubble.sh.color;
                ctx.shadowBlur = bubble.sh.blur;
            }
            ctx.fillStyle = bubble.f;
            ctx.beginPath();
            ctx.arc(bubble.x, bubble.y, bubble.r, 0, Math.PI * 2);
            ctx.fill();
            if (bubble.st) {
                ctx.strokeStyle = bubble.st.color;
                ctx.lineWidth = bubble.st.width;
                ctx.stroke();
            }
        }
    }));
    let bubbleArray = Array.from({length: bubbles.count}, bubbles.objectCreator);
    requestAnimationFrame(draw);
    function draw() {
        if (cv.parentNode === null) {
            bubbleArray = [];
            return cancelAnimationFrame(draw);
        }
        if (animate) {
            requestAnimationFrame(draw);
        }
        ctx.globalCompositeOperation = "source-over";
        ctx.fillStyle = background(ctx);
        ctx.fillRect(0, 0, cv.width, cv.height);
        ctx.globalCompositeOperation = compose;
        for (const bubble of bubbleArray) {
            bubble.draw(ctx, bubble);
            bubble.x += Math.cos(bubble.a) * bubble.v;
            bubble.y += Math.sin(bubble.a) * bubble.v;
            if (bubble.x - bubble.r > cv.width) {
                bubble.x = -bubble.r;
            }
            if (bubble.x + bubble.r < 0) {
                bubble.x = cv.width + bubble.r;
            }
            if (bubble.y - bubble.r > cv.height) {
                bubble.y = -bubble.r;
            }
            if (bubble.y + bubble.r < 0) {
                bubble.y = cv.height + bubble.r;
            }
        }
    }
};


// 背景色の設定
if(localStorage.getItem("backgroundColor") === null){
    bubbly({
        background: () => "#eaeaea"
    });
}else{
    bubbly({
        background: () => localStorage.getItem("backgroundColor")
    });
}

//テーマカラーの設定
if(localStorage.getItem("themeColor") == "dark"){
    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = "css/style_dark.css";

    // <head>要素に<link>要素を追加
    document.head.appendChild(link);
}










// Topへ戻るボタン
try {
    document.getElementById('scrollToTop').addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
} catch (e) {
    console.log("Not exist 'scrollToTop'");
}



var body = document.querySelector("body");

// モーダルを開くためのトリガー要素を取得
var modalTrigger = document.getElementById("modal-trigger");

// モーダル要素を取得
var modal = document.getElementById("modal");

// コンテンツ名・画像タグ・オブジェクトタグの要素を取得
var modalNameDiv = document.getElementById("modalNameDiv");
var modalContentName = document.getElementById("modalContentName");
var modalImgElem = document.getElementById("imgModal");
var modalTextElem = document.getElementById("textModal");


// 画像をクリックしたときにモーダルを表示する
function openImg(path) {
    /* 再生成したオブジェクトの取得
    var modalTextElem = document.getElementById("textModal");*/

    // body要素のスクロールを禁止し、スクロールチェーンを防止する。
    body.style.overflow = "hidden";

    // imgタグを表示する
    modalImgElem.style.display = "block";
    /* objectタグを非表示にする
    modalTextElem.style.display = "none";*/

    // リソースの名前を出力する
    modalContentName.innerHTML = path.substring(21);
    // imgタグのsrc属性を書き換える
    modalImgElem.setAttribute("src", path);

    // モーダルを表示する
    modal.style.display = "block";

    // 縮尺をリセット
    modalImgElem.style.width = "100%";
    modalImgElem.style.height = "";
    modalImgElem.style.objectFit = "contain";
};

/* ファイルをクリックしたときにモーダルを表示する
   objectタグはdata属性を書き換えるだけでは中身が書き変わらない。
   よって、objectタグのオブジェクト(id取得)を削除して再び生成する手法で中身を更新する。 
function openText(path) {
    // 再生成したオブジェクトの取得
    var modalTextElem = document.getElementById("textModal");
    // オブジェクトの親ノードの取得
    var parentElement = modalTextElem.parentNode;
    // 親ノードに対する子ノードを削除
    parentElement.removeChild(modalTextElem);
    // objectのオブジェクトを生成
    var newModalTextElem = document.createElement('object');
    // 生成したオブジェクトにidを付与
    newModalTextElem.id = "textModal";
    // 親ノードに対する子ノードに生成したオブジェクトを配置
    parentElement.appendChild(newModalTextElem);

    // body要素のスクロールを禁止し、スクロールチェーンを防止する。
    body.style.overflow = "hidden";

    // imgタグを非表示にする
    modalImgElem.style.display = "none";
    // objectタグを表示する
    newModalTextElem.style.display = "block";

    // リソースの名前を出力する
    modalContentName.innerHTML = path.substring(22);
    // objectタグのdata属性を書き換える
    newModalTextElem.setAttribute("data", path);

    // モーダルを表示する
    modal.style.display = "block";
};*/

function changeText(event){
    event.innerHTML = "ダウンロード";
}

function restoreText(event,name){
    event.innerHTML = name;
}

function sourceDownload(path){
    var result = confirm("\n"+path.substr(22)+"\n\nダウンロードしますか？\n");
    if(result){
        var link = document.createElement("a");
        link.href = path;
        link.download = path.substr(22);
        link.click();
    }
}

// 画像をダブルクリックで拡大
var scaleCheck = 0; // クリック回数

// ダブルクリックイベントのリスナーを設定
try {
    modalImgElem.addEventListener("dblclick", function() {

        modalNameDiv.style.display = "none";

        var modalImgElem = document.getElementById("imgModal");
        var currentWidth = modalImgElem.clientWidth; // 現在の画像の幅
        var currentHeight = modalImgElem.clientHeight; // 現在の画像の高さ

        if(scaleCheck == 0){
            modalImgElem.style.width = currentWidth * 1.8 + "px"; // 幅を変更
            modalImgElem.style.height = currentHeight * 1.8 + "px"; // 高さを変更

            scaleCheck++;
        }else{
            modalImgElem.style.width = "100%";
            modalImgElem.style.height = "";
            modalImgElem.style.objectFit = "contain";

            modalNameDiv.style.display = "block";

            scaleCheck = 0;
        }
        
    });
} catch (e) {
    console.log("Not exist 'modalImgElem'");
}

// モーダル外の領域をクリックしたときにモーダルを非表示にする
/*safariでは起動しない恐れあり
window.onclick = function (event) {
  if (event.target == modal) {

    body.style.overflow = "auto";

    modal.style.display = "none";
  }
};*/
document.addEventListener("click", function (event) {
    if (event.target == modal) {
  
      body.style.overflow = "auto";
  
      modal.style.display = "none";

      modalNameDiv.style.display = "block";
    }
});

// 長文テキストの開閉　アイコンの逆転
var textElems = document.querySelectorAll(".text-display");
textElems.forEach(function (element){
    if(element.offsetHeight >= 170){
        const iconElem = document.createElement("i");
        iconElem.className = "bi bi-chevron-compact-down";
        element.appendChild(iconElem);
        element.style.maxHeight = "170px"
        element.style.overflow = "hidden";
    }
});

function textOpenSwitch(id) {
    var textElem = document.getElementById(id);
    var textIconElem = textElem.querySelector(".bi-chevron-compact-down");
    if(textElem.offsetHeight >= 170){
        if(textElem.style.maxHeight != "max-content"){
            textElem.style.maxHeight = "max-content";
            textElem.style.overflow = "auto";
            textIconElem.style.transform = "rotate(180deg)";
        }else{
            textElem.style.maxHeight = "170px";
            textElem.style.overflow = "hidden";
            textIconElem.style.transform = "rotate(0deg)";
        }
    }
    console.log(textElem.offsetHeight);
}


// ファイル添付時　プレビュー用
function viewImg(hoge){
    var imgBox = document.getElementById("imgBox");
    var imgElem = document.getElementById('preview');
    if(hoge.files.length > 0){
        var fileData = new FileReader();
        fileData.readAsDataURL(hoge.files[0]);
        /*id属性が付与されているimgタグのsrc属性に、
        fileReaderで取得した値の結果を入力することでプレビュー表示している*/
        fileData.onload = (function() {
            imgElem.src = fileData.result;
        });
        imgBox.style.display = "block";
    }else{
        imgBox.style.display = "none";
    }
}
function viewSrc(hoge){
    var srcBox = document.getElementById("srcBox");
    if(hoge.files.length > 0){
        var fileName = hoge.value.substring(12);
        srcBox.innerHTML = fileName;
        srcBox.style.display = "block";
    }else{
        srcBox.style.display = "none";
    }
}

function previewImg(){
    var img = document.getElementById("img");
    var url = URL.createObjectURL(img.files[0]);
    openImg(url);
    document.getElementById("modalContentName").innerHTML = img.value.substring(12);
}

// G1-6-1-1, G1-6-2-1
function toImgModal(event,path){
    event.stopPropagation();
    openImg(path);
}
function toSourceDownload(event,path){
    event.stopPropagation();
    sourceDownload(path);
}


// G1-4-3, G1-6-1-3
// フォームAJAX通信用関数　formタグの属性を空
// データ送信と画面遷移を分離　遷移コントロールのため
/* セッション管理と(b)でのJSによる遷移ができたのでいらないかも
function sendFormData(url) {
    var form = document.querySelector('form');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.onload = function() {
        if (xhr.status === 200) {
        // リクエストが成功した場合の処理
        console.log('成功:', xhr.responseText);
        // 応答を処理するコードを追加します
        } else {
        // リクエストが失敗した場合の処理
        console.log('エラー:', xhr.status);
        }
    };
    xhr.onerror = function() {
        // リクエストが失敗した場合の処理
        console.log('ネットワークエラー');
    };
    xhr.send(formData);

    history.back();

}*/

/* loginID password チェック
function checkPass(usersID){
    const pattern = /^[a-zA-Z0-9_.+-]+$/;
    let loginID = document.pass.loginID.value;
    let password = document.pass.password.value;
    let isSuccess = true;

    if(pattern.test(loginID) == false){
        alert('ログインIDは半角英数字で設定してください。');
        isSuccess = false;
        return false;
    }else if(usersID.includes(loginID) == true){
        alert('このログインIDはすでに使用されています。');
        isSuccess = false;
        return false;
    }else if(password.length < 6){
        alert('パスワードは6文字以上の必要があります');
        isSuccess = false;
        return false;
    }
    if(isSuccess == true){
        return true;
    }
}*/

// text入力 SQLクエリ検出 POST時変換
function convertMark(){
    let textElem = document.querySelector("textarea");
    let text = textElem.value;

    text = text.replace(/\//g,"z slash z");
    text = text.replace(/`/g,"z point z");
    text = text.replace(/select/g,"z s-elect z");
    text = text.replace(/Select/g,"z S-elect z");
    text = text.replace(/SELECT/g,"z S-ELECT z");
    text = text.replace(/insert/g,"z i-nsert z");
    text = text.replace(/Insert/g,"z I-nsert z");
    text = text.replace(/INSERT/g,"z I-NSERT z");
    text = text.replace(/update/g,"z u-pdate z");
    text = text.replace(/Update/g,"z U-pdate z");
    text = text.replace(/UPDATE/g,"z U-PDATE z");
    text = text.replace(/delete/g,"z d-elete z");
    text = text.replace(/Delete/g,"z D-elete z");
    text = text.replace(/DELETE/g,"z D-ELETE z");
    text = text.replace(/create/g,"z c-reate z");
    text = text.replace(/Create/g,"z C-reate z");
    text = text.replace(/CREATE/g,"z C-REATE z");
    text = text.replace(/alter/g,"z a-lter z");
    text = text.replace(/Alter/g,"z A-lter z");
    text = text.replace(/ALTER/g,"z A-LTER z");
    text = text.replace(/drop/g,"z d-rop z");
    text = text.replace(/Drop/g,"z D-rop z");
    text = text.replace(/DROP/g,"z D-ROP z");
    
    textElem.value = text;
    return true;
}