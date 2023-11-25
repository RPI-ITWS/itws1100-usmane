$(document).ready(function() {
    const rssFeedUrl = 'RSS.xml';
    const atomFeedUrl = 'ATOM.xml';

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
                        output += '<p>' + entry.find('summary').text() + '</p>'; 
                    } else {
                        output += '<p>' + entry.find('description').text() + '</p>'; 
                    }
                    output += '<a href="' + entry.find('link').attr('href') + '">Read More</a>'; 
                    output += '</div>';
                });
                output += '</div>';

                $(containerId).html(output); 
            },

        });
    }

    displayFeed(rssFeedUrl, '#RSS');
    displayFeed(atomFeedUrl, '#ATOM');
});
