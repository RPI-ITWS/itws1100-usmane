$(document).ready(function() {
    // Replace these URLs with your actual RSS and Atom feed URLs
    const rssFeedUrl = 'RSS.xml';
    const atomFeedUrl = 'ATOM.xml';

    // Function to parse and display a feed
    function displayFeed(feedUrl, containerId) {
        $.ajax({
            type: 'GET',
            url: feedUrl,
            dataType: 'xml',
            success: function(xml) {
                var output = '<div>';
                var items = $(xml).find('item');
                output += '<ul>';

                items.each(function() {
                    var item = $(this);
                    output += '<hr>';
                    output += '<h3>' + item.find('title').text() + '</h3>';
                    output += '<p>' + item.find('description').text() + '</p>';
                    output += '<a href="' + item.find('link').text() + '">Read More</a></button>';
                    output += '</div>';
                });
                output += '</ul>';
                output += '</div>';

                $(containerId).html(output); // Make sure this ID matches your HTML container
            },
            error: function(xhr, status, error) {
                // there was a problem
                alert('There was a problem: ' + status + ' ' + error);
            }
        });
    }

    // Display RSS feed
    displayFeed(rssFeedUrl, '#RSS');

    // Display Atom feed
    displayFeed(atomFeedUrl, '#Atom');
});
