/* Kudu Living — front-end interactions (vanilla JS).
   Replaces the React state from the reference build with data-attribute + class toggles. */
(function () {
  "use strict";
  var d = document;

  /* ---------- Header: hide on scroll down, reveal on scroll up ---------- */
  var header = d.querySelector("[data-kudu-header]");
  if (header) {
    var lastY = window.scrollY;
    window.addEventListener(
      "scroll",
      function () {
        var y = window.scrollY;
        if (y > lastY && y > 120) header.classList.add("-translate-y-full");
        else header.classList.remove("-translate-y-full");
        lastY = y;
      },
      { passive: true }
    );
  }

  /* ---------- Mega-menu (hover) ---------- */
  var navItems = d.querySelectorAll("[data-mega]");
  var panels = d.querySelectorAll("[data-mega-panel]");
  function hideMega() {
    panels.forEach(function (p) { p.classList.add("hidden"); });
  }
  function showMega(name) {
    panels.forEach(function (p) {
      p.classList.toggle("hidden", p.getAttribute("data-mega-panel") !== name);
    });
  }
  navItems.forEach(function (item) {
    item.addEventListener("mouseenter", function () { showMega(item.getAttribute("data-mega")); });
  });
  if (header) header.addEventListener("mouseleave", hideMega);

  /* ---------- Mobile drawer ---------- */
  var drawer = d.querySelector("[data-kudu-drawer]");
  function openDrawer() { if (drawer) { drawer.classList.remove("translate-x-full"); drawer.classList.add("translate-x-0"); } }
  function closeDrawer() { if (drawer) { drawer.classList.add("translate-x-full"); drawer.classList.remove("translate-x-0"); } }
  d.querySelectorAll("[data-kudu-drawer-open]").forEach(function (b) { b.addEventListener("click", openDrawer); });
  d.querySelectorAll("[data-kudu-drawer-close]").forEach(function (b) { b.addEventListener("click", closeDrawer); });
  if (drawer) drawer.querySelectorAll("a").forEach(function (a) { a.addEventListener("click", closeDrawer); });

  /* ---------- Hero carousel (autoplay + dots) ---------- */
  d.querySelectorAll("[data-kudu-carousel]").forEach(function (root) {
    var slides = root.querySelectorAll("[data-slide]");
    var dots = root.querySelectorAll("[data-dot]");
    if (!slides.length) return;
    var i = 0, timer = null;
    function go(n) {
      i = (n + slides.length) % slides.length;
      slides.forEach(function (s, k) {
        s.classList.toggle("opacity-100", k === i);
        s.classList.toggle("opacity-0", k !== i);
        s.classList.toggle("z-10", k === i);
      });
      dots.forEach(function (dt, k) {
        dt.classList.toggle("bg-kudu-teal", k === i);
        dt.classList.toggle("bg-white/50", k !== i);
      });
    }
    function play() { stop(); timer = setInterval(function () { go(i + 1); }, 5500); }
    function stop() { if (timer) clearInterval(timer); }
    dots.forEach(function (dt, k) { dt.addEventListener("click", function () { go(k); play(); }); });
    go(0); play();
  });

  /* ---------- Product Inspirations (scene carousel + hotspots) ---------- */
  d.querySelectorAll("[data-kudu-inspo]").forEach(function (root) {
    var scenes = root.querySelectorAll("[data-scene]");
    var prev = root.querySelector("[data-inspo-prev]");
    var next = root.querySelector("[data-inspo-next]");
    var s = 0;
    function show(n) {
      s = (n + scenes.length) % scenes.length;
      scenes.forEach(function (sc, k) {
        sc.classList.toggle("opacity-100", k === s);
        sc.classList.toggle("opacity-0", k !== s);
        sc.classList.toggle("z-10", k === s);
        sc.querySelectorAll("[data-popup]").forEach(function (p) { p.classList.add("hidden"); });
      });
    }
    if (prev) prev.addEventListener("click", function () { show(s - 1); });
    if (next) next.addEventListener("click", function () { show(s + 1); });
    root.querySelectorAll("[data-hotspot]").forEach(function (h) {
      h.addEventListener("click", function (e) {
        e.stopPropagation();
        var pop = h.parentNode.querySelector("[data-popup]");
        if (!pop) return;
        var wasHidden = pop.classList.contains("hidden");
        root.querySelectorAll("[data-popup]").forEach(function (p) { p.classList.add("hidden"); });
        if (wasHidden) pop.classList.remove("hidden");
      });
    });
    root.addEventListener("click", function () {
      root.querySelectorAll("[data-popup]").forEach(function (p) { p.classList.add("hidden"); });
    });
    if (scenes.length) show(0);
  });

  /* ---------- Product gallery (thumb → main) ---------- */
  d.querySelectorAll("[data-kudu-gallery]").forEach(function (root) {
    var main = root.querySelector("[data-gallery-main]");
    root.querySelectorAll("[data-thumb]").forEach(function (t) {
      t.addEventListener("click", function () {
        var src = t.getAttribute("data-img");
        if (main && src) main.setAttribute("src", src);
        root.querySelectorAll("[data-thumb]").forEach(function (o) { o.classList.remove("ring-2", "ring-kudu-navy"); });
        t.classList.add("ring-2", "ring-kudu-navy");
      });
    });
  });

  /* ---------- Product tabs ---------- */
  d.querySelectorAll("[data-kudu-tabs]").forEach(function (root) {
    var tabs = root.querySelectorAll("[data-tab]");
    tabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        var name = tab.getAttribute("data-tab");
        tabs.forEach(function (t) { t.classList.toggle("text-kudu-navy", t === tab); t.classList.toggle("text-kudu-muted", t !== tab); });
        var target = root.querySelector('[data-tabpanel="' + name + '"]');
        if (target) target.scrollIntoView({ behavior: "smooth", block: "start" });
      });
    });
  });

  /* ---------- Reveal on scroll ---------- */
  var reveals = d.querySelectorAll("[data-reveal]");
  if (reveals.length && "IntersectionObserver" in window) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) { e.target.classList.add("is-revealed"); io.unobserve(e.target); }
        });
      },
      { threshold: 0.12 }
    );
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add("is-revealed"); });
  }
})();
