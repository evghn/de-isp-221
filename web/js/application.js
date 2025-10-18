$(() => {
  $("#application-course_id").on("change", function () {
    if ($(this).val() === "3") {
      $(".alert-db").removeClass("d-none");
    } else {
      $(".alert-db").addClass("d-none");
    }
  });
});
