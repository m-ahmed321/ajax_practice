<?php require 'core/db_conn.php';
$query = "select * from students";
$result = mysqli_query($connection, $query);
?>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>

            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>AGE</th>
        </tr>
    </thead>
    <tbody id="table-data">

        <?php foreach ($result as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['first_name'] ?></td>
                <td><?= $row['last_name'] ?></td>
                <td><?= $row['age'] ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-group ">
                    <label for="f_name">First Name</label>
                    <input type="text" name="f_name" id="f_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" name="l_name" id="l_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" id="age" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success" onclick="myAjax()" id="submit" name="add_students">ADD</button>
            </div>
            <h5 id="success" class="m-auto pt-0 pb-2"></h5>
        </div>
    </div>
</div>



<script>

    function myAjax() {
        var xmlHttp = new XMLHttpRequest();
        var url = "insert_data.php";
        f_name = document.getElementById('f_name').value;
        l_name = document.getElementById('l_name').value;
        age = document.getElementById('age').value;
        var parameters = `f_name=${f_name}&l_name=${l_name}&age=${age}`;
        xmlHttp.open("POST", url, true);

        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById('success').innerHTML = "Success";
            }
        }
        xmlHttp.send(parameters);
    }
</script>