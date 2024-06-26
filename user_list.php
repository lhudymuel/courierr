<?php include 'db_connect.php' ?>
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_staff"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table tabe-hover table-bordered" id="list">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Staff</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $qry = $conn->query("SELECT *, concat(firstname, ' ', lastname) as name FROM users WHERE type = 2 order by concat(firstname, ' ', lastname) asc");
                    while($row = $qry->fetch_assoc()):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td><b><?php echo ucwords($row['name']) ?></b></td>
                        <td><b><?php echo $row['email'] ?></b></td>
                        <td><b><?php echo ucwords($row['location']) ?></b></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="index.php?page=edit_staff&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat delete_staff" data-id="<?php echo $row['id'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    table td {
        vertical-align: middle !important;
    }
</style>
<script>
    $(document).ready(function(){
        $('#list').dataTable()
        $('.view_staff').click(function(){
            uni_modal("Staff's Details", "view_staff.php?id=" + $(this).attr('data-id'), "large")
        })
        $('.delete_staff').click(function(){
            _conf("Are you sure to delete this staff?", "delete_staff", [$(this).attr('data-id')])
        })
    })
    function delete_staff($id){
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_staff',
            method: 'POST',
            data: {id: $id},
            success: function(resp){
                if(resp == 1){
                    alert_toast("Data successfully deleted", 'success')
                    setTimeout(function(){
                        location.reload()
                    }, 1500)
                }
            }
        })
    }
</script>
