<?php
/**
 * Admin layout footer
 */
?>
      </main>
    </div>
  </div>
  <script>
    (function () {
      var toggle = document.getElementById('sidebar-toggle');
      var sidebar = document.getElementById('admin-sidebar');

      function closeSidebar() {
        if (!sidebar) return;
        sidebar.classList.remove('is-open');
        document.body.classList.remove('sidebar-open');
        if (toggle) toggle.setAttribute('aria-expanded', 'false');
      }

      function openSidebar() {
        if (!sidebar) return;
        sidebar.classList.add('is-open');
        document.body.classList.add('sidebar-open');
        if (toggle) toggle.setAttribute('aria-expanded', 'true');
      }

      if (toggle && sidebar) {
        toggle.setAttribute('aria-controls', 'admin-sidebar');
        toggle.setAttribute('aria-expanded', 'false');

        toggle.addEventListener('click', function (e) {
          e.stopPropagation();
          if (sidebar.classList.contains('is-open')) {
            closeSidebar();
          } else {
            openSidebar();
          }
        });

        document.addEventListener('click', function (e) {
          if (!document.body.classList.contains('sidebar-open')) return;
          if (sidebar.contains(e.target) || toggle.contains(e.target)) return;
          closeSidebar();
        });

        document.addEventListener('keydown', function (e) {
          if (e.key === 'Escape') closeSidebar();
        });

        window.addEventListener('resize', function () {
          if (window.innerWidth > 960) closeSidebar();
        });
      }
    })();
  </script>
</body>
</html>
