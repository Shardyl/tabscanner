document.querySelector('.burger').addEventListener('click',()=>{
  const n=document.querySelector('.nav-links');
  n.style.cssText='display:flex;position:absolute;top:74px;left:0;right:0;flex-direction:column;background:#fff;padding:18px 26px;gap:16px;border-bottom:1px solid var(--line)';
});
// tabs
document.querySelectorAll('.tabnav').forEach(nav=>{
  nav.querySelectorAll('button').forEach(b=>{
    b.addEventListener('click',()=>{
      nav.querySelectorAll('button').forEach(x=>x.classList.remove('on'));
      b.classList.add('on');
      const pane=document.getElementById(b.dataset.t);
      const wrap=pane.parentElement;
      wrap.querySelectorAll(':scope > .tabpane').forEach(p=>p.classList.remove('on'));
      pane.classList.add('on');
    });
  });
});
// accordion
document.querySelectorAll('.qa button').forEach(b=>{
  b.addEventListener('click',()=>{
    const qa=b.parentElement, ans=qa.querySelector('.ans'), open=qa.classList.contains('open');
    document.querySelectorAll('.qa').forEach(o=>{o.classList.remove('open');o.querySelector('.ans').style.maxHeight=null});
    if(!open){qa.classList.add('open'); ans.style.maxHeight=ans.scrollHeight+'px';}
  });
});
// neural network canvas (hero)
(function(){
  const c=document.getElementById('neural'); if(!c) return;
  const ctx=c.getContext('2d'); let w=0,h=0,pts=[];
  function size(){const r=c.parentElement.getBoundingClientRect(); w=c.width=Math.max(1,r.width); h=c.height=Math.max(1,r.height);}
  function init(){pts=[]; const n=Math.min(48,Math.floor(w/28)); for(let i=0;i<n;i++){pts.push({x:Math.random()*w,y:Math.random()*h,vx:(Math.random()-.5)*.34,vy:(Math.random()-.5)*.34});}}
  function step(){
    ctx.clearRect(0,0,w,h);
    for(const p of pts){p.x+=p.vx;p.y+=p.vy; if(p.x<0||p.x>w)p.vx*=-1; if(p.y<0||p.y>h)p.vy*=-1;}
    for(let i=0;i<pts.length;i++){for(let j=i+1;j<pts.length;j++){const a=pts[i],b=pts[j],dx=a.x-b.x,dy=a.y-b.y,d=Math.hypot(dx,dy); if(d<132){ctx.strokeStyle='rgba(41,179,235,'+(1-d/132)*.32+')'; ctx.lineWidth=1; ctx.beginPath(); ctx.moveTo(a.x,a.y); ctx.lineTo(b.x,b.y); ctx.stroke();}}}
    for(const p of pts){ctx.fillStyle='rgba(127,211,245,.85)'; ctx.beginPath(); ctx.arc(p.x,p.y,1.7,0,7); ctx.fill();}
    requestAnimationFrame(step);
  }
  size(); init(); step();
  let t; window.addEventListener('resize',()=>{clearTimeout(t); t=setTimeout(()=>{size();init();},150);});
})();
// animated stat counters
document.querySelectorAll('[data-to]').forEach(el=>{
  const to=parseFloat(el.dataset.to), dec=parseInt(el.dataset.dec||'0'), suf=el.dataset.suf||''; let start=null;
  function f(ts){ if(!start) start=ts; const p=Math.min((ts-start)/1300,1); const v=to*(1-Math.pow(1-p,3)); el.textContent=v.toFixed(dec)+suf; if(p<1) requestAnimationFrame(f);}
  requestAnimationFrame(f);
});
// reveal
const io=new IntersectionObserver((es)=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}})},{threshold:.1});
document.querySelectorAll('.rv').forEach(el=>io.observe(el));