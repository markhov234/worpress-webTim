
function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

if (!isMobile()) {
//place script you don't want to run on mobile here
    var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");

    function resize() {
        var box = c.getBoundingClientRect();
        c.width = box.width;
        c.height = box.height;
    }


    var colors = ["#FFE27C", "#e6616b", "#5cd3ad"];


    function Box() {
        this.half_size = Math.floor((Math.random() * 100) + 1);
        this.x = Math.floor((Math.random() * c.width) + 20);
        this.y = Math.floor((Math.random() * c.height) + 20);
        this.r = Math.random() * Math.PI;
        this.color = colors[Math.floor((Math.random() * colors.length))];

        this.getDots = function() {

            var full = (Math.PI * 2) / 4;


            var p1 = {
                x: this.x + this.half_size * Math.sin(this.r),
                y: this.y + this.half_size * Math.cos(this.r)
            };
            var p2 = {
                x: this.x + this.half_size * Math.sin(this.r + full),
                y: this.y + this.half_size * Math.cos(this.r + full)
            };
            var p3 = {
                x: this.x + this.half_size * Math.sin(this.r + full * 2),
                y: this.y + this.half_size * Math.cos(this.r + full * 2)
            };
            var p4 = {
                x: this.x + this.half_size * Math.sin(this.r + full * 3),
                y: this.y + this.half_size * Math.cos(this.r + full * 3)
            };

            return {
                p1: p1,
                p2: p2,
                p3: p3,
                p4: p4,
            };
        }
        this.rotate = function() {
            var speed = (60 - this.half_size) / 60;
            this.r += speed * 0.002;
            this.x += speed;
            this.y += speed;
        }
        this.draw = function() {
            var dots = this.getDots();
            ctx.beginPath();
            ctx.moveTo(dots.p1.x, dots.p1.y);
            ctx.lineTo(dots.p2.x, dots.p2.y);
            ctx.lineTo(dots.p3.x, dots.p3.y);
            ctx.lineTo(dots.p4.x, dots.p4.y);
            ctx.fillStyle = this.color;
            ctx.fill();


            if (this.y - this.half_size > c.height) {
                this.y -= c.height + 100;
            }
            if (this.x - this.half_size > c.width) {
                this.x -= c.width + 100;
            }
        }
        this.drawShadow = function() {
            var dots = this.getDots();
            var angles = [];
            var points = [];



            for (var i = points.length - 1; i >= 0; i--) {
                var n = i == 3 ? 0 : i + 1;
                ctx.beginPath();
                ctx.moveTo(points[i].startX, points[i].startY);
                ctx.lineTo(points[n].startX, points[n].startY);
                ctx.lineTo(points[n].endX, points[n].endY);
                ctx.lineTo(points[i].endX, points[i].endY);
                ctx.fillStyle = "#2c343f";
                ctx.fill();
            };
        }
    }

    var boxes = [];

    function draw() {
        ctx.clearRect(0, 0, c.width, c.height);


        for (var i = 0; i < boxes.length; i++) {
            boxes[i].rotate();
            boxes[i].drawShadow();
        };
        for (var i = 0; i < boxes.length; i++) {
            // collisionDetection(i)
            boxes[i].draw();
        };
        requestAnimationFrame(draw);
    }

    resize();
    draw();

    while (boxes.length < 34) {
        boxes.push(new Box());
    }

    window.onresize = resize;



}