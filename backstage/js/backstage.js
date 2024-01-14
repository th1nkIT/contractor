// Delete Article
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-article-btn');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            const articleId = button.getAttribute('data-id');

            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, perform AJAX delete
                    deleteArticle(articleId);

                    // Remove article from DOM
                    const articleRow = button.parentElement.parentElement;
                    articleRow.remove();

                    // if there are no more articles, show empty message
                    const articleTableBody = document.getElementById('articleTableBody');
                    const tableRows = articleTableBody.getElementsByTagName('tr');

                    if (tableRows.length === 0) {
                        articleTableBody.innerHTML = "<tr><td colspan='5' align='center'>Data Kosong</td></tr>";
                    }
                }
            });
        });
    });

    function deleteArticle(articleId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?halaman=delete_articles&id=' + articleId, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Successfully deleted
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Article has been deleted.',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        };

        xhr.send();
    }
});

// Delete Category
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-category-btn');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            const categoryId = button.getAttribute('data-id');

            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, perform AJAX delete
                    deleteCategory(categoryId);

                    // Remove article from DOM
                    const articleRow = button.parentElement.parentElement;
                    articleRow.remove();

                    // if there are no more articles, show empty message
                    const categoryTableBody = document.getElementById('categoryTableBody');
                    const tableRows = categoryTableBody.getElementsByTagName('tr');

                    if (tableRows.length === 0) {
                        categoryTableBody.innerHTML = "<tr><td colspan='5' align='center'>Data Kosong</td></tr>";
                    }
                }
            });
        });
    });

    function deleteCategory(categoryId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?halaman=delete_category&id=' + categoryId, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Successfully deleted
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Category has been deleted.',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        };

        xhr.send();
    }
});

// Delete Client
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-client-btn');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            const clientId = button.getAttribute('data-id');

            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, perform AJAX delete
                    deleteClient(clientId);

                    // Remove article from DOM
                    const clientRow = button.parentElement.parentElement;
                    clientRow.remove();

                    // if there are no more articles, show empty message
                    const clientTableBody = document.getElementById('clientTableBody');
                    const tableRows = clientTableBody.getElementsByTagName('tr');

                    if (tableRows.length === 0) {
                        clientTableBody.innerHTML = "<tr><td colspan='6' align='center'>Data Kosong</td></tr>";
                    }
                }
            });
        });
    });

    function deleteClient(clientId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?halaman=delete_client&id=' + clientId, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Successfully deleted
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Client has been deleted.',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        };

        xhr.send();
    }
});

// Delete Project
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-project-btn');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            const projectId = button.getAttribute('data-id');

            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, perform AJAX delete
                    deleteProject(projectId);

                    // Remove article from DOM
                    const projecttRow = button.parentElement.parentElement;
                    projecttRow.remove();

                    // if there are no more articles, show empty message
                    const projectTableBody = document.getElementById('projectTableBody');
                    const tableRows = projectTableBody.getElementsByTagName('tr');

                    if (tableRows.length === 0) {
                        projectTableBody.innerHTML = "<tr><td colspan='7' align='center'>Data Kosong</td></tr>";
                    }
                }
            });
        });
    });

    function deleteProject(projectId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?halaman=delete_projects&id=' + projectId, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Successfully deleted
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Project has been deleted.',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        };

        xhr.send();
    }
});

// Delete User
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-user-btn');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            const userId = button.getAttribute('data-id');

            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, perform AJAX delete
                    deleteUser(userId);

                    // Remove article from DOM
                    const userRow = button.parentElement.parentElement;
                    userRow.remove();

                    // if there are no more articles, show empty message
                    const userTableBody = document.getElementById('userTableBody');
                    const tableRows = userTableBody.getElementsByTagName('tr');

                    if (tableRows.length === 0) {
                        userTableBody.innerHTML = "<tr><td colspan='5' align='center'>Data Kosong</td></tr>";
                    }
                }
            });
        });
    });

    function deleteUser(userId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?halaman=delete_user&id=' + userId, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Successfully deleted
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'User has been deleted.',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        };

        xhr.send();
    }
});