$(document).ready(function() {
    $("#example").append(
        $('<tfoot/>').append( $("#example thead tr").clone() )
    );

    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#example').DataTable({

        responsive: {
            details: {
                renderer: $.fn.dataTable.Responsive.renderer.tableAll(),
            }
        },
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
} );


document.getElementById("loginForm").onsubmit = adminLogin;

function adminLogin() {
    clearErrors();

    let userInput = document.getElementById("user").value;
    let passwordInput = document.getElementById("pass").value;

    let valid = true;

    let user = "admin";
    let password = "@dm1n";

    if (userInput != user) {
        document.getElementById("emailErr").style.display = "block";
        valid = false;
    }

    if (passwordInput != password) {
        document.getElementById("passwordErr").style.display = "block";
        valid = false;
    }

    return valid;
}

function clearErrors() {
    let errors = $(".error");
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }
}

function displayRemoveRow() {
    let editElements = document.getElementsByClassName("editOptions");

    for (let i = 0; i < editElements.length; i++) {
        editElements[i].style.display = "table-cell";
    }
}

function removeRow(className) {
    let editElements = document.getElementsByClassName(className);

    for (let i = 0; i < editElements.length; i++) {
        editElements[i].style.display = "none";
    }
}

