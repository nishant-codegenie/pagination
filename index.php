<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination with AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div id="posts-container"></div>

    <div id="pagination-controls"></div>

    <script>
        function loadPosts(page) {
            $.ajax({
                url: 'pagination.php',
                type: 'POST',
                data: {
                    page: page
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    var posts = data.posts;
                    var totalPages = data.total_pages;
                    var postsHtml = '';

                    posts.forEach(function(post) {
                        postsHtml += '<p>' + post + '</p>';
                    });

                    $('#posts-container').html(postsHtml);

                    generatePaginationButtons(totalPages, page);
                },
                error: function() {
                    alert('An error occurred while loading the posts.');
                }
            });
        }

        function generatePaginationButtons(totalPages, currentPage) {
            var paginationHtml = '';
            for (var i = 1; i <= totalPages; i++) {
                if (i === currentPage) {
                    paginationHtml += '<button class="active" onclick="loadPosts(' + i + ')">' + i + '</button>';
                } else {
                    paginationHtml += '<button onclick="loadPosts(' + i + ')">' + i + '</button>';
                }
            }

            $('#pagination-controls').html(paginationHtml);
        }

        loadPosts(1);
    </script>

</body>

</html>