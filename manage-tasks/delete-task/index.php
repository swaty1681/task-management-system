<?php

    $taskid = isset($_GET['taskid']) ? $_GET['taskid'] : '';

?>
<p>
    Are you sure you want to delete the task?
</p>
<a href="./confirm/?taskid=<?=$taskid?>">Yes</a>&emsp13;
<a href="../">No</a>