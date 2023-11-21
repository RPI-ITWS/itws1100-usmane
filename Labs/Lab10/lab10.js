document.addEventListener('DOMContentLoaded', function() {
    // Replace this URL with your actual RSS feed URL
    const rssFeedUrl = 'http://usmanerpi.eastus.cloudapp.azure.com/iit/Labs/Lab04XML/ITWS1100-Lab4-RSS&Atom/ITWS1100-Lab4-RSS&Atom/Intro%20ITWS%20-%20Lab%204%20-%20RSS&Atom%20-%20TemplateRSS.xml'; // Assuming RSS.xml is in the same directory as the HTML file

    // Fetch the RSS feed
    fetch(rssFeedUrl)
        .then(response => response.text())
        .then(xml => {
            // Parse the XML response
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(xml, 'application/xml');

            // Get the channel and items from the RSS feed
            const channel = xmlDoc.querySelector('channel');
            const items = xmlDoc.querySelectorAll('item');

            // Get the RSS container
            const rssContainer = document.getElementById('RSS');

            // Create HTML elements to display the feed
            const feedTitle = document.createElement('h2');
            feedTitle.textContent = channel.querySelector('title').textContent;
            rssContainer.appendChild(feedTitle);

            const feedDescription = document.createElement('p');
            feedDescription.textContent = channel.querySelector('description').textContent;
            rssContainer.appendChild(feedDescription);

            const feedLink = document.createElement('a');
            feedLink.href = channel.querySelector('link').textContent;
            feedLink.textContent = 'Visit Website';
            rssContainer.appendChild(feedLink);

            const feedItems = document.createElement('ul');
            items.forEach(item => {
                const listItem = document.createElement('li');
                const itemTitle = document.createElement('h3');
                const itemLink = document.createElement('a');
                const itemDescription = document.createElement('p');

                itemTitle.textContent = item.querySelector('title').textContent;
                itemLink.href = item.querySelector('link').textContent;
                itemLink.textContent = 'Read More';
                itemDescription.textContent = item.querySelector('description').textContent;

                listItem.appendChild(itemTitle);
                listItem.appendChild(itemLink);
                listItem.appendChild(itemDescription);
                feedItems.appendChild(listItem);
            });

            rssContainer.appendChild(feedItems);
        })
        .catch(error => console.error('Error fetching RSS feed:', error));
});
