
/*
Template Name: Shreyu - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 1.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: table list init js
*/

var userList = new List('users-list', {
    valueNames: ['name', 'born']
});

var paginationList = new List('pagination-list', {
    valueNames: ['name'],
    page: 4,
    pagination: true
});

var noresultList = new List('noresult-list', {
    valueNames: ['name'],
});
noresultList.on('updated', function(list) {
    if (list.matchingItems.length > 0) {
        $('.error-message').hide()
    } else {
        $('.error-message').show()
    }
})

var transactionList = new List('transaction-list', {
    valueNames: ['name', 'id-no']
});