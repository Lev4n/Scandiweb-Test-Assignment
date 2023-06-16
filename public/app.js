if (/create/.test(window.location.href)) {
  $(document).ready(function() {
    let productType = localStorage.getItem("productType");

    if ($("#DVD").is(":visible") && productType !== "DVD") {
      $("#DVD").hide();
    }

    if ($("#Furniture").is(":visible") && productType !== "Furniture") {
      $("#Furniture").hide();
    }

    if ($("#Book").is(":visible") && productType !== "Book") {
      $("#Book").hide();
    }

    if ($("#productType").length && productType) {
      $("#productType").val(productType);
    }
  });

  let selectedProduct = sessionStorage.getItem("selectedProduct");

  if (selectedProduct) {
    sessionStorage.setItem("selectedProduct", selectedProduct);
  }

  let productType = localStorage.getItem("productType");

  if (productType === null) {
    localStorage.setItem("productType", "typeSwitcher");
    productType = "typeSwitcher"; // Set the default value
  }

  $(`.${productType}`).show();

  $("#productType").on("change", function(event) {
    let selectedValue = $(this).val();
    localStorage.setItem("productType", selectedValue);

    $("#DVD").toggle(selectedValue === "DVD");
    $("#Furniture").toggle(selectedValue === "Furniture");
    $("#Book").toggle(selectedValue === "Book");
  });
} else {
  localStorage.removeItem("productType");
}
