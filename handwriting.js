(function(window, document) {

    // Establish the root object, `window` (`self`) in the browser, 
    // or `this` in some virtual machines. We use `self`
    // instead of `window` for `WebWorker` support.
    var root = typeof self === 'object' && self.self === self && self || this;

    // Create a safe reference to the handwriting object for use below.        
    var handwriting = function(obj) {
        if (obj instanceof handwriting) return obj;
        if (!(this instanceof handwriting)) return new handwriting(obj);
        this._wrapped = obj;
    };

    root.handwriting = handwriting;

    handwriting.Canvas = function(cvs, lineWidth) {
        this.canvas = cvs;
        this.cxt = cvs.getContext("2d");
        this.cxt.lineCap = "round";
        this.cxt.lineJoin = "round";
        this.lineWidth = lineWidth || 3;
        this.width = cvs.width;
        this.height = cvs.height;
        this.drawing = false;
        this.handwritingX = [];
        this.handwritingY = [];
        this.trace = [];
        this.options = {};
        this.step = [];
        this.redo_step = [];
        this.redo_trace = [];
        this.allowUndo = false;
        this.allowRedo = false;
        cvs.addEventListener("mousedown", this.mouseDown.bind(this));
        cvs.addEventListener("mousemove", this.mouseMove.bind(this));
        cvs.addEventListener("mouseup", this.mouseUp.bind(this));
        cvs.addEventListener("touchstart", this.touchStart.bind(this));
        cvs.addEventListener("touchmove", this.touchMove.bind(this));
        cvs.addEventListener("touchend", this.touchEnd.bind(this));
        this.callback = undefined;
        this.recognize = handwriting.recognize;
    };

    handwriting.Canvas.prototype.setLineWidth = function(lineWidth) {
        this.lineWidth = lineWidth;
    };

    handwriting.Canvas.prototype.setCallBack = function(callback) {
        this.callback = callback;
    };

    handwriting.Canvas.prototype.setOptions = function(options) {
        this.options = options;
    };


    handwriting.Canvas.prototype.mouseDown = function(e) {
        // new stroke
        this.cxt.lineWidth = this.lineWidth;
        this.handwritingX = [];
        this.handwritingY = [];
        this.drawing = true;
        this.cxt.beginPath();
        var rect = this.canvas.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;
        this.cxt.moveTo(x, y);
        this.handwritingX.push(x);
        this.handwritingY.push(y);
    };


    handwriting.Canvas.prototype.mouseMove = function(e) {
        if (this.drawing) {
            var rect = this.canvas.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;
            this.cxt.lineTo(x, y);
            this.cxt.stroke();
            this.handwritingX.push(x);
            this.handwritingY.push(y);
        }
    };

    handwriting.Canvas.prototype.mouseUp = function() {
        var w = [];
        w.push(this.handwritingX);
        w.push(this.handwritingY);
        w.push([]);
        this.trace.push(w);
        this.drawing = false;
        if (this.allowUndo) this.step.push(this.canvas.toDataURL());
    };


    handwriting.Canvas.prototype.touchStart = function(e) {
        e.preventDefault();
        this.cxt.lineWidth = this.lineWidth;
        this.handwritingX = [];
        this.handwritingY = [];
        var de = document.documentElement;
        var box = this.canvas.getBoundingClientRect();
        var top = box.top + window.pageYOffset - de.clientTop;
        var left = box.left + window.pageXOffset - de.clientLeft;
        var touch = e.changedTouches[0];
        touchX = touch.pageX - left;
        touchY = touch.pageY - top;
        this.handwritingX.push(touchX);
        this.handwritingY.push(touchY);
        this.cxt.beginPath();
        this.cxt.moveTo(touchX, touchY);
    };

    handwriting.Canvas.prototype.touchMove = function(e) {
        e.preventDefault();
        var touch = e.targetTouches[0];
        var de = document.documentElement;
        var box = this.canvas.getBoundingClientRect();
        var top = box.top + window.pageYOffset - de.clientTop;
        var left = box.left + window.pageXOffset - de.clientLeft;
        var x = touch.pageX - left;
        var y = touch.pageY - top;
        this.handwritingX.push(x);
        this.handwritingY.push(y);
        this.cxt.lineTo(x, y);
        this.cxt.stroke();
    };

    handwriting.Canvas.prototype.touchEnd = function(e) {
        var w = [];
        w.push(this.handwritingX);
        w.push(this.handwritingY);
        w.push([]);
        this.trace.push(w);
        if (this.allowUndo) this.step.push(this.canvas.toDataURL());
    };


    handwriting.Canvas.prototype.erase = function() {
        this.cxt.clearRect(0, 0, this.width, this.height);
        this.step = [];
        this.redo_step = [];
        this.redo_trace = [];
        this.trace = [];
    };

    function loadFromUrl(url, cvs) {
        var imageObj = new Image();
        imageObj.onload = function() {
            cvs.cxt.clearRect(0, 0, this.width, this.height);
            cvs.cxt.drawImage(imageObj, 0, 0);
        };
        imageObj.src = url;
    }

})(window, document);