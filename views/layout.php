<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include "header.php"; ?>

  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-2 bg-light border-end min-vh-100 p-3">
        <?php include "sidebar.php"; ?>
      </aside>

      <main class="col-md-10 p-4">
        <?php 
          // chỗ này sẽ load nội dung động
          echo $content; 
        ?>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>