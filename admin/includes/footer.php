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
      if (toggle && sidebar) {
        toggle.addEventListener('click', function () {
          sidebar.classList.toggle('is-open');
          document.body.classList.toggle('sidebar-open');
        });
      }
    })();
  </script>
</body>
</html>
