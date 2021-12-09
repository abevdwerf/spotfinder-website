var ctx = document.getElementsByClassName("rooms__placing")[0].getContext('2d');

// Drawing grid with an SVG-image for faster implementation
function drawGrid (context) {
    const gridData = ' \
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"> \
            <defs> \
                <pattern id="smallGrid" width="10" height="10" patternUnits="userSpaceOnUse"> \
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="gray" stroke-width="0.5" /> \
                </pattern> \
            </defs> \
            <rect width="100%" height="100%" fill="url(#smallGrid)" /> \
        </svg> \
    ';

    var DOMURL = window.URL || window.webkitURL || window;
    var img = new Image();
    var svg = new Blob([gridData], {type: 'image/svg+xml;charset=utf-8'});
    var url = DOMURL.createObjectURL(svg);
    img.onload = function () {
        context.drawImage(img, 0, 0);
        DOMURL.revokeObjectURL(url);
    }
    img.src = url;
}

function drawSquare (x, y) {
    ctx.fillRect(x, y, 10, 10);
}

drawGrid(ctx);
ctx.fillStyle= "#a200ff";
drawSquare(10, 10);

// Keep the version down below for documentation purposes

// // Draw custom grid with lines
// for (let index = 0; index < 600; index += 10) {
//     ctx.beginPath();

//     // Horizontal lines
//     ctx.moveTo(index, 0);
//     ctx.lineTo(index, 600);

//     // Horizontal lines
//     ctx.moveTo(0, index);
//     ctx.lineTo(600, index);

//     ctx.lineWidth = .5;
//     ctx.strokeStyle = "#666666";
//     ctx.stroke();
// }