$(document).ready(function() {
  $("#carForm").on("submit", function(e) {
    e.preventDefault();

    // simple validation
    if ($("#owner_name").val() === "" || $("#registration_number").val() === "") {
      alert("Please fill all required fields!");
      return;
    }

    $.ajax({
      url: "submit.php",
      method: "POST",
      data: $(this).serialize(),
      success: function(response) {
        $("#output").html(response);
        $("#carForm")[0].reset();
      },
      error: function() {
        $("#output").html("<p style='color:red;'>Error submitting form!</p>");
      }
    });
  });
});
