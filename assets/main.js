// Kudu Living — interactions (header state, reveal, drawer, gallery).
// Elementor handles these natively; this is for the HTML preview.
(function(){
  var header=document.querySelector('.site-header');
  var solid=header&&header.classList.contains('solid');
  function onScroll(){
    if(!header||solid)return;
    if(window.scrollY>40)header.classList.add('scrolled');
    else header.classList.remove('scrolled');
  }
  window.addEventListener('scroll',onScroll);onScroll();

  var els=document.querySelectorAll('.reveal');
  if('IntersectionObserver'in window){
    var io=new IntersectionObserver(function(en){
      en.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}});
    },{threshold:.14});
    els.forEach(function(el){io.observe(el);});
  }else{
    els.forEach(function(el){el.classList.add('in');});
  }

  var drawer=document.getElementById('drawer');
  document.querySelectorAll('[data-drawer]').forEach(function(b){
    b.addEventListener('click',function(){if(drawer)drawer.classList.add('open');});
  });
  document.querySelectorAll('[data-drawer-close]').forEach(function(b){
    b.addEventListener('click',function(){if(drawer)drawer.classList.remove('open');});
  });
  if(drawer){
    drawer.querySelectorAll('a').forEach(function(a){
      a.addEventListener('click',function(){drawer.classList.remove('open');});
    });
  }

  document.querySelectorAll('.pd .thumbs .t').forEach(function(t){
    t.addEventListener('click',function(){
      var main=document.querySelector('.pd .main .ph');
      var cls=(t.querySelector('.ph').className.split(' ').filter(function(c){return c.indexOf('ph--')===0;})[0]||'');
      if(main){main.className='ph '+cls;}
    });
  });
})();
