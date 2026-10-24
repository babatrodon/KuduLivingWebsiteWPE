/* Kudu Living — front-end interactions (vanilla JS).
   Replaces the React state from the reference build with data-attribute + class toggles. */
(function () {
  "use strict";
  var d = document;

  /* Horizontal swipe on touch screens: calls fn(+1) for next, fn(-1) for previous. */
  function onSwipe(el, fn) {
    var x0 = null, y0 = 0;
    el.addEventListener("touchstart", function (e) { x0 = e.touches[0].clientX; y0 = e.touches[0].clientY; }, { passive: true });
    el.addEventListener("touchend", function (e) {
      if (x0 === null) return;
      var dx = e.changedTouches[0].clientX - x0, dy = e.changedTouches[0].clientY - y0;
      x0 = null;
      if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) fn(dx < 0 ? 1 : -1);
    }, { passive: true });
  }

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
  var drawerOpeners = d.querySelectorAll("[data-kudu-drawer-open]");
  function setDrawer(open) {
    if (!drawer) return;
    drawer.classList.toggle("translate-x-full", !open);
    drawer.classList.toggle("translate-x-0", open);
    d.documentElement.classList.toggle("overflow-hidden", open); // stop the page scrolling behind the menu
    drawerOpeners.forEach(function (b) { b.setAttribute("aria-expanded", String(open)); });
  }
  function openDrawer() { setDrawer(true); }
  function closeDrawer() { setDrawer(false); }
  d.addEventListener("keydown", function (e) { if (e.key === "Escape") closeDrawer(); });
  drawerOpeners.forEach(function (b) { b.addEventListener("click", openDrawer); });
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
    onSwipe(root, function (dir) { go(i + dir); play(); });
    go(0); play();
  });

  /* ---------- Product Inspirations (scene carousel + hotspots) ---------- */
  d.querySelectorAll("[data-kudu-inspo]").forEach(function (root) {
    var scenes = root.querySelectorAll("[data-scene]");
    var prev = root.querySelector("[data-inspo-prev]");
    var next = root.querySelector("[data-inspo-next]");
    var s = 0;
    // On phones the product card is a bottom sheet; hide the arrows so they don't sit on top of it.
    function syncArrows() {
      var open = window.innerWidth < 640 && !!root.querySelector("[data-popup]:not(.hidden)");
      [prev, next].forEach(function (b) { if (b) b.style.visibility = open ? "hidden" : ""; });
    }
    function hidePopups() {
      root.querySelectorAll("[data-popup]").forEach(function (p) { p.classList.add("hidden"); });
      syncArrows();
    }
    function show(n) {
      s = (n + scenes.length) % scenes.length;
      scenes.forEach(function (sc, k) {
        sc.classList.toggle("opacity-100", k === s);
        sc.classList.toggle("opacity-0", k !== s);
        sc.classList.toggle("z-10", k === s);
      });
      hidePopups();
    }
    if (prev) prev.addEventListener("click", function () { show(s - 1); });
    onSwipe(root, function (dir) { show(s + dir); });
    // Phone popups are fixed bottom sheets, so close them once the page scrolls.
    window.addEventListener("scroll", function () { if (window.innerWidth < 640) hidePopups(); }, { passive: true });
    if (next) next.addEventListener("click", function () { show(s + 1); });
    root.querySelectorAll("[data-hotspot]").forEach(function (h) {
      h.addEventListener("click", function (e) {
        e.stopPropagation();
        var pop = h.parentNode.querySelector("[data-popup]");
        if (!pop) return;
        var wasHidden = pop.classList.contains("hidden");
        hidePopups();
        if (wasHidden) pop.classList.remove("hidden");
        syncArrows();
      });
    });
    root.addEventListener("click", hidePopups);
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
