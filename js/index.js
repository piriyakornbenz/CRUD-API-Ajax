var html, data;

$(document).ready(function() {
    render();
});

function render() {
    html = '';

    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "./api/get_data.php",
        data: {},
        success: function(response) {
            console.log("render", response);
            data = response.user;

            for(i=0; i<data.length; i++) {
                html += `
                    <tr>
                        <td>${i+1}</td>
                        <td>${data[i].name}</td>
                        <td>${data[i].email}</td>
                        <td>
                            <div class="btn-control">
                                <div onclick="open_modal_edit(${i}, ${data[i].id})" class="btn btn-warning">Edit</div>
                                <div onclick="delete_user(${data[i].id})" class="btn btn-danger">Delete</div>
                            </div>
                        </td>
                    </tr>
                `
            }
            $("#tbody").html(html);
        }, error: function(err) {
            console.log("render failed", err);
        }
    })
}

// create
function open_modal_create() {
    $("#modal_create").modal('show')
}

function validate_create() {
    var status = true;

    var email = $("#email");
    if( email.val() == "" ) {
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: 'Please fill email'
        })
        status = false;
    }

    var name = $("#name");
    if( name.val() == "" ) {
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: 'Please fill name'
        })
        status = false;
    }

    return status;
    
}

function create_user() {
    if( validate_create() ) {
        
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "./api/create_user.php",
            data: {
                name: $("#name").val(),
                email: $("#email").val()
            }, success: function(response) {
                if (response.result[0].code == 200) {
                    console.log("create successful", response);

                    Swal.fire({
                        icon: 'success',
                        title: 'Create success',
                        text: 'User created successfully'
                    });
                    $(".modal").modal('hide');
                    render();
                }
            }, error: function(err) {
                console.log("create failed", err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while creating the user.'
                });
            }
        })
    }
}

// update
var id_user;
function open_modal_edit(index, id) {
    $("#modal_edit").modal('show');
    $("#name_edit").val(data[index].name);
    $("#email_edit").val(data[index].email);
    id_user = id;
}

function validate_edit() {
    var status = true;

    var email = $("#email_edit");
    if( email.val() == "" ) {
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: 'Please fill email'
        })
        status = false;
    }

    var name = $("#name_edit");
    if( name.val() == "" ) {
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: 'Please fill name'
        })
        status = false;
    }

    return status;
}
function update_user() {
    if( validate_edit() ) {

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "./api/update_user.php",
            data: {
                id: id_user,
                name: $("#name_edit").val(),
                email: $("#email_edit").val()
            }, success: function(response) {
                if(response.result[0].code == 200) {
                    console.log("update sucessful", response);

                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: 'update successfully'
                    });
                    $(".modal").modal("hide");
                    render();
                }
            }, error: function(err) {
                console.log("update failed", err);
            }
        })
    }
}

// delete
function delete_user(index) {
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure to delete?',
        showConfirmButton: false,
        showDenyButton: true,
        showCancelButton: true,
        denyButtonText: `Delete`,
    }).then((result) => {
        if (result.isDenied) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/delete_user.php",
                data: {
                    id: index
                }, success: function(response) {
                    if (response.result[0].code == 200) {
                        console.log("delete successful", response);
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Delete success',
                            text: 'User deleted successfully'
                        });
                        render();
                    }
                    
                }, error: function(err) {
                    console.log("delete failed", err);
                }
            })
        }
    });
}
