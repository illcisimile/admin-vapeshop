let stocks_dataTable;
let critical_stocks_dataTable;

$(document).ready(function () {
  // Fetch all stocks
  stocks_dataTable = $("#stocks_dataTable").DataTable({
    // Disable sorting option on Action column
    columnDefs: [{ orderable: false, targets: 5 }],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud_stocks/fetch_stocks.php",
  });

  // Fetch all critical stocks
  critical_stocks_dataTable = $("#critical_stocks_dataTable").DataTable({
    // Disable sorting option on Action column
    columnDefs: [{ orderable: false, targets: 5 }],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search for records",
    },
    ajax: "crud_stocks/fetch_critical_stocks.php",
  });
});

// Edit stock
function editStock(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#product_id").remove();

    $.ajax({
      // Used the same url
      url: "crud_products/get_selected_product.php",
      type: "post",
      data: { product_id: id },
      dataType: "json",
      success: function (response) {
        // console.log(response);
        $("#edit_stock_name").val(response.product_name);
        $("#edit_stock_category").val(response.product_category);
        $("#edit_quantity").val(response.quantity);
        $("#edit_warning_quantity").val(response.warning_quantity);

        $("#edit_stock_selector").append('<input type="hidden" name="product_id" id="product_id" value="' + response.id + '"/>');

        $("#edit_stock_form")
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
                  $("#edit_stock_form")[0].reset();
                  $("#edit_stock_modal").modal("hide");
                  stocks_dataTable.ajax.reload(null, false);
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

// Edit critical stock (code is similar to edit stock but only changed ajax reload variable)
function editCriticalStock(id = null) {
  if (id) {
    // Removes existing id to avoid duplicates
    $("#product_id").remove();

    $.ajax({
      // Used the same url
      url: "crud_products/get_selected_product.php",
      type: "post",
      data: { product_id: id },
      dataType: "json",
      success: function (response) {
        // console.log(response);
        $("#edit_stock_name").val(response.product_name);
        $("#edit_stock_category").val(response.product_category);
        $("#edit_quantity").val(response.quantity);
        $("#edit_warning_quantity").val(response.warning_quantity);

        $("#edit_stock_selector").append('<input type="hidden" name="product_id" id="product_id" value="' + response.id + '"/>');

        $("#edit_stock_form")
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
                  $("#edit_stock_form")[0].reset();
                  $("#edit_stock_modal").modal("hide");
                  critical_stocks_dataTable.ajax.reload(null, false);
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
