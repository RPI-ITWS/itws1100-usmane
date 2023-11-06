$(document).ready(function() {
    $.ajax({
      type: "GET",
      url: "lab8jsontemplate.json", // Ensure this points to your actual JSON file
      dataType: "json",
      success: function(responseData, status){
        var output = "<div>";  
        $.each(responseData.menuItem, function(i, item) {
          output += '<hr>';
          output += '<h3 class="centered">' + item.Title + '</h3>';
          output += '<p class="centered">' + item.Description + '</p>';
          output += '<div class="mybutton">';
          output += '<a href="' + item.link + '"><button type="button">View ' + item["Lab#"] + '</button></a>';
          output += '</div>';
        });
        output += "</div>";
        $('#projects').html(output); // Make sure this ID matches your HTML container
      },
      error: function(msg) {
        // there was a problem
        alert("There was a problem: " + msg.status + " " + msg.statusText);
      }
    });
  });