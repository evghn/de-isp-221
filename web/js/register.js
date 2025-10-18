$(() => {
  $("#user-rule").on("click", function () {
    const btn = $(".btn-register");
    if ($(this).prop("checked")) {
      btn.removeClass("disabled");
    } else {
      btn.addClass("disabled");
    }
  });
});
