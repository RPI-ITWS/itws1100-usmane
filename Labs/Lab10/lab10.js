$(document).ready(function() {
    // Replace this URL with your actual RSS feed URL
    const rssFeedUrl = 'RSS.xml'; // Assuming RSS.xml is in the same directory as the HTML file

    $.ajax({
        type: 'GET',
        url: rssFeedUrl,
        dataType: 'xml',
        success: function(xml) {
            var output = '<div>';
            var items = $(xml).find('item');

            output += '<ul>';

            items.each(function() {
                var item = $(this);
                output += '<hr>';
                output += '<h3 class="centered">' + item.find('title').text() + '</h3>';
                output += '<p class="centered">' + item.find('description').text() + '</p>';
                output += '<div class="mybutton">';
                output += '<button type="button"><a href="' + item.find('link').text() + '">Read More</a></button>';
                output += '</div>';
            });

            output += '</ul>';
            output += '</div>';

            $('#RSS').html(output); // Make sure this ID matches your HTML container
        },
        error: function(xhr, status, error) {
            // there was a problem
            alert('There was a problem: ' + status + ' ' + error);
        }
    });
});
