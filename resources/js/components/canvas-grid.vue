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
                width: 1600,
                height: 800
            }
        },
        methods: {
            initCanvas (gridInformation, otherRooms) {
                // Define canvas
                let ctx = this.$el.getContext('2d');

                // Clear canvas
                ctx.clearRect(0, 0, this.$el.width, this.$el.height);

                // Draw grid and squares from gridInformation
                this.drawSquares(ctx, JSON.parse(gridInformation), otherRooms);
            },
            drawGrid (context) {
                // Grid svg (for faster loading)
                const gridData = '<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="smallGrid" width="12" height="12" patternUnits="userSpaceOnUse"><path d="M 12 0 L 0 0 0 12" fill="none" stroke="gray" stroke-width="0.5" /></pattern></defs><rect width="100%" height="100%" fill="url(#smallGrid)" /></svg>';

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
            drawSquares(ctx, gridInformation, roomsData) {
                /* 
                    bounds[0] = top bound
                    bounds[0] = right bound
                    bouunds[2] = bottom bound
                    bounds[3] = left bound
                */
                let bounds = [null, null, null, null];

                // Check if gridInformation isn't empty and loop trough the blocks in the grid
                if (gridInformation != null) {

                    // Loop trough the different rooms
                    for (let roomIndex = 0; roomIndex < roomsData.length; roomIndex++) {

                        // Parse JSON-gridinformation for that room
                        const roomGridLocation = JSON.parse(roomsData[roomIndex].grid_location);

                        // Loop trough the grid-squared of that room to define bounds
                        for (let index = 0; index < roomGridLocation.length; index++) {

                            // Set new bounds if bounds are bigger then previous
                            if (roomGridLocation[index].Y < bounds[0] || bounds[0] == null) bounds[0] = roomGridLocation[index].Y;
                            if (roomGridLocation[index].X > bounds[1]) bounds[1] = roomGridLocation[index].X;
                            if (roomGridLocation[index].Y > bounds[2]) bounds[2] = roomGridLocation[index].Y;
                            if (roomGridLocation[index].X < bounds[3] || bounds[3] == null) bounds[3] = roomGridLocation[index].X;
                        }
                    }

                    // Define canvas widths in pixels
                    this.$el.width = (bounds[1] - bounds[3] + 36);
                    this.$el.height = (bounds[2] - bounds[0] + 36);
                    this.drawGrid(ctx);

                    // Loop trough the different rooms
                    for (let roomIndex = 0; roomIndex < roomsData.length; roomIndex++) {

                        // Parse JSON-gridinformation for that room
                        const roomGridLocation = JSON.parse(roomsData[roomIndex].grid_location);

                        // Loop trough the grid-squared of that room to draw the room
                        for (let index = 0; index < roomGridLocation.length; index++) {
                            this.drawSquare(ctx, roomGridLocation[index].X - bounds[3] + 12, roomGridLocation[index].Y - bounds[0] + 12, roomsData[roomIndex].id == this.$parent.room.id);
                        }
                    }
                }
            },
            drawSquare(ctx, x, y, highlight) {
                ctx.fillStyle= highlight ? "#a200ff" : "#666666";
                ctx.fillRect(x, y, 12, 12);
            }
        }
    }
</script>