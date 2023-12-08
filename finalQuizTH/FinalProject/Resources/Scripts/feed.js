$(function () {
  $('#customForm').on('submit', function (e) {
      e.preventDefault();
      const choiceID = $('#customForm input[name="choice"]:checked').attr('id');
      $('#output').html('');
      if (choiceID == 'choiceMovies') {
          $.getJSON("../Resources/Data/movies.json", function (data) {
              for (const movie of data.movies) {
                  const div = $(document.createElement('div'));
                  div.addClass('card');

                  // Create an image element and set its source
                  const image = $(document.createElement('img'));
                  image.addClass('movie-image'); // Add a class for styling
                  image.attr('src', '../Resources/Images/Covers/' + movie.img); // Use the 'img' property from your JSON data
                  image.attr('alt', movie.title); // Set alt text for accessibility
                  div.append(image); // Append the image element to the card

                  const title = $(document.createElement('h3'));
                  title.text(movie.title);
                  const genre = $(document.createElement('p'));
                  genre.text(movie.type);
                  const description = $(document.createElement('p'));
                  description.text(movie.plot);

                  div.append(title);
                  div.append(description);
                  div.append(genre);
                  $('#output').append(div);
              }
          });
          return;
      }
      if (choiceID == 'choiceBooks') {
        $.getJSON("../Resources/Data/books.json", function (data) {
            for (const book of data.books) {
                const div = $(document.createElement('div'));
                div.addClass('card');
    
                // Create an image element and set its source
                const image = $(document.createElement('img'));
                image.addClass('book-image'); // Add a class for styling
                image.attr('src', '../Resources/Images/Covers/' + book.img); // Use the 'img' property from your JSON data
                image.attr('alt', book.title); // Set alt text for accessibility
                div.append(image); // Append the image element to the card
    
                const title = $(document.createElement('h3'));
                title.text(book.title);
                const author = $(document.createElement('h4'));
                author.text(book.author);
                const genre = $(document.createElement('p'));
                genre.text(book.type);
                const description = $(document.createElement('p'));
                description.text(book.plot);
    
                div.append(title);
                div.append(author);
                div.append(description);
                div.append(genre);
                $('#output').append(div);
            }
        });
        return;
    }    
  });
});
