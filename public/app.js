if (/create/.test(window.location.href)) {
  $("#DVD").hide();
  $("#Furniture").hide();
  $("#Book").hide();

  let productType = localStorage.getItem("productType");

  if (productType === productType) {
    $(`.${productType}`).show();
  }
  $("#productType").on("change", function (event) {
    localStorage.setItem("productType", $(this).val());

    if (event.target.value === "DVD") {
      $("#DVD").show();
      $("#Furniture").hide();
      $("#Book").hide();
    } else if (event.target.value === "Furniture") {
      $("#DVD").hide();
      $("#Furniture").show();
      $("#Book").hide();
    } else if (event.target.value === "Book") {
      $("#DVD").hide();
      $("#Furniture").hide();
      $("#Book").show();
    } else {
      $("#DVD").hide();
      $("#Furniture").hide();
      $("#Book").hide();
    }
  });
} else {
  localStorage.removeItem("productType");
}
