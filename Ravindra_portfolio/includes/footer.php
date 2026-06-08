<footer>
  <div class="wrap footer-inner">
    <div class="socials">
      <a href="https://x.com/RaviFoujda"  target="_blank" rel="noopener" aria-label="Twitter">
        <!-- Twitter -->
        <svg viewBox="0 0 24 24"><path d="M23 4.9c-.8.4-1.7.6-2.6.8a4.5 4.5 0 0 0 2-2.5c-.9.5-1.9.9-2.9 1.1a4.5 4.5 0 0 0-7.7 4.1A12.8 12.8 0 0 1 1.6 3.6a4.5 4.5 0 0 0 1.4 6 4.4 4.4 0 0 1-2-.6v.1a4.5 4.5 0 0 0 3.6 4.4 4.5 4.5 0 0 1-2 .1 4.5 4.5 0 0 0 4.2 3.1A9 9 0 0 1 1 18.6a12.7 12.7 0 0 0 6.9 2c8.3 0 12.8-6.9 12.8-12.8v-.6c.9-.6 1.6-1.4 2.3-2.3z"/></svg>
      </a>
      <a href="https://www.facebook.com/ravindrasingh.faujdar.5/" target="_blank" rel="noopener" aria-label="Facebook">
        <!-- Facebook -->
        <svg viewBox="0 0 24 24"><path d="M15 8h-2c-.6 0-1 .4-1 1v2h3l-.5 3H12v7H9v-7H7v-3h2V8.5C9 6 10.5 4.5 13 4.5c1 0 2 .1 2 .1V7h-1c-.7 0-1 .3-1 1z"/></svg>
      </a>
      <a href="https://www.youtube.com/@RavindraFoujdar" target="_blank" rel="noopener" aria-label="YouTube">
        <!-- YouTube -->
        <svg viewBox="0 0 24 24"><path d="M22 7.5c-.2-1-.9-1.7-1.9-2C18.3 5 12 5 12 5s-6.3 0-8.1.5c-1 .3-1.7 1-1.9 2C1.5 9.3 1.5 12 1.5 12s0 2.7.5 4.5c.2 1 .9 1.7 1.9 2C5.7 19 12 19 12 19s6.3 0 8.1-.5c1-.3 1.7-1 1.9-2 .5-1.8.5-4.5.5-4.5s0-2.7-.5-4.5zM10 15V9l5 3-5 3z"/></svg>
      </a>
      <a href="https://www.linkedin.com/in/ravindra-singh-72136719b/" target="_blank" rel="noopener" aria-label="LinkedIn">
        <!-- LinkedIn -->
        <svg viewBox="0 0 24 24"><path d="M6.9 8H4V20h2.9V8zM5.4 3.5A1.7 1.7 0 1 0 5.4 7a1.7 1.7 0 0 0 0-3.5zM20 20h-2.9v-5.8c0-1.4 0-3.2-2-3.2s-2.3 1.5-2.3 3.1V20H10V8h2.8v1.6h.1c.4-.7 1.3-1.6 2.9-1.6 3.1 0 3.7 2 3.7 4.7V20z"/></svg>
      </a>
      <a href="https://github.com/ravindra1998" target="_blank" rel="noopener" aria-label="GitHub">
        <!-- GitHub -->
        <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 0 0-3.2 19.5c.5.1.7-.2.7-.5v-1.7c-2.8.6-3.4-1.3-3.4-1.3-.5-1.2-1.1-1.5-1.1-1.5-.9-.6.1-.6.1-.6 1 .1 1.5 1 1.5 1 .9 1.5 2.3 1.1 2.9.8.1-.7.3-1.1.6-1.4-2.2-.300-4.6-1.1-4.6-4.9 0-1.1.4-2 1-2.7-.1-.3-.4-1.3.1-2.7 0 0 .8-.3 2.7 1a9.4 9.4 0 0 1 5 0c1.9-1.3 2.7-1 2.7-1 .5 1.4.2 2.4.1 2.7.6.7 1 1.6 1 2.7 0 3.8-2.4 4.6-4.6 4.9.3.3.6.9.6 1.8v2.7c0 .3.2.6.7.5A10 10 0 0 0 12 2z"/></svg>
      </a>
    </div>
    <p class="copyright">Copyright <?= date('Y') ?>. All rights reserved!</p>
  </div>
</footer>
<script>
  document.querySelectorAll('#nav a').forEach(function(a){
    a.addEventListener('click', function(){ document.getElementById('nav').classList.remove('open'); });
  });
</script>
</body>
</html>