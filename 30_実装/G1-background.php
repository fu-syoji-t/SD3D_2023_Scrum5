<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Help</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    
<script>
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
            count: Math.floor((cv.width + cv.height) * 0.02),
            radius: () => 4 + Math.random() * window.innerWidth / 25,
            fill: () => `hsla(0, 0%, 100%, ${Math.random() * 0.1})`,
            angle: () => Math.random() * Math.PI * 2,
            velocity: () => 0.1 + Math.random() * 0.5,
            shadow: () => null, // ({blur: 4, color: "#fff"})
            stroke: () => null, // ({width: 2, color: "#fff"})
        }, userConfig.bubbles ?? {}),
        background: userConfig.background ?? (() => "#d7c1fa"),//eaeaea 赤fad5ea　黄fff5d0　緑ced　青d5eafa 紫e3e0fa
        animate: userConfig.animate !== true,       //aacafa ~ d7c1fa
    }                                               //
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
bubbly();
</script>

    <div class="container">
            
        <div class="row justify-content-center"><!-- ヘッダー用コンテナ -->

        <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6"><!-- ヘッダー用のコンテナサイズ -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- フォーム -->
                

            </div>

        </div>

    </div>
    
</body>

</html>