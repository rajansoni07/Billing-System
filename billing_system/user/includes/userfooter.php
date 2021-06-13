  </div>  <!-- end of main div -->
</div> <!-- end of container-fluid -->

  <!-- java scripts -->
  <script>
  /* Set the width of the sidebar to 250px (show it) */
  function openNav() {
    document.getElementById("mymenu").style.width = "250px";
    document.getElementById("main").classList.add('displaymain');
  }

  /* Set the width of the sidebar to 0 (hide it) */
  function closeNav() {
    document.getElementById("mymenu").style.width = "0";
    document.getElementById("main").classList.remove('displaymain');
  }
  </script>
  
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
  <script src="../js/jqajax.js"></script>
</body>
</html>