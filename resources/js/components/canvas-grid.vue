<template>
    <canvas>
        <!--
            Aspect ratio of canvas always has to be: 2 to 1 (2:1)
            Those attributes have to be placed on the element itself (not by CSS)
            For more lines on the grid you can bump those numbers
        -->
    </canvas>
</template>

<script>
    export default {
        data() {
            return {
                width: 400,
                height: 200
            }
        },
        methods: {
            initCanvas (data) {
                // Define canvas
                let ctx = this.$el.getContext('2d');

                // Clear canvas
                ctx.clearRect(0, 0, this.$el.width, this.$el.height);

                // Define canvas widths in pixels
                this.$el.width = this.width;
                this.$el.height = this.height;

                // Draw grid and squares from data
                this.drawGrid(ctx);
                this.drawSquares(ctx, JSON.parse(data));
            },
            drawGrid (context) {
                // Grid svg (for faster loading)
                const gridData = '<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="smallGrid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="gray" stroke-width="0.5" /></pattern></defs><rect width="100%" height="100%" fill="url(#smallGrid)" /></svg>';

                // Draw the grid svg as image behind the canvas the element
                var DOMURL = window.URL || window.webkitURL || window;
                var img = new Image();
                var svg = new Blob([gridData], {type: 'image/svg+xml;charset=utf-8'});
                var url = DOMURL.createObjectURL(svg);
                img.onload = function () {
                    context.drawImage(img, 0, 0);
                    DOMURL.revokeObjectURL(url);
                }
                img.src = url;
            },
            drawSquares(ctx, data) {
                // Check if data isn't empty and loop trough the data
                if (data != null) for (let index = 0; index < data.length; index++) this.drawSquare(ctx, data[index].x * 10, data[index].y * 10);
            },
            drawSquare(ctx, x, y) {
                ctx.fillStyle= "#a200ff";
                ctx.fillRect(x, y, 10, 10);
            }
        }
    }
</script>