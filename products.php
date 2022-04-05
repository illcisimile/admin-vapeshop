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
            <div class="card mt-4">
              <div class="card-body">
                <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                    <li class="breadcrumb-item active" aria-current="page">List of Products</li>
                  </ol>
                </nav>
              </div>
            </div>

            <div class="card mt-4">
              <div class="card-header">Products Table</div>
              <div class="card-body">
                <!-- Add modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_product_modal">Add new product</button>
                <hr />
                <div class="table-responsive">
                  <table class="table table-hover" id="products_dataTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Price</th>
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

    <?php include 'crud_products/products_modal.html'?>

    <?php include 'includes/scripts.html'?>

    <!-- CRUD operations for Products -->
    <script src="crud_products/products.js"></script>
  </body>
</html>
