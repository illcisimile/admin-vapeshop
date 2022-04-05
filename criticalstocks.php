<!DOCTYPE html>
<html lang="en">
  <!-- Include header -->
  <?php include 'includes/header.html'?>
  <body class="sb-nav-fixed">
    <!-- Navigation bar -->
    <?php include 'includes/navbar.html'?>
    <div id="layoutSidenav">
      <!-- Sidebar -->
      <?php include 'includes/sidebar.html'?>
      <!-- Main content of the page -->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <!-- Insert content here -->
            <div class="card mt-4">
              <div class="card-body">
                <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Stocks</li>
                    <li class="breadcrumb-item active" aria-current="page">Critical Stocks</li>
                  </ol>
                </nav>
              </div>
            </div>

            <div class="card mt-4">
              <div class="card-header">Critical Stocks Table</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="critical_stocks_dataTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Warning Quantity</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <?php include 'crud_stocks/stocks_modal.html'?>

    <?php include 'includes/scripts.html'?>

    <!-- CRUD operations for Stocks -->
    <script src="crud_stocks/stocks.js"></script>
  </body>
</html>
