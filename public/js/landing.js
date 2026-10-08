/* Ignite Talent Group — landing page effects (ported from index.html).
   Animated tagline reveal + background fiber canvas. */
(function () {
  "use strict";

  var tagline = document.querySelector(".brand-landing-tagline");
  if (tagline) {
    var target = tagline.dataset.foldText || "";
    var holder = tagline.querySelector("span");
    if (holder) {
      holder.textContent = "";
      Array.from(target).forEach(function (char, i) {
        var node = document.createElement("span");
        node.className = "fold-char" + (char === " " ? " space" : "");
        node.textContent = char === " " ? "\u00a0" : char;
        node.style.animationDelay = (0.22 + i * 0.018) + "s";
        holder.appendChild(node);
      });
    }
  }

  var canvas = document.querySelector(".brand-landing-fibers");
  if (!canvas) return;
  var ctx = canvas.getContext("2d");
  var reduced = window.matchMedia("(prefers-reduced-motion: reduce)");
  var w = 0, h = 0, dpr = 1, raf = 0, t = 0;

  function resize() {
    var rect = canvas.getBoundingClientRect();
    dpr = Math.min(window.devicePixelRatio || 1, 1.5);
    w = Math.max(1, rect.width);
    h = Math.max(1, rect.height);
    canvas.width = Math.floor(w * dpr);
    canvas.height = Math.floor(h * dpr);
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function draw() {
    ctx.clearRect(0, 0, w, h);
    var cx = w * 0.54, cy = h * 0.48;
    var max = Math.max(w, h) * 1.2;
    var lines = Math.min(34, Math.max(20, Math.round(w / 48)));

    for (var i = 0; i < lines; i++) {
      var phase = i * 0.43;
      var spread = (i - (lines - 1) / 2) / lines;
      ctx.beginPath();

      for (var s = -1; s <= 1.001; s += 0.025) {
        var x = cx + s * max;
        var curve = Math.sin(s * 2.4 + phase + t * 0.00022) * (h * 0.075)
          + Math.sin(s * 5.8 - phase * 0.7 + t * 0.00015) * (h * 0.028);
        var y = cy + spread * h * 0.62 + curve + s * s * spread * h * 0.22;

        if (s === -1) ctx.moveTo(x, y);
        else ctx.lineTo(x, y);
      }

      var alpha = 0.035 + (1 - Math.abs(spread) * 1.8) * 0.045;
      ctx.strokeStyle = "rgba(69,82,255," + Math.max(0.018, alpha) + ")";
      ctx.lineWidth = i % 7 === 0 ? 1.5 : 0.8;
      ctx.stroke();
    }

    if (!reduced.matches) {
      t += 16.67;
      raf = requestAnimationFrame(draw);
    }
  }

  function start() {
    cancelAnimationFrame(raf);
    resize();
    draw();
    if (reduced.matches) cancelAnimationFrame(raf);
  }

  new ResizeObserver(resize).observe(canvas);
  if (reduced.addEventListener) reduced.addEventListener("change", start);
  window.addEventListener("resize", resize, { passive: true });
  start();
})();
