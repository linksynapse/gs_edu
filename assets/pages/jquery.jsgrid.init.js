/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Jsgrid Js
 */


 
$(function() {

  $("#jsGrid").jsGrid({
    height: "70%",
    width: "100%",
    filtering: true,
    editing: true,
    inserting: false,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 15,
    pageButtonCount: 5,
    deleteConfirm: "Do you really want to delete the client?",
    controller: db,
    fields: [
        { name: "No", type: "text", width: 150 },
        { name: "Name", type: "text", width: 200 },
        { name: "Nationality", type: "text", width: 200 },
        { name: "NRIC / FIN No", type: "text", width: 200 },
        { name: "Contact No (if any)" , type: "text", width: 200},
        { name: "Email (if any)" , type: "text", width: 200},
        { name: "Job Position" , type: "text", width: 200}
    ]
});

});
