<?php

$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'chatbox');

mysqli_query($con, "INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result1 = mysqli_query($con,"SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	//echo "<span style=\"font-weight: bold;\">" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
                               echo '<li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i>'.$extract['log_time'].'</small>
                                            <strong class="pull-right primary-font">'.$extract['username'].'</strong>
                                        </div>
                                        <p>
                                           '.$extract['msg'].'
                                        </p>
                                    </div>
                                </li>';
}
?>