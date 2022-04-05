let products_dataTable;
let products_archive_dataTable;

$(document).ready(function () {
  // Fetch all products
  products_dataTable = $("#products_dataTable").DataTable({
    // Disable sorting option on Action column
    columnDefs: [{ orderable: false, targets: 6 }],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud_products/fetch_products.php",
  });

  // Fetch archived products
  products_archive_dataTable = $("#products_archive_dataTable").DataTable({
    // Disable sorting option on Action column
    columnDefs: [{ orderable: false, targets: 6 }],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud_products/fetch_products_archive.php",
  });

  // Add product
  $("#add_product_form")
    .unbind("submit")
    .bind("submit", function () {
      let form = $(this);

      $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: form.serialize(),
        dataType: "json",
        success: function (response) {
          if (response.success) {
            // console.log(response);
            toastr.success(response.message, "Success");
            $("#add_product_form")[0].reset();
            $("#add_product_modal").modal("hide");
            products_dataTable.ajax.reload(null, false);
          } else {
            toastr.error(response.message, "Failed");
          }
        },
      });

      return false;
    });
});

// Edit product
function editProduct(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#product_id").remove();

    $.ajax({
      url: "crud_products/get_selected_product.php",
      type: "post",
      data: { product_id: id },
      dataType: "json",
      success: function (response) {
        // console.log(response);
        $("#edit_product_name").val(response.product_name);
        $("#edit_product_category").val(response.product_category);
        $("#edit_brand").val(response.brand);
        $("#edit_supplier").val(response.supplier);
        $("#edit_price").val(response.price);

        $("#edit_product_selector").append('<input type="hidden" name="product_id" id="product_id" value="' + response.id + '"/>');

        $("#edit_product_form")
          .unbind("submit")
          .bind("submit", function () {
            let form = $(this);

            $.ajax({
              url: form.attr("action"),
              type: form.attr("method"),
              data: form.serialize(),
              dataType: "json",
              success: function (response) {
                if (response.success) {
                  // console.log(response);
                  toastr.success(response.message, "Success");
                  $("#edit_product_form")[0].reset();
                  $("#edit_product_modal").modal("hide");
                  products_dataTable.ajax.reload(null, false);
                } else {
                  toastr.error(response.message, "Failed");
                }
              },
            });
            return false;
          });
      },
    });
  }
}

// Remove product (not delete permanently)
function removeProduct(id = null) {
  if (id) {
    // console.log(id);
    $("#remove_product_button")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud_products/remove_product.php",
          type: "post",
          data: { product_id: id },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              // console.log(response);
              toastr.success(response.message, "Success");
              $("#remove_product_modal").modal("hide");
              products_dataTable.ajax.reload(null, false);
            } else {
              toastr.error(response.message, "Failed");
            }
          },
        });
      });
  }
}

// Restore product
function restoreProduct(id = null) {
  if (id) {
    // console.log(id);
    $("#restore_product_button")
      .unbind("click")
      .bind("click", function () {
        $.ajax({
          url: "crud_products/restore_product.php",
          type: "post",
          data: { product_id: id },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              // console.log(response);
              toastr.success(response.message, "Success");
              $("#restore_product_modal").modal("hide");
              products_archive_dataTable.ajax.reload(null, false);
            } else {
              toastr.error(response.message, "Failed");
            }
          },
        });
      });
  }
}
