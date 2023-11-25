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
                var entries = $(xml).find('entry'); // Atom feed
                if (entries.length === 0) {
                    entries = $(xml).find('item'); // RSS feed
                }

                entries.each(function() {
                    var entry = $(this);
                    output += '<div>';
                    output += '<hr>';
                    output += '<h3>' + entry.find('title').text() + '</h3>';
                    if (entry.find('summary').length > 0) {
                        output += '<p>' + entry.find('summary').text() + '</p>'; // Atom feed
                    } else {
                        output += '<p>' + entry.find('description').text() + '</p>'; // RSS feed
                    }
                    output += '<a href="' + entry.find('link').attr('href') + '">Read More</a>'; // Change '.text()' to '.attr('href')'
                    output += '</div>';
                });
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
    displayFeed(atomFeedUrl, '#ATOM');
});
