$(document).ready(function () {
//AJAX Autocomplete Search
$("#search").keyup(function () {

  let searchText = $(this).val();
  if (searchText != "") {
    $.ajax({
      url: "search.php",
      method: "post",
      data: {
        query: searchText,
      },
      success: function (response) {
      $("#search-results").html(response);
      },
  });

  } 
  else {
    $("#search-results").html("");
  }
});
//Allow the selected text to be clicked to search for it
  $(document).on("click", "a", function () {
    $("#search").val($(this).text());
    $("#search-results").html("");
  });
});